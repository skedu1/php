<!DOCTYPE html>
<html>
    <head>
        <title>Student Registration Form</title>
    </head>
    <body>
        <h2>Student Registration Form</h2>
        <form action="Display.php" method="post">
            <label for="fname">First Name:</label><br>
            <input type="text" id="fname" name="fname"><br>

            <label for="lname">Last Name:</label><br>
            <input type="text" id="lname" name="lname"><br>

            <label for="address">Address:</label><br>
            <textarea id="address" name="address"></textarea><br>

            <label for="email">E-Mail:</label><br>
            <input type="text" id="email" name="email"><br>

            
            <label for="mobile">Mobile:</label><br>
            <input type="text" id="mobile" name="mobile"><br>

            
            <label for="city">City:</label><br>
            <input type="text" id="city" name="city"><br>

            
            <label for="state">State:</label><br>
            <input type="text" id="state" name="state"><br>


            
            <label for="gender">Gender:</label>
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female"><br>

            
            <label for="hobbies">Hobbies:</label><br>
            <input type="checkbox" id="hobby1" name="hobbies[]" value="reading">
            <label for="hobby1">Reading:</label><br>
            <input type="checkbox" id="hobby2" name="hobbies[]" value="sports"> 
            <label for="hobby2">Sports:</label><br>
            <input type="checkbox" id="hobby3" name="hobbies[]" value="music">
            <label for="hobby3">Music:</label><br>

            
            <label for="blood_group">Blood_Group:</label><br>
            <select id="blood_group" name="blood_group">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </from>
    </body>
</html>