<?php
session_start();

if (!isset($_SESSION['quiz']) || !isset($_SESSION['current_question'])) {
    header("Location: setup.php");
    exit;
}

$quiz = $_SESSION['quiz'];
$currentQuestion = $_SESSION['current_question'];
$totalQuestions = count($quiz);

if ($currentQuestion >= $totalQuestions) {
    header("Location: results.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_SESSION['answers'] ?? [];
    $answers[$currentQuestion] = $_POST['answer'];
    $_SESSION['answers'] = $answers;

    $_SESSION['current_question']++;
    header("Location: quiz.php");
    exit;
}

$question = $quiz[$currentQuestion];
$operation = $_SESSION['operation'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question <?= $currentQuestion + 1 ?></title>
</head>
<body>
    <h1>Question <?= $currentQuestion + 1 ?> of <?= $totalQuestions ?></h1>
    <p>
        <?= "{$question['num1']} " . 
            ($operation == 'add' ? '+' : 
            ($operation == 'subtract' ? '-' : 
            ($operation == 'multiply' ? '×' : '÷'))) . " {$question['num2']} = ?"; ?>
    </p>
    <form method="post">
        <?php foreach ($question['choices'] as $choice): ?>
            <div>
                <input type="radio" name="answer" value="<?= htmlspecialchars($choice) ?>" required>
                <label><?= htmlspecialchars($choice) ?></label>
            </div>
        <?php endforeach; ?>
        <button type="submit">Next</button>
    </form>
</body>
</html>
