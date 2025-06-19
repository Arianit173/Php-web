<?php
session_start();
require 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$post_id = (int)$_GET['id'];

$stmt = $pdo->prepare('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?');
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($post['title']) ?></title>
    <style>
        body { font-family: Arial; max-width: 700px; margin: 20px auto; padding: 0 15px; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .post-header { margin-bottom: 20px; }
        .post-actions { margin-top: 20px; }
        button, a.button {
            background: #007bff; color: white; border: none; padding: 8px 16px;
            border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block;
        }
        button:hover, a.button:hover { background: #0056b3; }
    </style>
</head>
<body>

<a href="index.php">← Back to Blog</a>

<div class="post-header">
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <small>By <?= htmlspecialchars($post['username']) ?> on <?= htmlspecialchars($post['created_at']) ?></small>
</div>

<div class="post-content">
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
</div>

<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $post['user_id']): ?>
    <div class="post-actions">
        <a href="edit.php?id=<?= $post_id ?>" class="button">Edit</a>
        <a href="delete.php?id=<?= $post_id ?>" class="button" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
    </div>
<?php endif; ?>

</body>
</html>
