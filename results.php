<?php
session_start();

if (!isset($_SESSION['quiz']) || !isset($_SESSION['answers'])) {
    header("Location: setup.php");
    exit;
}

$quiz = $_SESSION['quiz'];
$answers = $_SESSION['answers'];
$totalQuestions = count($quiz);

$correct = 0;
foreach ($quiz as $index => $q) {
    if (round($answers[$index], 2) == round($q['correct_answer'], 2)) {
        $correct++;
    }
}

$incorrect = $totalQuestions - $correct;
$percentage = ($correct / $totalQuestions) * 100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Your Results</h1>
    <p>Correct Answers: <?= htmlspecialchars($correct) ?></p>
    <p>Incorrect Answers: <?= htmlspecialchars($incorrect) ?></p>
    <p>Score Percentage: <?= htmlspecialchars(round($percentage, 2)) ?>%</p>

    <?php if ($percentage == 100): ?>
        <p>Perfect Score! You're a genius!</p>
    <?php elseif ($percentage >= 75): ?>
        <p>Great Job! You passed with flying colors!</p>
    <?php elseif ($percentage >= 50): ?>
        <p>Not bad! But there's room for improvement.</p>
    <?php else: ?>
        <p>Don't give up! Try again and aim for a higher score.</p>
    <?php endif; ?>

    <br>
    <a href="index.php"><button>Try Again</button></a>
</body>
</html>
