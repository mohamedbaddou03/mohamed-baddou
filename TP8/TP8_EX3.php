<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>TP 8</title>
	 <link rel="stylesheet" type="text/css" href="TP8.css">
</head>
<body>

<h1>Exercice 3:</h3>
     
	<form action="traitement.php" method="POST">
       <label>Nom :</label> <input type="text" name="nom" required><br><br>
       <label>Email :</label> <input type="email" name="email" required><br><br>
       <label>Message :</label> <br>
       <textarea name="message" rows="5" cols="30" required></textarea><br><br>
       <input type="submit" value="Envoyer">
    </form>
	

</body>
</html>
