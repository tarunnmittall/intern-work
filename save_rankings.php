<?php
include 'db_connection.php';
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if rankings data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ranking'])) {
    $rankings = $_POST['ranking'];

    foreach ($rankings as $id => $ranking) {
        // Prepare the query
        $query = $conn->prepare("UPDATE registration SET ranking = '$rankings' WHERE id = '$id'");
        $query->bind_param("si", $ranking, $id);

        // Execute the query
        if (!$query->execute()) {
            echo "Error updating ranking for ID $id: " . $query->error;
        }
    }

    // Redirect back to the admin dashboard with the filters applied
    header("Location: admin_dashboard.php?success=1");
    exit();
}
?>
