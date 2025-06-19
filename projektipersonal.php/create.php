<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    if ($title && $content) {
        $stmt = $pdo->prepare('INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)');
        $stmt->execute([$_SESSION['user_id'], $title, $content]);
        header('Location: index.php');
        exit;
    } else {
        $message = 'Please fill in all fields.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 20px auto; padding: 0 15px; }
        input, textarea, button { width: 100%; padding: 10px; margin: 8px 0; border-radius: 4px; border: 1px so
</