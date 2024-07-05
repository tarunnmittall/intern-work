<?php
session_start();

// Replace with your actual admin credentials
$adminPhone = "9318393263"; // Example admin phone number
$adminDob = "2002-12-26"; // Example admin date of birth

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    // Validate admin credentials
    if ($phone === $adminPhone && $dob === $adminDob) {
        // Store session data
        $_SESSION['admin_logged_in'] = true;
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid login credentials.'); window.location.href = 'admin_login.php';</script>";
        exit;
    }
} else {
    // Check if admin is logged in
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        // Redirect to admin login page if not logged in
        header("Location: admin_login.php");
        exit;
    }
}

// Database connection
include 'db_connection.php';

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Filters
$firstEventFilter = isset($_GET['first_event']) ? $_GET['first_event'] : '';
$secondEventFilter = isset($_GET['second_event']) ? $_GET['second_event'] : '';

// Fetch events for filter dropdowns
$firstEventsResult = $conn->query("SELECT DISTINCT first_event FROM registration");
$secondEventsResult = $conn->query("SELECT DISTINCT second_event FROM registration");

// Fetch data from registration table
$sql = "SELECT id, name, phone, first_event, part1, second_event, part2, ranking FROM registration WHERE 1";
if ($firstEventFilter) {
    $sql .= " AND first_event='" . $conn->real_escape_string($firstEventFilter) . "'";
}
if ($secondEventFilter) {
    $sql .= " AND second_event='" . $conn->real_escape_string($secondEventFilter) . "'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        select {
            width: 100%;
        }
    </style>
    <script>
        function submitFilterForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
</head>
<body>
    <link rel="stylesheet" href="table.css">
<nav class="navbar">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">About</a></li>
    </ul>
</nav>
    <h1>Admin Dashboard - Report</h1>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <p style="color: green;">Rankings have been saved successfully!</p>
    <?php endif; ?>

    <form id="filterForm" method="get" action="">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>
                        First Event<br>
                        <select name="first_event" onchange="submitFilterForm()">
                            <option value="">All</option>
                            <?php while($row = $firstEventsResult->fetch_assoc()) {
                                $selected = ($row['first_event'] == $firstEventFilter) ? 'selected' : '';
                                echo "<option value='" . htmlspecialchars($row['first_event']) . "' $selected>" . htmlspecialchars($row['first_event']) . "</option>";
                            } ?>
                        </select>
                    </th>
                    <th>Phone Number</th>
                    <th>First Event Partner</th>
                    <th>
                        Second Event<br>
                        <select name="second_event" onchange="submitFilterForm()">
                            <option value="">All</option>
                            <?php while($row = $secondEventsResult->fetch_assoc()) {
                                $selected = ($row['second_event'] == $secondEventFilter) ? 'selected' : '';
                                echo "<option value='" . htmlspecialchars($row['second_event']) . "' $selected>" . htmlspecialchars($row['second_event']) . "</option>";
                            } ?>
                        </select>
                    </th>
                    <th>Second Event Partner</th>
                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        if(!is_null($row['ranking'])){
                            $ranking = htmlspecialchars($row['ranking']);
                        }
                        else{
                            $ranking="";
                        }
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['first_event']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['part1']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['second_event']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['part2']) . "</td>";
                        echo "<td><input type='text' name='ranking[" . htmlspecialchars($row['id']) . "]' value='" . $ranking . "'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </form>

    <form method="post" action="save_rankings.php">
        <input type="hidden" name="first_event_filter" value="<?php echo htmlspecialchars($firstEventFilter); ?>">
        <input type="hidden" name="second_event_filter" value="<?php echo htmlspecialchars($secondEventFilter); ?>">
        <div style="text-align:center;">
            <input type="submit" value="Save Rankings">
        </div>
    </form>
</body>
</html>
