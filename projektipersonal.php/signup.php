<?php include "config.php"; include "session.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["username"];
  $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $user, $pass);
  $stmt->execute();
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html><head><title>Signup</title>
<style>
body { font-family: Arial; background: #eee; padding: 20px; }
.container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
input, button { width: 100%; padding: 10px; margin-top: 10px; }
</style></head><body>
<div class="container">
<h2>Signup</h2>
<form method="post">
  <input name="username" required placeholder="Username">
  <input name="password" type="password" required placeholder="Password">
  <button type="submit">Signup</button>
</form>
<p><a href="login.php">Already have an account?</a></p>
</div></body></html>
