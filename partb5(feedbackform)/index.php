<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback (name, email,subject,message)VALUES('$name','$email','$subject','$message')";
    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo "<script> alert('Feedback Submitted Sucessfully');</script>";
    }else{
        echo "<script> alert('Failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
    <h2>Feedback Form</h2>
    <form action="" method="post">
        <label for ="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for ="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for ="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br>

        <label for ="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>

        <input type="submit"  name="submit" value="Submit"><br>
</form>
</body>
</html>
