<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = strip_tags($_POST['titre'] ?? '');
    $nom = strip_tags($_POST['nom'] ?? '');
    $prenom = strip_tags($_POST['prenom'] ?? '');
    $annee = filter_var($_POST['annee'] ?? 0, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1900, 'max_range' => date('Y')]
    ]);
    $identifiant = strip_tags($_POST['identifiant'] ?? '');
    $mdp = strip_tags($_POST['mdp'] ?? '');
    $sexe = ($_POST['sexe'] ?? '') === 'F' ? 'F' : 'M';
    $debutant = isset($_POST['debutant']);
    $mot = ($sexe === 'F') ? 'débutante' : 'débutant';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Confirmation d'inscription</h1>
    
    <p>Bonjour <?= strip_tags("$titre $prenom $nom") ?> </p>
    
    <h2>Vos informations :</h2>
    <ul>
        <li><strong>Identifiant</strong> : <?= strip_tags($identifiant) ?></li>
        <!-- Supprimer cette ligne si tu veux éviter d’afficher le mot de passe -->
        <li><strong>Mot de passe</strong> : <?= str_repeat('*', strlen($mdp)) ?></li>
        <li><strong>Année de naissance</strong> : <?= $annee ?: 'non précisée' ?></li>
    </ul>
    
    <?php if ($debutant): ?>
        <p>Comme vous êtes <strong><?= $mot ?></strong>, c'est une excellente idée de commencer à apprendre à programmer en PHP !</p>
    <?php endif; ?>
    
    <?php if ($annee): ?>
        <h3>Faits marquants de votre année de naissance :</h3>
        <iframe src="https://fr.wikipedia.org/wiki/<?= strip_tags($annee) ?>" 
                width="80%" 
                height="400"
                style="border:1px solid #ddd;"></iframe>
    <?php endif; ?>

</body>
</html>


