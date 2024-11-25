<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Setup</title>
</head>
<body>
    <h1>Welcome to the Calculator Quiz</h1>
    <form method="post" action="quiz.php">
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
