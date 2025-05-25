<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];

    $stmt = $conn->prepare("SELECT * FROM guerriers WHERE nom = ?");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Ce nom est déjà utilisé !";
    } else {
        $stmt = $conn->prepare("INSERT INTO guerriers (nom, degats) VALUES (?, 0)");
        $stmt->bind_param("s", $nom);
        if ($stmt->execute()) {
            echo "Le guerrier {$nom} a été créé avec succès.";
        } else {
            echo "Une erreur est survenue lors de la création.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Créer un nouveau guerrier</title>
</head>
<body>
    <h2>Créez votre guerrier !</h2>
    <form method="post">
        <label>Nom du guerrier :</label><br>
        <input type="text" name="nom" required><br><br>
        <button type="submit">Créer</button>
    </form>

    <p><a href="afficher_guerriers.php">Afficher tous les guerriers</a></p>
</body>
</html>