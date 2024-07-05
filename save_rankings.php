<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to admin login page if not logged in
    header("Location: admin_login.php");
    exit;
}

// Database connection
include 'db_connection.php';
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through POST data to update rankings
    foreach ($_POST['ranking'] as $id => $ranking) {
        $id = $conn->real_escape_string($id);
        $ranking = $conn->real_escape_string($ranking);

        // Update the ranking for the corresponding ID in the database
        $sql = "UPDATE registration SET ranking='$ranking' WHERE id='$id'";
        if ($conn->query($sql) !== TRUE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Redirect back to admin dashboard with success message
    header("Location: admin_dashboard.php?success=1");
    exit;
} else {
    // Redirect to admin dashboard if accessed without POST
    header("Location: admin_dashboard.php");
    exit;
}

// Close connection
$conn->close();
?>
