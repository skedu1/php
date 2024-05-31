<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:index.php");
        exit;
    }
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        echo "<script>alert('logged Out..!!');location.href='index.php'</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>welcome Page</title>
    </head>
    <body>
        <h2>welcome <?php echo $_SESSION['username'];?></h2>
        <p>This is a secure area.You're loggedin.</p>
        <form method="post" action="">
            <input type="submit" name="logout"value="Logout">
        </form> 
    </body>
</html>       
