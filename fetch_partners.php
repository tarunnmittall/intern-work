<?php
// die("Unable to connect to ");
include 'db_connection.php';
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data based on the selected radio button value
$sql = "SELECT name FROM registration";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row["name"]) . '">' . htmlspecialchars($row["name"]) . '</option>';
    }
} else {
    echo '<option>No partners found</option>';
}

?>
