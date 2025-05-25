<?php
session_start();


$valid_username = "etudiant";
$valid_password = "12345";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["username"] = $username;
        header("Location:TP8_Ex4_Bienvenue.php");
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
        <label>Identifiant:</label>
        <input type="text" name="username" required><br><br>
        <label>Mot de passe:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
