<?php

session_start();

if (!isset($_SESSION['CONNECT']) || $_SESSION['CONNECT'] !== 'OK') {
    header("Location: login.php?error=3");
    exit();
}

$login = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue !</h1>
    <p>Hello <?php echo htmlspecialchars($login); ?></p>
    <a href="validation.php?affaire=deconnexion">Déconnexion</a>
</body>
</html>