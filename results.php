<?php
session_start();

// Retrieve session data
$quiz = $_SESSION['quiz'];
$operation = $_SESSION['operation'];
$answers = $_POST['answers'];
$totalQuestions = count($quiz);

// Calculate correct answers
$correct = 0;
foreach ($quiz as $index => $q) {
    $num1 = $q['num1'];
    $num2 = $q['num2'];

    switch ($operation) {
        case 'add':
            $expected = $num1 + $num2;
            break;
        case 'subtract':
            $expected = $num1 - $num2;
            break;
        case 'multiply':
            $expected = $num1 * $num2;
            break;
        case 'divide':
            $expected = $num2 != 0 ? $num1 / $num2 : 0; // not divide by zero
            break;
    }

    if (round($expected) == round($answers[$index])) {
        $correct++;
    }
}

$incorrect = $totalQuestions - $correct;
$percentage = ($correct / $totalQuestions) * 100;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Your Results</h1>
    <p>Correct Answers: <?= $correct ?></p>
    <p>Incorrect Answers: <?= $incorrect ?></p>
    <p>Score Percentage: <?= round($percentage, 2) ?>%</p>
    <br>
    <a href="index.php"><button>Try Again</button></a>
</body>
</html>





