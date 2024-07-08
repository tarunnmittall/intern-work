<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<nav class="navbar">
    <ul>
      <li><a href="login.html">Logout</a></li>
      
    </ul>
</nav>
    <div class="container">
        <h2>My Profile</h2>
        <form action="update_record.php" method="post">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo str_replace('+', ' ', $_GET['name']); ?>">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $_GET['phone']; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $_GET['dob']; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo str_replace('+', ' ',$_GET['city']); ?>">
        </div>

        <div class="form-group">
            <label for="name">First Event</label>
            <div class="radio-options">
                <input type="radio" id="event_75" name="first_event" value="75+" <?php if ($_GET['first_event'] === '75+') echo 'checked'; ?>>
                <label for="event_75">75+</label>
                <input type="radio" id="event_90" name="first_event" value="90+" <?php if ($_GET['first_event'] === '90+') echo 'checked'; ?>>
                <label for="event_90">90+</label>
                <input type="radio" id="event_105" name="first_event" value="105+" <?php if ($_GET['first_event'] === '105+') echo 'checked'; ?>>
                <label for="event_105">105+</label>
                <input type="radio" id="event_120" name="first_event" value="120+" <?php if ($_GET['first_event'] === '120+') echo 'checked'; ?>>
                <label for="event_120">120+</label>
        </div>
        <br>
        <div class="form-group">
            <label for="part1">Name of first event partner</label>
            <input type="text" id="part1" name="part1" value="<?php echo str_replace('+', ' ',$_GET['part1']); ?>">
        </div>

        <div class="form-group">
            <label for="name">Second Event</label>
            <div class="radio-options">
                <input type="radio" id="event_75" name="second_event" value="75+" <?php if ($_GET['second_event'] === '75+') echo 'checked'; ?>>
                <label for="event_75">75+</label>
                <input type="radio" id="event_90" name="second_event" value="90+" <?php if ($_GET['second_event'] === '90+') echo 'checked'; ?>>
                <label for="event_90">90+</label>
                <input type="radio" id="event_105" name="second_event" value="105+" <?php if ($_GET['second_event'] === '105+') echo 'checked'; ?>>
                <label for="event_105">105+</label>
                <input type="radio" id="event_120" name="second_event" value="120+" <?php if ($_GET['second_event'] === '120+') echo 'checked'; ?>>
                <label for="event_120">120+</label>
        </div>
        <br>
        <div class="form-group">
            <label for="part2">Name of second event partner</label>
            <input type="text" id="part2" name="part2" value="<?php echo str_replace('+', ' ', $_GET['part2']); ?>">
        </div>

        <div class="form-group">
            <label for="short">Indian Tree T-Shirt size</label>
            <div class="radio-options">
                <input type="radio" id="small" name="shirt" value="small" <?php if ($_GET['shirt'] === 'small') echo 'checked'; ?>>
                <label for="small">Small</label>
                <input type="radio" id="medium" name="shirt" value="medium" <?php if ($_GET['shirt'] === 'medium') echo 'checked'; ?>>
                <label for="medium">Medium</label>
                <input type="radio" id="large" name="shirt" value="large" <?php if ($_GET['shirt'] === 'large') echo 'checked'; ?>>
                <label for="large">Large</label>
                <input type="radio" id="xlarge" name="shirt" value="xlarge" <?php if ($_GET['shirt'] === 'xlarge') echo 'checked'; ?>>
                <label for="xlarge">X-Large</label>
                <input type="radio" id="xxlarge" name="shirt" value="xxlarge" <?php if ($_GET['shirt'] === 'xxlarge') echo 'checked'; ?>>
                <label for="xxlarge">XX-Large</label>
                <input type="radio" id="xxxlarge" name="shirt" value="xxxlarge"<?php if ($_GET['shirt'] === 'xxxlarge') echo 'checked'; ?>>
                <label for="xxxlarge">XXX-Large</label>
                <input type="radio" id="no" name="shirt" value="no" <?php if ($_GET['shirt'] === 'no') echo 'checked'; ?>>
                <label for="no">i dont need</label>
            </div>
        </div>

        <div class="form-group">
            <label for="short">Indian Tree Shorts size</label>
            <div class="radio-options">
                <input type="radio" id="small" name="short" value="small" <?php if ($_GET['short'] === 'small') echo 'checked'; ?>>
                <label for="small">Small</label>
                <input type="radio" id="medium" name="short" value="medium" <?php if ($_GET['short'] === 'medium') echo 'checked'; ?>>
                <label for="medium">Medium</label>
                <input type="radio" id="large" name="short" value="large" <?php if ($_GET['short'] === 'large') echo 'checked'; ?>>
                <label for="large">Large</label>
                <input type="radio" id="xlarge" name="short" value="xlarge" <?php if ($_GET['short'] === 'xlarge') echo 'checked'; ?>>
                <label for="xlarge">X-Large</label>
                <input type="radio" id="xxlarge" name="short" value="xxlarge" <?php if ($_GET['short'] === 'xxlarge') echo 'checked'; ?>>
                <label for="xxlarge">XX-Large</label>
                <input type="radio" id="xxxlarge" name="short" value="xxxlarge"<?php if ($_GET['short'] === 'xxxlarge') echo 'checked'; ?>>
                <label for="xxxlarge">XXX-Large</label>
                <input type="radio" id="no" name="short" value="no" <?php if ($_GET['short'] === 'no') echo 'checked'; ?>>
                <label for="no">i dont need</label>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Gala dinner Food preference</label>
            <div class="radio-options">
                <input type="radio" id="non-veg" name="food" value="non-veg" <?php if ($_GET['food'] === 'non-veg') echo 'checked'; ?>>
                <label for="non-veg">Non-Vegetarian</label>
                <input type="radio" id="veg" name="food" value="veg" <?php if ($_GET['food'] === 'veg') echo 'checked'; ?>>
                <label for="veg">Vegetarian</label>
                <input type="radio" id="no" name="food" value="no" <?php if ($_GET['food'] === 'no') echo 'checked'; ?>>
                <label for="no">I wont be there for gala dinner</label>
        </div>
        <br>
        <div class="form-group">
            <label for="name">Do you want tournament management to arrange your stay</label>
            <div class="radio-options">
                <input type="radio" id="yes" name="stay" value="yes" <?php if ($_GET['stay'] === 'yes') echo 'checked'; ?>>
                <label for="yes">Yes</label>
                <input type="radio" id="nil" name="stay" value="nil" <?php if ($_GET['stay'] === 'nil') echo 'checked'; ?>>
                <label for="nil">No</label>
        </div>
        <br>
        <div class="form-group">
            <label for="name">Have you made the payment?</label>
            <div class="radio-options">
                <input type="radio" id="yes" name="payment" value="yes" <?php if ($_GET['payment'] === 'yes') echo 'checked'; ?>>
                <label for="yes">Yes</label>
                <input type="radio" id="nil" name="payment" value="nil" <?php if ($_GET['payment'] === 'yes') echo 'checked'; ?>>
                <label for="nil">No</label>
            </div>
        </div>
        <div class="field">
        <input type="submit" value="Update" class="signup-button" onclick="openPopup()">
      </div>
    </form>
</div>
</body>
</html>
