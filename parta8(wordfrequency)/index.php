<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency Counter</title>
</head>
<body>
    <h2>Word Frequency Counter</h2>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        Enter a string:<input type="text" name="input_string" required><br><br>
        <input type="submit" name="submit" value="Count Words">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input_string = htmlspecialchars($_POST["input_string"]);
        $word_count = array_count_values(str_word_count(strtolower($input_string), 1));
        arsort($word_count);
        echo "<h3>Word Frequency:</h3>";
        foreach ($word_count as $word => $count) {
            echo "$word: $count<br>";
        }
        echo "<h3>Most Used Word:</h3>";
        echo key($word_count) . ": " . current($word_count) . "<br>";
        echo "<h3>Least Used Word:</h3>";
        echo key(array_slice($word_count, -1, 1, true)) . ": " . end($word_count) . "<br>";
    }
    ?>   
</body>
</html>
