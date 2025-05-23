<?php
// Assurer que la session est démarrée pour pouvoir lire les messages d'erreur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Récupérer le message d'erreur depuis la session, s'il existe
$error_message = null;
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Supprimer le message pour qu'il ne s'affiche qu'une fois
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion MySoutenance</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <header class="login-header">
            <h1>GestionMySoutenance</h1>
            <p>Veuillez vous connecter pour continuer</p>
        </header>

        <?php if (!empty($error_message)): ?>
            <div class="error-message-login">
                <p><?= htmlspecialchars($error_message) ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="/login" class="login-form">
            <div class="form-group">
                <label for="login_utilisateur">Identifiant</label>
                <input type="text" id="login_utilisateur" name="login_utilisateur" placeholder="Entrez votre identifiant" required autofocus>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez votre mot de passe" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-login">Se connecter</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>