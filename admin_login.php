<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <nav class="navbar">
    <ul>
      <li><a href="index.html">Home</a></li>
    </ul>
  </nav>
  <div class="container">
    <h2>Admin Login</h2>
    <form id="adminLoginForm" action="admin_dashboard.php" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="phone">WhatsApp Number</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth(DD-MM-YYYY)</label>
        <input type="date" id="dob" name="dob" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Admin Login">
      </div>
    </form>
  </div>
  <script>
    function validateForm() {
      const phone = document.getElementById('phone').value;
      const phonePattern = /^[1-9][0-9]{9}$/;
      if (!phonePattern.test(phone)) {
        alert("Please enter a valid 10-digit WhatsApp number.");
        return false;
      }
      const dob = document.getElementById('dob').value;
      if (dob === "") {
        alert("Date of Birth must be filled out");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
