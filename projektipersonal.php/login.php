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
    $error = "⚠️ Login failed: incorrect username or password.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e1f5fe, #fce4ec);
    }

    .container {
      max-width: 400px;
      margin: 80px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #1976d2;
    }

    form input {
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    form button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      background: #00bcd4;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    form button:hover {
      background: #0097a7;
    }

    .error {
      background: #ffebee;
      color: #c62828;
      padding: 10px;
      margin-bottom: 15px;
      border-left: 5px solid #e53935;
      border-radius: 6px;
    }

    p {
      text-align: center;
      margin-top: 15px;
    }

    a {
      color: #1976d2;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Login</h2>
  <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
  <form method="post">
    <input name="username" required placeholder="Username">
    <input name="password" type="password" required placeholder="Password">
    <button type="submit">Login</button>
  </form>
  <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</div>
</body>
</html>
