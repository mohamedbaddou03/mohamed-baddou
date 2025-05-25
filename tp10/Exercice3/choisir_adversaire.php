<?php
require_once 'config.php';
require_once 'Guerrier.php';

$id_attaquant = $_GET['attaquant'];

$stmt = $conn->prepare("SELECT * FROM guerriers WHERE id = ?");
$stmt->bind_param("i", $id_attaquant);
$stmt->execute();
$attaquant_data = $stmt->get_result()->fetch_assoc();

$stmt_defenseurs = $conn->prepare("SELECT * FROM guerriers WHERE id != ?");
$stmt_defenseurs->bind_param("i", $id_attaquant);
$stmt_defenseurs->execute();
$res_defenseurs = $stmt_defenseurs->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choisir un adversaire pour attaquer</title>
</head>
<body>
    <h3>Le guerrier : <?= htmlspecialchars($attaquant_data['nom']) ?></h3>
    <p>Veuillez choisir un adversaire pour commencer l'attaque :</p>
    <ul>
        <?php while ($def = $res_defenseurs->fetch_assoc()): ?>
            <li>
                <a href="combattre.php?attaquant=<?= $attaquant_data['id'] ?>&defenseur=<?= $def['id'] ?>">
                    <?= htmlspecialchars($def['nom']) ?> (Dégâts : <?= $def['degats'] ?>/100)
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>