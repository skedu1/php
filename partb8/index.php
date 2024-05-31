<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation System</title>
</head>
<body>
    <h2>Hotel Reservation System</h2>
    <h3>Insert Records</h3>
    <form method="post">
        Room Number: <input type="number" name="room_number" required><br>
        Room Type: <input type="text" name="room_type" required><br>
        Capacity: <input type="number" name="capacity" required><br>
        Status: <select name="status" required>
                    <option value="available">Available</option>
                    <option value="booked">Booked</option>
                </select><br>
        <input type="submit" name="insert" value="Insert Record">
    </form>
    <?php
    $conn = new mysqli("localhost", "root", "", "hotel_reservation");
    if (isset($_POST['insert'])) {
        $room_number = $_POST["room_number"];
        $room_type = $_POST["room_type"];
        $capacity = $_POST["capacity"];
        $status = $_POST["status"];
        $sql_insert = "INSERT INTO rooms (room_number, room_type, capacity, status) VALUES ('$room_number', '$room_type', '$capacity', '$status')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
    <h3>Available Rooms</h3>
    <?php
    $sql_available = "SELECT * FROM rooms WHERE status = 'available'";
    $result_available = $conn->query($sql_available);
    if ($result_available->num_rows > 0) {
        echo "<table border='1'>
        <tr><th>Room Number</th><th>Room Type</th><th>Capacity</th></tr>";
        while($row = $result_available->fetch_assoc()) {
            echo "<tr><td>" . $row["room_number"] . "</td><td>" . $row["room_type"] . "</td><td>" . $row["capacity"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No available rooms.";
    }
    ?>
    <h3>Booked Rooms</h3>
    <?php
    $sql_booked = "SELECT * FROM rooms WHERE status = 'booked'";
    $result_booked = $conn->query($sql_booked);
    if ($result_booked->num_rows > 0) {
        echo "<table border='1'>
        <tr><th>Room Number</th><th>Room Type</th><th>Capacity</th></tr>";
        while($row = $result_booked->fetch_assoc()) {
            echo "<tr><td>" . $row["room_number"] . "</td><td>" . $row["room_type"] . "</td><td>" . $row["capacity"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No booked rooms.";
    }
    ?>
    <h3>Check-out</h3>
    <form method="post">
        Room Number: <input type="number" name="room_number" required><br>
        <input type="submit" name="check_out" value="Check-out">
    </form>
    <h3>Check-in</h3>
    <form method="post">
        Room Number: <input type="number" name="room_number" required><br>
        <input type="submit" name="check_in" value="Check-in">
    </form>
    <?php
    if (isset($_POST['check_out'])) {
        $room_number = $_POST["room_number"];
        $sql_check_room = "SELECT * FROM rooms WHERE room_number = '$room_number' AND status = 'booked'";
        $result_check_room = $conn->query($sql_check_room);
        if ($result_check_room->num_rows == 1) {
            $sql_check_out = "UPDATE rooms SET status = 'available' WHERE room_number = '$room_number'";
            if ($conn->query($sql_check_out) === TRUE) {
                echo "Room checked out successfully.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Room is either not booked or does not exist.";
        }
    }
    if (isset($_POST['check_in'])) {
        $room_number = $_POST["room_number"];
        $sql_check_room = "SELECT * FROM rooms WHERE room_number = '$room_number' AND status = 'available'";
        $result_check_room = $conn->query($sql_check_room);
        if ($result_check_room->num_rows == 1) {
            $sql_check_in = "UPDATE rooms SET status = 'booked' WHERE room_number = '$room_number'";
            if ($conn->query($sql_check_in) === TRUE) {
                echo "Room checked in successfully.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Room is not available for check-in.";
        }
    }
    $conn->close();
    ?>
</body>
</html>