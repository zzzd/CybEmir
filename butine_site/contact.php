<?php
// --- GESTION DES ERREURS ---
// On masque les erreurs et avertissements PHP pour garantir une sortie JSON propre.
// C'est la meilleure façon d'éviter que des avertissements (ex: sur la fonction mail())
// ne cassent la réponse JSON attendue par le navigateur.
@ini_set('display_errors', 0);
@error_reporting(0);

// --- DÉMARRAGE DE LA SESSION POUR L'ANTI-SPAM ---
session_start();

// S'assurer que la réponse est toujours en JSON pour éviter les erreurs de parsing
header('Content-Type: application/json');

// Définir le fuseau horaire pour éviter les avertissements potentiels de la fonction date()
date_default_timezone_set('Europe/Paris');

// --- CONFIGURATION ---
// Mettez cette variable à `true` lorsque vous déploierez le site sur votre serveur de production.
// Laissez-la à `false` pour tous les tests sur votre machine locale (XAMPP).
$is_production = false;

// --- SÉCURITÉ ANTI-SPAM ---
$cooldown_seconds = 30; // L'utilisateur doit attendre 30 secondes entre chaque envoi
if (isset($_SESSION['last_submission_time']) && (time() - $_SESSION['last_submission_time'] < $cooldown_seconds)) {
    http_response_code(429); // Code HTTP pour "Too Many Requests"
    echo json_encode([
        "status" => "error", 
        "message" => "Vous envoyez des messages trop rapidement. Veuillez patienter un peu."
    ]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // --- DONNÉES ET NETTOYAGE ---
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $company = strip_tags(trim($_POST["company"]));
    $message = strip_tags(trim($_POST["message"]));
    $submission_date = date('Y-m-d H:i:s');

    // --- VALIDATION ---
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Veuillez remplir correctement les champs obligatoires."]);
        exit;
    }

    // --- ENREGISTREMENT EN CSV ---
    $csv_file = 'admin/form_submissions.csv';
    $csv_header = ['Date de soumission', 'Nom complet', 'Email', 'Téléphone', 'Entreprise', 'Message'];
    $csv_data = [$submission_date, $name, $email, $phone, $company, $message];

    $is_new_file = !file_exists($csv_file);
    // Tenter d'ouvrir le fichier, en supprimant l'avertissement PHP par défaut avec @
    $handle = @fopen($csv_file, 'a');

    // Vérifier si l'ouverture a échoué (problème de permissions probable)
    if ($handle === false) {
        http_response_code(500);
        echo json_encode([
            "status" => "error", 
            "message" => "Erreur serveur : Impossible d'écrire le fichier CSV. Vérifiez les permissions en écriture du dossier sur votre serveur local."
        ]);
        exit;
    }

    if ($is_new_file) {
        fputcsv($handle, $csv_header);
    }
    fputcsv($handle, $csv_data);
    fclose($handle);

    // --- MISE À JOUR DE LA SÉCURITÉ ---
    // On enregistre l'heure de cette soumission réussie pour bloquer les prochaines.
    $_SESSION['last_submission_time'] = time();

    // --- CONFIGURATION DES EMAILS ---
    $recipient = "em.karaguzel@gmail.com";
    $subject = "Nouveau message de contact de $name";
    $email_content = "Un nouveau message a été soumis via le formulaire de contact.\n\nDate: $submission_date\nNom: $name\nEmail: $email\nTéléphone: $phone\nEntreprise: $company\n\nMessage:\n$message\n";
    $email_headers = "From: $name <$email>";

    $client_subject = "Merci pour votre message - Butine Groupe";
    $client_email_content = "Bonjour $name,\n\nNous avons bien reçu votre message et nous vous remercions de l'intérêt que vous portez à Butine Groupe.\nNotre équipe va l'étudier et reviendra vers vous dans les plus brefs délais.\n\nCordialement,\nL'équipe Butine Groupe\n\nPour rappel, voici votre message :\n------------------------\n$message";
    $client_email_headers = "From: Butine Groupe <contact@butinegroupe.com>\r\nReply-To: $recipient";
    
    // --- GESTION DE L'ENVOI ---
    
    // Si nous ne sommes PAS en production, on s'arrête ici après avoir écrit le CSV.
    if (!$is_production) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Test local réussi! Message enregistré dans le CSV."]);
        exit;
    }

    // Le code suivant ne s'exécute QU'EN PRODUCTION
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        mail($email, $client_subject, $client_email_content, $client_email_headers);
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Merci! Votre message a été envoyé."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Erreur serveur : La fonction mail() a échoué. L'e-mail n'a pas pu être envoyé."]);
    }

} else {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Accès non autorisé."]);
}
?> 