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
    // Prepare the UPDATE statement
    $stmt = $conn->prepare("UPDATE registration SET ranking=? WHERE id=?");

    // Check if prepare() succeeded
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    } else {
        // Loop through POST data to update rankings
        foreach ($_POST['ranking'] as $id => $ranking) {
            $id = intval($id); // Ensure $id is an integer for security
            $ranking = intval($ranking); // Ensure $ranking is an integer

            // Bind parameters and execute the statement
            $stmt->bind_param("ii", $ranking, $id);
            if (!$stmt->execute()) {
                echo "Error updating record: (" . $stmt->errno . ") " . $stmt->error;
            }
        }

        // Close statement
        $stmt->close();

        // Redirect back to admin dashboard with success message
        header("Location: admin_dashboard.php?success=1");
        exit;
    }
} else {
    // Redirect to admin dashboard if accessed without POST
    header("Location: admin_dashboard.php");
    exit;
}

// Close connection
$conn->close();
?>
