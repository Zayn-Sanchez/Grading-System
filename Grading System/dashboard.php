<?php 
//Initialise the session
session_start();

//Function to check if the session has expired
function isSessionExpired() {
    //Session expiration time 1 minute
    $expirationTime = 1 * 60;

    //Check if a session variable 'last_activity' exists and if the session has expired
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $expirationTime) {
        return true; //The session has expired
    }

    //Updating 'last_activity' session variable with the current time
    $_SESSION['last_activity'] = time();

    return false; //The session is still valid
}

//Check if the session has expired
if (isSessionExpired()) {
    //Destroy the session
    session_unset();
    session_destroy();

    //Redirect the user to the login page
    header("Location: index.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grading System Dashboard</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Grading System Dashboard</h1>
    <form id="grades-form">
      <!-- Module 1 -->
      <div class="module">
        <h2>COMP7001 Object-Oriented Programming (20 credits)</h2>
        <label for="comp7001-marks">Marks</label>
        <input type="number" id="comp7001-marks" name="comp7001-marks" min="0" max="100" required>
      </div>
      <!-- Module 2 -->
      <div class="module">
        <h2>COMP7002 Modern Computer Systems (20 credits)</h2>
        <label for="comp7002-marks">Marks</label>
        <input type="number" id="comp7002-marks" name="comp7002-marks" min="0" max="100" required>
      </div>
      <!-- Module 3 -->
      <div class="module">
        <h2>TECH7005 Research, Scholarship and Professional Skills (20 credits)</h2>
        <label for="tech7005-marks">Marks</label>
        <input type="number" id="tech7005-marks" name="tech7005-marks" min="0" max="100" required>
      </div>
      <!-- Module 4 -->
      <div class="module">
        <h2>DALT7002 Data Science Foundations (10 credits)</h2>
        <label for="dalt7002-marks">Marks</label>
        <input type="number" id="dalt7002-marks" name="dalt7002-marks" min="0" max="100" required>
      </div>
      <!-- Module 5 -->
      <div class="module">
        <h2>DALT7011 Introduction to Machine Learning (10 credits)</h2>
        <label for="dalt7011-marks">Marks</label>
        <input type="number" id="dalt7011-marks" name="dalt7011-marks" min="0" max="100" required>
      </div>
            <!-- Module 6 -->
            <div class="module">
        <h2>SOFT7003 Advanced Software Development (20 credits)</h2>
        <label for="soft7003-marks">Marks</label>
        <input type="number" id="soft7003-marks" name="soft7003-marks" min="0" max="100" required>
      </div>
      <!-- Module 7 -->
      <div class="module">
        <h2>TECH7004 Cyber Security and the Web (20 credits)</h2>
        <label for="tech7004-marks">Marks</label>
        <input type="number" id="tech7004-marks" name="tech7004-marks" min="0" max="100" required>
      </div>
      <!-- Module 8 -->
      <div class="module">
        <h2>TECH7009 MSc Dissertation in Computing Subjects (60 credits)</h2>
        <label for="tech7009-marks">Marks</label>
        <input type="number" id="tech7009-marks" name="tech7009-marks" min="0" max="100" required>
      </div>
      <!-- Submit button -->
      <button type="submit">Submit</button>
    </form>
    <!-- Logout option -->
    <a href="logout.php">Logout</a>
    <!-- Results will be displayed here -->
    <div id="results" class="hidden">
    </div>
  </div>
 
  <script src="scripts.js"></script>
</body>
</html>
