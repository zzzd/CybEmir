<?php
session_start();

// Sécurité : vérifier si l'administrateur est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: /admin/index.php");
    exit;
}

// Fichier où sont stockées les soumissions
$csv_file = 'form_submissions.csv';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Tableau de bord</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="admin_style.css">
    <style>
        body { height: auto; }
        .dashboard-container { max-width: 1200px; margin: 40px auto; padding: 20px; }
        .dashboard-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .dashboard-header h1 { font-size: 28px; color: var(--primary-color); }
        .logout-button { background-color: var(--error-color); padding: 10px 15px; color: white; text-decoration: none; border-radius: 6px; font-weight: 500; transition: background-color 0.3s; }
        .logout-button:hover { background-color: #c82333; }
        .data-table { width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
        .data-table th, .data-table td { padding: 15px; border: 1px solid var(--border-color); text-align: left; font-size: 14px; }
        .data-table th { background-color: var(--background-light); font-weight: 600; }
        .data-table tr:nth-child(even) { background-color: #f8f9fa; }
        .no-data { text-align: center; padding: 30px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Messages de Contact</h1>
            <a href="logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>

        <table class="data-table">
            <?php
            if (file_exists($csv_file) && ($handle = fopen($csv_file, "r")) !== FALSE) {
                // Lire l'en-tête
                $header = fgetcsv($handle, 0, ",", "\"", "\\");
                if ($header) {
                    echo "<thead><tr>";
                    foreach ($header as $col) {
                        echo "<th>" . htmlspecialchars($col) . "</th>";
                    }
                    echo "</tr></thead>";
                }

                // Lire le corps du tableau
                echo "<tbody>";
                while (($data = fgetcsv($handle, 0, ",", "\"", "\\")) !== FALSE) {
                    echo "<tr>";
                    foreach ($data as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";

                fclose($handle);
            } else {
                echo "<tr><td colspan='100%' class='no-data'>Aucun message pour le moment.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html> 