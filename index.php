<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve settings
    $operation = $_POST['operation'] ?? null;
    $level = $_POST['level'] ?? null;
    $questions = $_POST['questions'] ?? null;

    // Validate form inputs
    if ($operation && $level && $questions) {
        $_SESSION['operation'] = $operation;
        $_SESSION['level'] = $level;
        $_SESSION['questions'] = (int)$questions;

        // Generate quiz questions
        $max = $level == 1 ? 50 : 100;
        $quiz = [];

        for ($i = 0; $i < $questions; $i++) {
            $num1 = rand(1, $max);
            $num2 = rand(1, $max);
            $correct_answer = 0;

            switch ($operation) {
                case 'add':
                    $correct_answer = $num1 + $num2;
                    break;
                case 'subtract':
                    $correct_answer = $num1 - $num2;
                    break;
                case 'multiply':
                    $correct_answer = $num1 * $num2;
                    break;
                case 'divide':
                    $correct_answer = $num2 != 0 ? round($num1 / $num2, 2) : 0;
                    break;
            }

            $incorrect_answers = [];
            while (count($incorrect_answers) < 3) {
                $random_answer = rand(1, $max * 2);
                if ($random_answer != $correct_answer && !in_array($random_answer, $incorrect_answers)) {
                    $incorrect_answers[] = $random_answer;
                }
            }

            $choices = array_merge([$correct_answer], $incorrect_answers);
            shuffle($choices);

            $quiz[] = [
                'num1' => $num1,
                'num2' => $num2,
                'choices' => $choices,
                'correct_answer' => $correct_answer
            ];
        }

        $_SESSION['quiz'] = $quiz;
        $_SESSION['current_question'] = 0;
        header("Location: quiz.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Setup</title>
</head>
<body>
    <h1>Welcome to the Calculator Quiz</h1>
    <form method="post" action="">
        <label for="operation">Choose an Operation:</label>
        <select name="operation" id="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select>
        <br><br>

        <label for="level">Choose Difficulty Level:</label>
        <select name="level" id="level" required>
            <option value="1">Level 1 (Easy: Numbers 1-50)</option>
            <option value="2">Level 2 (Hard: Numbers 1-100)</option>
        </select>
        <br><br>

        <label for="questions">Choose Number of Questions:</label>
        <select name="questions" id="questions" required>
            <option value="10">10 Questions</option>
            <option value="20">20 Questions</option>
            <option value="30">30 Questions</option>
        </select>
        <br><br>

        <button type="submit">Start Quiz</button>
    </form>
</body>
</html>
