<?php
require_once 'config.php';
require_once 'Guerrier.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des guerriers</title>
</head>
<body>
    <h2>Liste des guerriers</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Dégâts</th>
            <th>Actions</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM guerriers");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nom']}</td>
                    <td>{$row['degats']}/100</td>
                    <td>
                        <a href='choisir_adversaire.php?attaquant={$row['id']}'>Choisir pour attaquer</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>