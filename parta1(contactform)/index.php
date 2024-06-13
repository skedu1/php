<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
</head>

<body>
    <h2>Contact Form</h2>
    <form action="submit_form.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="message">Message:</label><br>
        <textarea id="messsage" name="message"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>