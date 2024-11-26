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
            $expected = $num2 != 0 ? $num1 / $num2 : 0; // not divide by
            break;
    }

    if (round($expected) == round($answers[$index])) {
        $correct++;
    }
}

$incorrect = $totalQuestions - $correct;
$percentage = ($correct / $totalQuestions) * 100;
?>



