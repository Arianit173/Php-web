<?php
session_start();
require 'config.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!$username || !$password) {
        $message = 'Fill all fields';
    } else {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit;
        } else {
            $message = 'Invalid credentials';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <h2>Login</h2>
        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Signup here</a></p>
    </div>
</body>
</html>
			