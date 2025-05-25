<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>TP 8</title>
	 <link rel="stylesheet" type="text/css" href="TP8.css">
</head>
<body>
<h1>Exercice 1:</h1>
    <h2>Calculatrice</h2>
    <form method="post" action="">
        <label>Saisir le premier nombre :</label>
        <input type="number" name="n1" required><br><br>
        
        <label>Saisir le deuxième nombre :</label>
        <input type="number" name="n2" required><br><br>
        
	

        <label>Opération :</label>
        <select name="operation" required>
            <option value="addition">Addition</option>
            <option value="soustraction">Soustraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
        </select><br><br>
        

        <button type="submit" name="calculer">Calculer</button>
    </form>

    <?php
    if (isset($_POST['calculer'])) {
        $n1 = $_POST['n1'];
        $n2= $_POST['n2'];
        $operation = $_POST['operation'];
        $resultat = "";

        switch ($operation) {
            case 'addition':
                $resultat = $n1 + $n2;
                break;
            case 'soustraction':
                $resultat = $n1 - $n2;
                break;
            case 'multiplication':
                $resultat = $n1 * $n2;
                break;
            case 'division':
                if ($nombre2 != 0) {
                    $resultat = $n1 / $n2;
                } else {
                    $resultat = "Erreur  on ne peut pas diviser par 0 !!!";
                }
                break;
            default:
                $resultat = "Opération invalide.";
        }

        echo "<h3>Résultat : $resultat</h3>";
    }
    ?>
	
	
	

</body>
</html>
