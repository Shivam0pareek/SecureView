<?php
session_start();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query database for user with given username
  $conn = new mysqli('localhost', 'shivam112', 'm0mandp4p4', 'mydbnew');
  $stmt = $conn->prepare("SELECT id, username, password FROM user_table WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $stmt->close();
  $conn->close();

  // Verify password and log user in
  if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location:\Upload System\display1.php ");
    exit;
  } else {
    $error_msg = "Invalid username or password";
  }
}
?>