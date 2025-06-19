<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$post_id = (int)$_GET['id'];

// Fetch post and check ownership
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post || $post['user_id'] !== $_SESSION['user_id']) {
    header('Location: index.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    if ($title && $content) {
        $stmt = $pdo->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $stmt->execute([$title, $content, $post_id]);
        header('Location: view.php?id=' . $post_id);
        exit;
    } else {
        $message = 'Please fill in all fields.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 20px auto; padding: 0 15px; }
        input, textarea, button { width: 100%; padding: 10px; margin: 8px 0; border-radius: 4px; border: 1px solid #ccc; }
        button { background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .message { color: red; }
        a { text-decoration:none; color:#007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Edit Post</h1>
    <p><a href="view.php?id=<?= $post_id ?>">Back to Post</a></p>

    <?php if ($message): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form met
