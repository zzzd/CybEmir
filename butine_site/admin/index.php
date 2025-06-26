<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="../img/butine_long_bg.png" alt="Butine Groupe Logo" class="login-logo">
            <h2>Accès à l'espace d'administration</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Se connecter</button>
            </form>
            <?php
                // Affiche un message d'erreur si la connexion a échoué
                if (isset($_GET['error'])) {
                    echo '<p class="error-message">Nom d\'utilisateur ou mot de passe incorrect.</p>';
                }
            ?>
        </div>
    </div>
</body>
</html> 