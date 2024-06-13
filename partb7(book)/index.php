<!DOCTYPE html>
<html>
<head>
    <title>Book Shopping Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Book Shopping Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Book Number: <input type="number" name="book_number" required><br><br>
        Book Title: <input type="text" name="book_title" required><br><br>
        Price: <input type="number" name="price" step="0.01" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "book_info";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    function calDiscount($price, $discount_rate) {
        return ($price * $discount_rate) / 100;
    }
    function calNetBill($price, $quantity, $discount_amount) {
        return ($price * $quantity) - $discount_amount;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $book_number = $_POST["book_number"];
        $book_title = $_POST["book_title"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        switch ($book_number) {
            case 101:
                $discount_rate = 15;
                break;
            case 102:
                $discount_rate = 20;
                break;
            case 103:
                $discount_rate = 25;
                break;
            default:
                $discount_rate = 5;
        }
        $discount_amount = calDiscount($price, $discount_rate);
        $net_bill_amount = calNetBill($price, $quantity, $discount_amount);

        $sql = "INSERT INTO BOOK (book_number, book_title, price, quantity, discount_rate, discount_amount, net_bill_amount) VALUES ('$book_number', '$book_title', '$price', '$quantity', '$discount_rate', '$discount_amount', '$net_bill_amount')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Bill saved successfully.');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        echo "<h2 style='text-align: center;'>Book Bill</h2>";
        echo "<table>";
        echo "<tr><th>Book Number</th><th>Book Title</th><th>Price</th><th>Quantity</th><th>Discount Rate (%)</th><th>Discount Amount</th><th>Net Bill Amount</th></tr>";
        echo "<tr>";
        echo "<td>".$book_number."</td>";
        echo "<td>".$book_title."</td>";
        echo "<td>".$price."</td>";
        echo "<td>".$quantity."</td>";
        echo "<td>".$discount_rate."</td>";
        echo "<td>".$discount_amount."</td>";
        echo "<td>".$net_bill_amount."</td>";
        echo "</tr>";
        echo "</table>";
    }
    $conn->close();
    ?>
</body>
</html>