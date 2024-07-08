<?php
include 'db_connection.php';
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if rankings data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print out the entire POST array to inspect
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Check if 'rankings' array exists in POST
    if (isset($_POST['rankings']) && is_array($_POST['rankings'])) {
        $rankings = $_POST['rankings'];

        foreach ($rankings as $id => $ranking) {
            // Prepare the query
            $query = $conn->prepare("UPDATE registration SET ranking = ? WHERE id = ?");
            $query->bind_param("si", $ranking, $id);

            // Execute the query
            if (!$query->execute()) {
                echo "Error updating ranking for ID $id: " . $query->error;
            }
        }

        // Redirect back to the admin dashboard with the filters applied
        header("Location: admin_dashboard.php?success=1");
        exit();
    } else {
        echo "No rankings data received.";
    }
}
?>
