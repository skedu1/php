<!DOCTYPE html>
<html>

<head>
    <title>Form Submission Result</title>
</head>

<body>
    <h2>Form Submission Result</h2>
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST["name"];
$email=$_POST["email"];
$message=$_POST["message"];
echo"<p><strong>Name:</strong>$name</p>";
echo"<p><strong>Email:</strong>$email</p>";
echo"<p><strong>Message:</strong>$message</p>";
}
?>
</body>

</html>