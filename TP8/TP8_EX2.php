<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>TP 8</title>
	<link rel="stylesheet" type="text/css" href="TP8.css">
</head>
<body>

<h1>Exercice 2:</h1>

    <form method="post">
    <label for="length">Longueur du mot de passe :</label>
       <input type="number" id="MDP" name="MDP" min="4" max="100" required><br><br>
       <input type="submit" value="Générer">
    </form>

  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pass = (int)$_POST["MDP"];
  $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*";
  $motdepasse = "";

  for ($i = 0; $i < $pass; $i++) {
    $motdepasse .= $char[rand(0, strlen($char) - 1)];
  }

  echo "<p><b>Mot de passe généré :</b> $motdepasse</p>";
}
?>



</body>
</html>
