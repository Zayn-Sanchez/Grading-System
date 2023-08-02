<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
  <title>Grading System Login</title>
  
  
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  
  <div class="container">
    
    <h1>Grading System Login</h1>
    
    <!-- Form for login details submission -->
    <form action="auth.php" id="login-form" method="POST">
      
      <!-- Check if there is an error message and display it -->
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      
      <!-- Field for the student ID -->
      <label for="student-id">Student ID</label>
      <input type="text" id="student_id" name="student_id" required pattern="^\d{8}$" title="Please enter a valid 8-digit student ID." placeholder="12345678">
      
      <!-- Field for the password -->
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required placeholder="Enter your password">
      
      <!-- Login button -->
      <button type="submit">Log in</button>

      <!-- Link for password recovery -->
      <a href="#" class="forgot-password">Forgot Password?</a>
    </form>
  </div>
  
  <script src="scripts.js"></script>
</body>
</html>
