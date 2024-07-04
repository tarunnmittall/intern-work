<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $first_event = $_POST['first_event'];
    $part1 = $_POST['part1'];
    $second_event = $_POST['second_event'];
    $part2 = $_POST['part2'];
    $shirt = $_POST['shirt'];
    $short = $_POST['short'];
    $food = $_POST['food'];
    $stay = $_POST['stay'];
    $payment = $_POST['payment'];

    include 'db_connection.php';

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        // Check if the record with the same phone and dob already exists
        $checkStmt = $conn->prepare("SELECT * FROM registration WHERE phone=? AND dob=?");
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
