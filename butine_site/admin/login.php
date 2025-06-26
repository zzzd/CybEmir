<?php
session_start();

// --- CONFIGURATION DES IDENTIFIANTS ---
// !!! IMPORTANT !!!
// Changez ces identifiants pour quelque chose de sécurisé.
$admin_username = 'admin';
$admin_password = 'password123'; // Idéalement, utilisez un mot de passe "hashé"

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les identifiants
    if ($username === $admin_username && $password === $admin_password) {
        // Authentification réussie
        $_SESSION['admin_logged_in'] = true;
        header("Location: /admin/dashboard.php"); // Redirection vers le tableau de bord
        exit;
    } else {
        // Échec de l'authentification
        header("Location: /admin/index.php?error=1"); // Redirection avec un message d'erreur
        exit;
    }
} else {
    // Si quelqu'un accède à ce fichier directement sans méthode POST
    header("Location: /admin/index.php");
    exit;
}
?> 