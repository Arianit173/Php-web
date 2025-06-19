<?php
session_start();
require 'config.php';

// Add new post (only if logged in)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title && $content) {
        $stmt = $pdo->prepare('INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)');
        $stmt->execute([$_SESSION['user_id'], $title, $content]);
        header('Location: index.php');
        exit;
    }
}

// Fetch posts
$stmt = $pdo->query('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC');
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Blog</title>
    <style>
        body { font-family: Arial; max-width: 800px; margin: 20px auto; padding: 0 15px; }
        header { display: flex; justify-content: space-between; align-items: center; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .post { border-bottom: 1px solid #ccc; padding: 15px 0; }
        .post h3 { margin: 0 0 5px; }
        .post p { white-space: pre-wrap; }
        form { margin-top: 30px; }
        input[type="text"], textarea {
            width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            background: #007bff; color: #fff; border: none; padding: 12px 20px;
            border-radius: 4px; cursor: pointer;
        }
        button:hover { background: #0056b3; }
        .logout { margin-left: 20px; font-size: 14px; }
    </style>
</head>
<body>

<header>
    <h1>Simple Blog</h1>
    <div>
    <?php if (isset($_SESSION['user_id'])): ?>
        Hello, <?=htmlspecialchars($_SESSION['username'])?> |
        <a href="logout.php" class="logout">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a> | <a href="signup.php">Signup</a>
    <?php endif; ?>
    </div>
</header>

<?php foreach ($posts as $post): ?>
    <div class="post">
        <h3><?=htmlspecialchars($post['title'])?></h3>
        <small>By <?=htmlspecialchars($post['username'])?> on <?=htmlspecialchars($post['created_at'])?></small>
        <p><?=nl2br(htmlspecialchars($post['content']))?></p>
    </div>
<?php endforeach; ?>

<?php if (isset($_SESSION['user_id'])): ?>
    <form method="POST" action="index.php">
        <h2>Add New Post</h2>
        <input type="text" name="title" placeholder="Post Title" required>
        <textarea name="content" rows="5" placeholder="Post Content" required></textarea>
        <button type="submit">Add Post</button>
    </form>
<?php else: ?>
    <p><em>You must be logged in to add posts.</em></p>
<?php endif; ?>

</body>
</html>
