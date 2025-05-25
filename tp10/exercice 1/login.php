<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
 
</head>
<body>

    <?php
    if (isset($_GET['error'])) {
        $error_code = $_GET['error'];
        switch ($error_code) {
            case 1:
                echo "<p style='color: red;'>Erreur 1 : Veuillez saisir un login et un mot de passe.</p>";
                break;
            case 2:
                echo "<p style='color: red;'>Erreur 2 : Erreur de login/mot de passe.</p>";
                break;
            case 3:
                echo "<p style='color: red;'>Erreur 3 : Vous avez été déconnecté du service.</p>";
                break;
            default:
                break;
        }
    }
    ?>

   
    <form action="validation.php" method="POST" >
    <h2>Formulaire de Connexion</h2>
        <label>Login :</label>
        <input type="text" id="login" name="login" required><br><br>
        <label >Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>

</body>
</html>