<!DOCTYPE html>
<html>
<head>
    <title>String Manipulation</title>
</head>
<body>
    <h2>String Manipulation</h2>
    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    Enter a string: <input type="text" name="input_string" value="<?= isset($_POST['input_string']) ? htmlspecialchars($_POST['input_string']) : '' ?>" required><br><br>
        <input type="submit" name="get_length" value="Length">
        <input type="submit" name="reverse" value="Reverse">
        <input type="submit" name="uppercase" value="Uppercase">
        <input type="submit" name="lowercase" value="Lowercase">
        <input type="submit" name="replace" value="Replace">
        <input type="submit" name="check_palindrome" value="Check Palindrome">
        <input type="submit" name="shuffle" value="Shuffle">
        <input type="submit" name="word_count" value="Word Count">
    <br><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input_string = $_POST["input_string"];
            if (isset($_POST["get_length"]))      echo "Length: " . strlen($input_string) ;
            elseif (isset($_POST["reverse"]))     echo "Reversed: " . strrev($input_string) ;
            elseif (isset($_POST["uppercase"]))   echo "Uppercase: " . strtoupper($input_string) ;  
            elseif (isset($_POST["lowercase"]))   echo "Lowercase: " . strtolower($input_string) ; 
            elseif (isset($_POST["replace"]))     echo "Replace: " . str_replace('a', 'x', $input_string) ;
            elseif (isset($_POST["check_palindrome"])) echo $input_string == strrev($input_string) ? "Palindrome" : "Not a palindrome" ;
            elseif (isset($_POST["shuffle"]))     echo "Shuffle: " . str_shuffle($input_string) ; 
            elseif (isset($_POST["word_count"]))  echo "Word count: " . str_word_count($input_string) ;                 
        }
        ?>
    </form>
</body>
</html>
