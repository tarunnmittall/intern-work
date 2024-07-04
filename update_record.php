<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $first_event = $_POST['first_event'];
    $part1 = $_POST['part1'];
    $second_event = $_POST['second_event'];
    $part2 = $_POST['part2'];
    $shirt = $_POST['shirt'];
    $short = $_POST['short'];
    $food = $_POST['food'];
    $stay = $_POST['stay'];
    $payment=$_POST['payment'];

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
