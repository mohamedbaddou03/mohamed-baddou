<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un exercice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .success { background-color: #f44336; color: white; padding: 10px; margin-bottom: 10px; }
        input[type="text"], input[type="date"] { width: 30%; }
        button { padding: 5px 10px; background-color:rgb(118, 125, 119); color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

<?php

require_once 'config.php';

if (isset($_GET['success'])) {
    echo '<div class="success">L\'exercice a été mis à jour avec succès.</div>';
}

$id = $_GET['id'];

$sql = "SELECT * FROM exercice WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Exercice non trouvé.";
    exit();
}

$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'modifier') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_creation = $_POST['date_creation'];

    $sql = "UPDATE exercice SET titre = ?, auteur = ?, date_creation = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titre, $auteur, $date_creation, $id);

    if ($stmt->execute()) {
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . $stmt->error;
    }

    $stmt->close();
}
?>


<h2>Modifier un exercice</h2><hr>
<form method="POST" action="">
    <input type="hidden" name="action" value="modifier">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

    <label for="titre">Titre de l'exercice :</label>
    <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($row['titre']); ?>" required><br><br>

    <label for="auteur">Auteur de l'exercice :</label>
    <input type="text" id="auteur" name="auteur" value="<?php echo htmlspecialchars($row['auteur']); ?>" required><br><br>

    <label for="date_creation">Date de création :</label>
    <input type="date" id="date_creation" name="date_creation" value="<?php echo htmlspecialchars($row['date_creation']); ?>" required><br><br>

    <button type="submit">Modifier</button>
</form>

</body>
</html>