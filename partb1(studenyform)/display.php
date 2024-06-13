<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Data</title>
</head>
<body>
    <h2>User Data</h2>
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $address= $_POST["address"];
    $mobile = $_POST["mobile"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $gender=$_POST["gender"];
    $hobbies = isset($_POST["hobbies"]) ? implode(",",$_POST["hobbies"]) :"";
    $blood_group=$_POST["blood_group"];

    echo"<p><strong>First Name:</strong>$fname</p>";
    echo"<p><strong>Last Name:</strong>$lname</p>";
    echo"<p><strong>Address:</strong>$address</p>";
    echo"<p><strong>Email:</strong>$email</p>";
    echo"<p><strong>Mobile:</strong>$mobile</p>";
    echo"<p><strong>City:</strong>$city</p>";
    echo"<p><strong>State:</strong>$state</p>";
    echo"<p><strong>Gender:</strong>$gender</p>";
    echo"<p><strong>Hobbies:</strong>$hobbies</p>";
    echo"<p><strong>Blood Group:</strong>$blood_group</p>";
}

?>
</body>
</html>