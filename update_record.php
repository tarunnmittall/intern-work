<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? NULL;
    $name = $_POST['name'] ?? NULL;
    $city = $_POST['city'] ?? NULL;
    $first_event = $_POST['first_event'] ?? NULL;
    $part1 = $_POST['part1'] ?? NULL;
    $second_event = $_POST['second_event'] ?? NULL;
    $part2 = $_POST['part2'] ?? NULL;
    $shirt = $_POST['shirt'] ?? NULL;
    $short = $_POST['short'] ?? NULL;
    $food = $_POST['food'] ?? NULL;
    $stay = $_POST['stay'] ?? NULL;
    $payment = $_POST['payment'] ?? NULL;

    include 'db_connection.php';

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        // Update record
        $stmt = $conn->prepare("UPDATE registration SET name=?, city=?, first_event=?, part1=?, second_event=?, part2=?, shirt=?, short=?, food=?, stay=?, payment=? WHERE id=?");
        $stmt->bind_param("sssssssssssi", $name, $city, $first_event, $part1, $second_event, $part2, $shirt, $short, $food, $stay, $payment, $id);
        $stmt->execute();
        echo '<script>
            alert("Record Updated Successfully");
            window.location.href = "login.html";
            </script>';
        $stmt->close();
        $conn->close();
    }
}
?>
