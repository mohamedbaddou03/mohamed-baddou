<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Exercices</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .success { background-color:rgb(245, 113, 43); color: white; padding: 10px; margin-bottom: 10px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color:rgb(255, 127, 58); color: black; }
        td{background-color:rgb(45, 168, 210);  color: white; }
        td a{
            color: white;
        }
        input[type="text"], input[type="date"] { width: 20%;  }
        button { padding: 5px 10px; background-color:rgb(56, 52, 52); color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        table{
            margin-top: 20PX;
        }
    </style>
</head>
<body>

<?php

require_once 'config.php';


if (isset($_GET['success'])) {
    echo '<div class="success">L\'exercice a été ajouté/mis à jour/supprimé avec succès.</div>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'ajouter') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date_creation = $_POST['date_creation'];
    $sql = "INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $titre, $auteur, $date_creation);
    if ($stmt->execute()) {
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Erreur lors de l'ajout : " . $stmt->error;
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'supprimer') {
    $id = $_GET['id'];
    $sql = "DELETE FROM exercice WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    $stmt->close();
}
$sql = "SELECT * FROM exercice";
$result = $conn->query($sql);
?>
<h2>Ajouter un exercice</h2>
<form method="POST" action="">
    <input type="hidden" name="action" value="ajouter">
    <label for="titre">Titre de l'exercice :</label>
    <input type="text" id="titre" name="titre" required><br><br>
    <label for="auteur">Auteur de l'exercice :</label>
    <input type="text" id="auteur" name="auteur" required><br><br>
    <label for="date_creation">Date de création :</label>
    <input type="date" id="date_creation" name="date_creation" required><br><br>
    <button type="submit">Envoyer</button>
</form>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['titre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['auteur']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_creation']) . "</td>";
                echo "<td>";
                echo "<a href='modifier.php?id=" . htmlspecialchars($row['id']) . "'>Modifier</a> | ";
                echo "<a href='index.php?action=supprimer&id=" . htmlspecialchars($row['id']) . "' onclick=\"return confirm('Voulez-vous vraiment supprimer cet exercice ?');\">Supprimer</a>";
                echo "</td>";
                echo "</tr>";
            }
        } 
        
        
        ?>
    </tbody>
</table>

</body>
</html>