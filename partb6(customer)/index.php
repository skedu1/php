<!DOCTYPE html>
<html>
<head>
    <title>Customer Management System</title>
</head>
<body>
<h2>Customer Management System</h2>
<button onclick="showForm('addForm')">Add Customer</button>
<button onclick="showForm('deleteForm')">Delete Customer</button>
<button onclick="showForm('searchForm')">Search Customer</button>
<form method="post">
    <input type="submit" name="sort" value="Sort and Display">
    <input type="submit" name="display" value="Display All">
</form>
<div id="addForm" style="display: none;">
    <h3>Add Customer</h3>
    <form method="post">
        <label>Customer ID:</label>
        <input type="text" name="custid" required><br>
        <label>Name:</label>
        <input type="text" name="cname" required><br>
        <label>Item Purchased:</label>
        <input type="text" name="itemname" required><br>
        <label>Mobile Number:</label>
        <input type="text" name="mobileno" required><br>
        <input type="submit" name="add" value="Add">
    </form>
</div>
<div id="deleteForm" style="display: none;">
    <h3>Delete Customer</h3>
    <form method="post">
        <label>Customer ID:</label>
        <input type="text" name="custid" required><br>
        <input type="submit" name="delete" value="Delete">
    </form>
</div>
<div id="searchForm" style="display: none;">
    <h3>Search Customer</h3>
    <form method="post">
        <label>Customer ID:</label>
        <input type="text" name="custid" required><br>
        <input type="submit" name="search" value="Search">
    </form>
</div>
<script>
    function showForm(formId) {
        var forms = document.getElementsByTagName('div');
        for (var i = 0; i < forms.length; i++) {
            forms[i].style.display = 'none';
        }
        document.getElementById(formId).style.display = 'block';
    }
</script>
</body>
</html>
<?php
$conn = new mysqli("localhost", "root", "", "customer_info");
if (isset($_POST['add'])) {
    $custid = $_POST['custid'];
    $cname = $_POST['cname'];
    $itemname = $_POST['itemname'];
    $mobileno = $_POST['mobileno'];
    if (strlen($mobileno) != 10 || !ctype_digit($mobileno)) {
        echo "Invalid mobile number";
    } else {
        $sql = "INSERT INTO customer VALUES ('$custid', '$cname', '$itemname', '$mobileno')";
        if ($conn->query($sql) === TRUE) {
            echo "Customer added successfully";
        } else {
            echo "Error adding customer: " . $conn->error;
        }
    }
} elseif (isset($_POST['delete'])) {
    $custid = $_POST['custid'];
    $sql = "DELETE FROM customer WHERE custid='$custid'";
    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully";
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
} elseif (isset($_POST['search'])) {
    $custid = $_POST['custid'];
    $sql = "SELECT * FROM customer WHERE custid='$custid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Item</th><th>Mobile</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['custid'] . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['itemname'] . "</td>";
            echo "<td>" . $row['mobileno'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
} elseif (isset($_POST['sort'])) {
    $sql = "SELECT * FROM customer ORDER BY cname";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Item</th><th>Mobile</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['custid'] . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['itemname'] . "</td>";
            echo "<td>" . $row['mobileno'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
} elseif (isset($_POST['display'])) {
    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Item</th><th>Mobile</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['custid'] . "</td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td>" . $row['itemname'] . "</td>";
            echo "<td>" . $row['mobileno'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
}
$conn->close();
?>