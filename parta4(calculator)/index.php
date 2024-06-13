<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body>
    <h1>PHP Calculator</h1>
    <form method="post">
        <input type="text" name="num1" placeholder="Enter first number" required>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" placeholder="Enter second number" required>
        <input type="submit" value="Calculate">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "<p>Invalid input. Please enter valid numbers.</p>";
    } else {
        $result = $operator == '/' && $num2 == 0 ? "Division by zero is undefined." : eval("return $num1 $operator $num2;");
        echo "<p>The result is: $result</p>";
    }
}
?>
</body>
</html>
