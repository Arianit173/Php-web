<?php
require 'config.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (!$username || !$password) {
        $message = 'Please fill all fields';
    } elseif ($password !== $password_confirm) {
        $message = 'Passwords do not match';
    } else {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $message = 'Username taken';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
            if ($stmt->execute([$username, $hash])) {
                header('Location: login.php');
                exit;
            } else {
                $message = 'Signup failed';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body { font-family: Arial; background: #eee; display: flex; justify-content:center; align-items:center; height: 100vh; }
        .container { background:#fff; padding: 25px; border-radius: 6px; box-shadow: 0 0 10px #ccc; width: 320px; }
        input, button { width: 100%; padding: 10px; margin: 8px 0; }
        button { background: #007bff; color:#fff; border:none; cursor:pointer; }
        button:hover { background: #0056b3; }
        .message { color: red; margin-bottom: 10px; }
        a { text-decoration:none; color:#007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST" action="signup.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirm" placeholder="Confirm Password" required>
            <button type="submit">Signup</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
