<?php
include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $dob = isset($_POST['dob']) ? $_POST['dob'] : null;
    $city = isset($_POST['city']) ? $_POST['city'] : null;
    $first_event = isset($_POST['first_event']) ? $_POST['first_event'] : null;
    $part1 = isset($_POST['part1']) ? $_POST['part1'] : null;
    $second_event = isset($_POST['second_event']) ? $_POST['second_event'] : null;
    $part2 = isset($_POST['part2']) ? $_POST['part2'] : null;
    $shirt = isset($_POST['shirt']) ? $_POST['shirt'] : null;
    $short = isset($_POST['short']) ? $_POST['short'] : null;
    $food = isset($_POST['food']) ? $_POST['food'] : null;
    $stay = isset($_POST['stay']) ? $_POST['stay'] : null;
    $payment = isset($_POST['payment']) ? $_POST['payment'] : null;

    
    include 'db_connection.php';
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        // Check if the record with the same phone and dob already exists
        $checkStmt = $conn->prepare("SELECT * FROM registration WHERE phone=? OR dob=?");
        $checkStmt->bind_param("ss", $phone, $dob);
        $checkStmt->execute();
        $checkStmtResult = $checkStmt->get_result();

        if ($checkStmtResult->num_rows > 0) {
            // Record already exists
            echo '<script>
                alert("Record with the same WhatsApp number and Date of Birth already exists.");
                window.location.href = "login.html";
                </script>';
        } else {
            // Insert new record
            $stmt = $conn->prepare("INSERT INTO registration(name, phone, dob, city, first_event, part1, second_event, part2, shirt, short, food, stay, payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssssss", $name, $phone, $dob, $city, $first_event, $part1, $second_event, $part2, $shirt, $short, $food, $stay, $payment);
            $stmt->execute();
            echo '<script>
                alert("Record Created Successfully");
                window.location.href = "login.html";
                </script>';
            $stmt->close();
        }
        $checkStmt->close();
        $conn->close();
    }
}
?>
