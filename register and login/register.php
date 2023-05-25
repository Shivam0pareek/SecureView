<?php
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate form input
  if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    die('Please fill in all fields.');
  }
  if ($password !== $confirm_password) {
    die('Passwords do not match.');
  }

  // Hash password for storage in the database
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Save user information to the database
  $conn = new mysqli('localhost', 'shivam112', 'm0mandp4p4', 'mydbnew');
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  $stmt = $conn->prepare("INSERT INTO user_table (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $hashed_password);
  if ($stmt->execute()) {
    // Redirect user to login page after successful registration
    header('Location:login.php');
    exit();
  } else {
    die('Error: ' . $stmt->error);
  }

  $stmt->close();
  $conn->close();
}
?>