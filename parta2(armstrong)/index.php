<!DOCTYPE html>
<head>
    <title>Armstrong Number Checker</title>
</head>
<body>
    <h2>Armstrong Number Checker</h2>
    <form method="post">
        <label>Enter a number:</label>
        <input type="text" name="number" value="<?= htmlspecialchars($_POST['number'] ?? '') ?>" required>
        <input type="submit" value="Check"> 
    </form>
    <?php
    function isArmstrong($num) {
        $sum = 0;
        $digits = strlen($num);
        foreach (str_split($num) as $digit) {
            $sum += pow($digit, $digits);
        }
        return $num == $sum;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputNumber = $_POST["number"];
        if (ctype_digit($inputNumber) && $inputNumber > 0) {
            echo "<h3>Results:</h3>";
            if (isArmstrong($inputNumber)) {
                echo "<p>$inputNumber is an Armstrong number</p><p>Armstrong numbers up to $inputNumber:</p>";
                for ($i = 1; $i <= $inputNumber; $i++) {
                    if (isArmstrong($i)) echo "$i, ";
                }
            } else {
                echo "<p>$inputNumber is not an Armstrong number</p>";
            }
        } else {
            echo "<p>Please enter a valid positive number</p>";
        }
    }
    ?> 
</body>
</html>
