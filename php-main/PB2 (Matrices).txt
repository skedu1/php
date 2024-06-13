<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Matrix Operations</title>
</head>
<body>
    <form method="post">
        Enter the number of rows: <input type="number" name="rows" value="<?= $_SESSION['rows'] ?? 0 ?>"><br><br>
        Enter the number of columns: <input type="number" name="cols" value="<?= $_SESSION['cols'] ?? 0 ?>"><br><br>
        <input type="submit" name="create" value="Create Matrices">
    </form>

    <?php
    if (isset($_POST['create'])) {
        $_SESSION['rows'] = $_POST['rows'];
        $_SESSION['cols'] = $_POST['cols'];
        $rows = $_SESSION['rows'];
        $cols = $_SESSION['cols'];

        echo '<form method="post">';
        echo '<h3>Matrix A</h3>';
        createMatrixInput('a', $rows, $cols);
        echo '<h3>Matrix B</h3>';
        createMatrixInput('b', $rows, $cols);
        echo '<input type="submit" name="add" value="Add Matrices">';
        echo '<input type="submit" name="multiply" value="Multiply Matrices">';
        echo '</form>';
    }

    if (isset($_POST['add']) || isset($_POST['multiply'])) {
        $rows = $_SESSION['rows'];
        $cols = $_SESSION['cols'];
        $matrixA = getMatrix('a', $rows, $cols);
        $matrixB = getMatrix('b', $rows, $cols);

        if (isset($_POST['add'])) {
            $result = addMatrices($matrixA, $matrixB, $rows, $cols);
            echo '<h3>Result of Addition</h3>';
        } elseif (isset($_POST['multiply'])) {
            $result = multiplyMatrices($matrixA, $matrixB, $rows, $cols);
            echo '<h3>Result of Multiplication</h3>';
        }

        displayMatrix($result, $rows, $cols);
        echo '<br><a href="index.php">Go Back</a>';
    }

    function createMatrixInput($name, $rows, $cols) {
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                echo '<input type="number" name="' . $name . '[]" required>';
            }
            echo '<br>';
        }
    }

    function getMatrix($name, $rows, $cols) {
        $matrix = [];
        $values = $_POST[$name];
        $index = 0;
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $matrix[$i][$j] = $values[$index++];
            }
        }
        return $matrix;
    }

    function addMatrices($matrixA, $matrixB, $rows, $cols) {
        $result = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $result[$i][$j] = $matrixA[$i][$j] + $matrixB[$i][$j];
            }
        }
        return $result;
    }

    function multiplyMatrices($matrixA, $matrixB, $rows, $cols) {
        $result = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $result[$i][$j] = 0;
                for ($k = 0; $k < $cols; $k++) {
                    $result[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                }
            }
        }
        return $result;
    }

    function displayMatrix($matrix, $rows, $cols) {
        echo '<table border="1">';
        for ($i = 0; $i < $rows; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $cols; $j++) {
                echo '<td>' . $matrix[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</body>
</html>
