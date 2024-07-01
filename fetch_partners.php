<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "intern";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

// Fetching data based on the selected radio button value
$sql = "SELECT part1 FROM registration";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row["part1"]) . '">' . htmlspecialchars($row["part1"]) . '</option>';
    }
} else {
    echo '<option>No partners found</option>';
}

?>
