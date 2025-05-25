<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = ''; // Met ton mot de passe si différent
$dbname = 'etudiants_db';

$conn = new mysqli($host, $user, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Sécurisation des données
$nom = isset($_POST['nom']) ? strip_tags($_POST['nom']) : '';
$prenom = isset($_POST['prenom']) ? strip_tags($_POST['prenom']) : '';
$filiere = isset($_POST['filiere']) ? strip_tags($_POST['filiere']) : '';
$age = isset($_POST['age']) ? intval($_POST['age']) : 0;

if ($nom && $prenom && $filiere && $age) {
    // Préparation et exécution de la requête
    $stmt = $conn->prepare("INSERT INTO etudiants (nom, prenom, filiere, age) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nom, $prenom, $filiere, $age);
    
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Bonjour $prenom $nom, vos informations ont été enregistrées en base de données.</p>";
    } else {
        echo "<p style='color:red;'>Erreur lors de l'enregistrement.</p>";
    }

    $stmt->close();
} else {
    echo "<p style='color:red;'>Tous les champs sont obligatoires.</p>";
}

$conn->close();
?>
