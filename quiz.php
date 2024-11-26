<?php
session_start();

// Retrieve settings from the form submission
$operation = $_POST['operation']; // The selected operation ( add, subtract, multiply,and divide.)
$level = $_POST['level'];         // Difficulty level (1 for easy, 2 for hard)
$questions = $_POST['questions']; // Number of quiz questions ( 10, 20, 30)

$_SESSION['operation'] = $operation;
$_SESSION['level'] = $level;
$_SESSION['questions'] = $questions;


$max = $level == 1 ? 50 : 100; 
$quiz = [];

for ($i = 0; $i < $questions; $i++) {
    $num1 = rand(1, $max);
    $num2 = rand(1, $max);
    $quiz[] = ['num1' => $num1, 'num2' => $num2];
}


$_SESSION['quiz'] = $quiz;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Quiz</title>
</head>
<body>
    <h1>Answer the Questions</h1>
    <form method="post" action="results.php">
        <?php
        foreach ($quiz as $index => $q) {
            echo "<p>Question " . ($index + 1) . ": ";
            echo "{$q['num1']} " . ($operation == 'add' ? '+' : ($operation == 'subtract' ? '-' : ($operation == 'multiply' ? '×' : '÷'))) . " {$q['num2']} = ";
            echo "<input type='number' name='answers[]' required></p>";
        }
        ?>
        <button type="submit">Submit Answers</button>
    </form>
</body>
</html>
