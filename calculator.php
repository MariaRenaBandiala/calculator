<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <button type="submit" name="calculate">Add</button>
    </form>

    <?php
    if (isset($_POST['calculate'])) {
       
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

       
        $result = $num1 + $num2;

        
        echo "<h2>Result: $result</h2>";
    }
    ?>
</body>
</html>
