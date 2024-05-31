<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h2>Login</h2>
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username"required><br><br>
            <label>Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit"value="Login">
        </form>
    </body>
</html>
<?php
    session_start();
    if(isset($_SESSION['username'])){
       header("Location:welcome.php");
       exit;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
       $name=$_POST['username'];
       $password=$_POST['password'];

    $valid_name='shreyas';
    $valid_password='123';

    if($name===$valid_name && $password===$valid_password){
       $_SESSION['username']=$name;
       echo"<script>alert('logged Successfully..!!');location.href='welcome.php'</script>";
    }else{
       echo"<script>alert('Invalid credentials please try Again..!!');location.href='index.php'</script>";
     }
    }
?>
