<?php include "session.php"; include "config.php";
if (!isset($_SESSION["user"])) header("Location: login.php");

$id = $_GET["id"];
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if (!$post || $_SESSION["user"] !== $post["author"]) die("Nuk ke leje!");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $content = $_POST["content"];
  $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
  $stmt->bind_param("ssi", $title, $content, $id);
  $stmt->execute();
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html><head><title>Edit Post</title>
<style>
body { font-family: Arial; background: #eee; padding: 20px; }
.container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
input, textarea, button { width: 100%; padding: 10px; margin-top: 10px; }
</style></head><body>
<div class="container">
<h2>Edit Post</h2>
<form method="post">
  <input name="title" required value="<?= htmlspecialchars($post['title']) ?>">
  <textarea name="content" required rows="6"><?= htmlspecialchars($post['content']) ?></textarea>
  <button type="submit">Update</button>
</form>
<p><a href="index.php">← Back</a></p>
</div></body></html>
