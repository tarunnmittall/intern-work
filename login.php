<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        include 'db_connection.php';
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT * FROM registration WHERE phone=?");
            $stmt->bind_param("s", $phone);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();             
                if ($data['dob'] === $dob) {
                    header("Location: prefill.php?" . http_build_query($data));
                    exit();
                } else {
                    echo '<script>
                    alert("Not an existing account.Please sign up!!");
                    window.location.href = "signup.php";
                    </script>';
                }
            } else {
                echo '<script>
                alert("Invalid WhatsApp Number or Date of Birth!!!");
                window.location.href = "login.html";
                </script>';
            }
        }
    }
?>
