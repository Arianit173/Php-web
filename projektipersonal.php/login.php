<?php include "config.php"; include "session.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
  $stmt->bind_param("s", $user);
  $stmt->execute();
  $stmt->bind_result($hashed);
  if ($stmt->fetch() && password_verify($pass, $hashed)) {
    $_SESSION["user"] = $user;
    header("Location: index.php");
  } else {
    $error = "Login failed";
  }
}
?>
<!DOCTYPE html>
<html><head><title>Login</title>
<style>
body { font-family: Arial; background: #eee; padding: 20px; }
.container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
input, button { width: 100%; padding: 10px; margin-top: 10px; }
</style></head><body>
<div class="container">
<h2>Login</h2>
<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="post">
  <input name="username" required placeholder="Username">
  <input name="password" type="password" required placeholder="Password">
  <button type="submit">Login</button>
</form>
<p><a href="signup.php">Don't have an account?</a></p>
</div></body></html>
