<?php

$quiz = [
    [
        'question' => "Quelle est la capitale de la Maroc ?",
        'options' => ["Dubai", "Paris", "Rabat", "London"],
        'reponse' => 1 
    ],
    [
        'question' => "Quel langage est exécuté côté serveur ?",
        'options' => ["JavaScript", "HTML", "PHP", "CSS"],
        'reponse' => 2 
    ],
    [
        'question' => "Quel est le resulta de 1 + 45 ?",
        'options' => ["46", "11", "10", "13"],
        'reponse' => 0
    ]
];

$score = 0;
$results = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($quiz as $i => $question) {
        $userreponse = $_POST['q'.$i] ?? null;
        $isCorrect = ($userreponse  == $question['reponse']);
        
        $results[$i] = [
            'correct' => $isCorrect,
            'userreponse ' => $userreponse ,
            'correctAnswer' => $question['reponse']
        ];
        
        if ($isCorrect) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mini Quiz</title>
	<link rel="stylesheet" type="text/css" href="TP8_EX6.css">
</head>
<body>
    <h1>Mini Quiz</h1>
    
    <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
    
    <form method="post">
        <?php foreach ($quiz as $i => $question): ?>
        <div class="question">
            <p><strong><?= ($i+1) ?>. <?= htmlspecialchars($question['question']) ?></strong></p>
            <?php foreach ($question['options'] as $j => $option): ?>
            <label>
                <input type="radio" name="q<?= $i ?>" value="<?= $j ?>" required>
                <?= htmlspecialchars($option) ?>
            </label><br>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        
        <button type="submit">Valider le quiz</button>
    </form>
    
    <?php else: ?>
    
    <h2>Résultats</h2>
    
    <?php foreach ($quiz as $i => $question): ?>
    <div class="question">
        <p><strong><?= ($i+1) ?>. <?= htmlspecialchars($question['question']) ?></strong></p>
        <div class="result <?= $results[$i]['correct'] ? 'correct' : 'incorrect' ?>">
            Votre réponse : <?= htmlspecialchars($question['options'][$results[$i]['userreponse ']] ?? 'Aucune') ?><br>
            <?php if (!$results[$i]['correct']): ?>
            Bonne réponse : <?= htmlspecialchars($question['options'][$question['reponse']]) ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
    
    <div class="score">
        Votre score : <?= $score ?> / <?= count($quiz) ?>
    </div>
    
    <a href="../TP8/TP8_EX6.php">Refaire le quiz</a>
    
    <?php endif; ?>
</body>
</html>