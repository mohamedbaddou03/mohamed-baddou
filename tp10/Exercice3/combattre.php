<?php
require_once 'config.php';
require_once 'Guerrier.php';

$id_attaquant = $_GET['attaquant'];
$id_defenseur = $_GET['defenseur'];


function getGuerrierById($id, $conn) {
    $stmt = $conn->prepare("SELECT * FROM guerriers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

$data_attaquant = getGuerrierById($id_attaquant, $conn);
$data_defenseur = getGuerrierById($id_defenseur, $conn);


$attaquant = new Guerrier($data_attaquant['id'], $data_attaquant['nom'], $data_attaquant['degats']);
$defenseur = new Guerrier($data_defenseur['id'], $data_defenseur['nom'], $data_defenseur['degats']);


$attaquant->frapper($defenseur, $conn);


header("Location: afficher_guerriers.php");
exit();
?>