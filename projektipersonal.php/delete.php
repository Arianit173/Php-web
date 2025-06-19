<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$post_id = (int)$_GET['id'];

// Check ownership
$stmt = $pdo->prepare('SELECT user_id FROM posts WHERE id = ?');
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post || $post['user_id'] !== $_SESSION['user_id']) {
    header('Location: index.php');
    exit;
}

// Delete post
$stmt = $pdo->prepare('DELETE FROM posts WHERE id = ?');
$stmt->execute([$post_id]);

header('Location: index.php');
exit;
