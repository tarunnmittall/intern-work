<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Signup Form</title>
<link rel="stylesheet" href="signup.css">
<script>
function validateForm() {
  const phone = document.getElementById('phone').value;
  const phonePattern = /^[1-9][0-9]{9}$/;
  if (!phonePattern.test(phone)) {
    alert("Please enter a valid 10-digit WhatsApp number.");
    return false;
  }
  return true;
  let dob = document.getElementById('dob').value;
  if (phone === "" || dob === "") {
    alert("Phone and Date of Birth must be filled out");
    return false;
  }
    return true;
}
// function checkOption() {
//   var dropdown = document.getElementById("part1");
//   var otherPartnerDiv = document.getElementById("otherPartner");
//   var otherPartnerInput = document.getElementById("otherPartnerInput");

//   if (dropdown.value === "other") {
//     otherPartnerDiv.style.display = "block";
//   } else {
//     otherPartnerDiv.style.display = "none";
//     otherPartnerInput.value = ""; // Clear the input field if user selects another option
//   }
// }
// function checkOption2() {
//   var dropdown1 = document.getElementById("part2");
//   var otherPartnerDiv1 = document.getElementById("otherPartner1");
//   var otherPartnerInput1 = document.getElementById("otherPartnerInput1");

//   if (dropdown1.value === "other") {
//     otherPartnerDiv1.style.display = "block";
//   } else {
//     otherPartnerDiv1.style.display = "none";
//     otherPartnerInput1.value = ""; // Clear the input field if user selects another option
//   }
// }
</script>
</head>
<body>
  <nav class="navbar">
    <ul>
      <li><a href="index.html">Home</a></li>
    </ul>
  </nav>
  <div class="container">
    <h2>Signup Form</h2>
    <form action="process_signup.php" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="name">WhatsApp Number</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="name">Date of Birth(DD-MM-YYYY)</label>
        <input type="date" id="dob" name="dob" required>
      </div>
      <div class="form-group">
        <label for="name">City</label>
        <input type="text" id="city" name="city">
      </div>
      <div class="form-group">
        <label for="name">First Event</label>
        <div class="radio-options">
          <input type="radio" id="event_75" name="first_event" value="75+">
          <label for="event_75">75+</label>

          <input type="radio" id="event_90" name="first_event" value="90+">
          <label for="event_90">90+</label>

          <input type="radio" id="event_105" name="first_event" value="105+">
          <label for="event_105">105+</label>

          <input type="radio" id="event_120" name="first_event" value="120+">
          <label for="event_120">120+</label>
        </div>
      </div>
      <!-- <div class="form-group">
        <label for="name">Name of First event Partner</label>
        <input type="text" id="part1" name="part1">
      </div> -->
      <div class="form-group">
        <label for="part1">Name of first event partner</label>
        <select id="part1" name="part1" required>
            <option value="other">Partner not Registered</option>
            <?php include 'fetch_partners.php'; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="name">Second Event</label>
        <div class="radio-options">
          <input type="radio" id="event_75" name="second_event" value="75+">
          <label for="event_75">75+</label>

          <input type="radio" id="event_90" name="second_event" value="90+">
          <label for="event_90">90+</label>

          <input type="radio" id="event_105" name="second_event" value="105+">
          <label for="event_105">105+</label>

          <input type="radio" id="event_120" name="second_event" value="120+">
          <label for="event_120">120+</label>
        </div>
      </div>
      <!-- <div class="form-group">
        <label for="name">Name of Second event Partner</label>
        <input type="text" id="part2" name="part2">
      </div> -->
      <div class="form-group">
        <label for="part2">Name of Second event partner</label>
        <select id="part2" name="part2" required>
            <<option value="other">Partner not Registered</option>
            <?php include 'fetchs_partners.php'; ?>
        </select>
      </div>
      
      <div class="form-group">
        <label for="name">Indian Tree T-Shirt size</label>
        <div class="radio-options">
          <input type="radio" id="small" name="shirt" value="small">
          <label for="small">Small</label>
          <input type="radio" id="medium" name="shirt" value="medium">
          <label for="medium">Medium</label>
          <input type="radio" id="large" name="shirt" value="large">
          <label for="large">Large</label>
          <input type="radio" id="xlarge" name="shirt" value="xlarge">
          <label for="xlarge">X-Large</label>
          <input type="radio" id="xxlarge" name="shirt" value="xxlarge">
          <label for="xxlarge">XX-Large</label>
          <input type="radio" id="xxxlarge" name="shirt" value="xxxlarge">
          <label for="xxxlarge">XXX-Large</label>
          <input type="radio" id="no" name="shirt" value="no">
          <label for="no">i dont need</label>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Indian Tree Shorts Size</label>
        <div class="radio-options">
          <input type="radio" id="small" name="short" value="small">
          <label for="small">Small</label>
          <input type="radio" id="medium" name="short" value="medium">
          <label for="medium">Medium</label>
          <input type="radio" id="large" name="short" value="large">
          <label for="large">Large</label>
          <input type="radio" id="xlarge" name="short" value="xlarge">
          <label for="xlarge">X-Large</label>
          <input type="radio" id="xxlarge" name="short" value="xxlarge">
          <label for="xxlarge">XX-Large</label>
          <input type="radio" id="xxxlarge" name="short" value="xxxlarge">
          <label for="xxxlarge">XXX-Large</label>
          <input type="radio" id="no" name="short" value="no">
          <label for="no">I dont need</label>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Gala dinner Food preference</label>
        <div class="radio-options">
          <input type="radio" id="non-veg" name="food" value="non-veg">
          <label for="non-veg">Non-Vegetarian</label>
          <input type="radio" id="veg" name="food" value="veg">
          <label for="veg">Vegetarian</label>
          <input type="radio" id="no" name="food" value="no">
          <label for="no">I wont be there for gala dinner</label>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Do you want tournament management to arrange your stay</label>
        <div class="radio-options">
          <input type="radio" id="yes" name="stay" value="yes">
          <label for="yes">Yes</label>
          <input type="radio" id="nil" name="stay" value="nil">
          <label for="nil">No</label>
        </div>
      </div>
      <div class="form-group">
        <label for="payment-info">Payment Information</label>
        <p>
            Please pay the fee as follows: <br>
            - ₹4500 for 2 events <br>
            - ₹3000 for 1 event <br>
            If you opted for stay, please pay an additional ₹1500. <br><br>
            The payment may kindly be made in favor of Uttaranchal Tennis Association (Ac.No.-77200200000230 IFSC-BARB0VJDEHR), Bank of Baroda, Dehradun.
        </p>
        <p>
            You can also scan the QR code below to make the payment: <br>
        </p>
        <img src="images/2.jpg" alt="QR Code for Payment" style="width:350px;height:200px;">
      </div>
      <div class="form-group">
        <label for="utr">Payment Reference ID / UTR Number</label>
        <input type="text" id="utr" name="utr" required>
      </div>
      <!-- <div class="form-group">
        <label for="paid">Payment Confirmation <span class="mandatory">*</span></label>
        <div class="checkbox-options">
            <input type="checkbox" id="paid" name="paid" value="yes" required>
            <label for="paid">I confirm that I have made the payment.</label>
        </div>
      </div> -->
      <div class="form-group">
        <label for="name">Have you made the payment?</label>
        <div class="radio-options">
          <input type="radio" id="yes" name="payment" value="yes">
          <label for="yes">Yes</label>
          <input type="radio" id="nil" name="payment" value="nil">
          <label for="nil">No</label>
        </div>
      </div>
      <div class="field">
        <input type="submit" value="Signup" class="signup-button" onclick="openPopup()">
      </div>
      <div class="signup-link">Already a member? <a href="login.html">Login</a></div>
    </form>
  </div>
</body>
</html>