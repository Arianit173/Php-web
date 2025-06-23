<?php include "session.php"; include "config.php";
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $content = $_POST["content"];
  $author = $_SESSION["user"];
  $stmt = $conn->prepare("INSERT INTO posts (title, content, author) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $title, $content, $author);
  $stmt->execute();
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html><head><title>New Post</title>
<style>
body { font-family: Arial; background: #eee; padding: 20px; }
.container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
input, textarea, button { width: 100%; padding: 10px; margin-top: 10px; }
</style></head><body>
<div class="container">
<h2>Create New Post</h2>
<form method="post">
  <input name="title" required placeholder="Post Title">
  <textarea name="content" required rows="6" placeholder="Your content here..."></textarea>
  <button type="submit">Post</button>
</form>
<p><a href="index.php">← Back to blog</a></p>
</div></body></html>
