<?php include "session.php"; include "config.php";
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html><head><title>My Blog</title>
<style>
body { font-family: Arial; background: #f0f0f0; padding: 20px; }
.container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
.post { border-bottom: 1px solid #ccc; padding: 10px 0; }
a { color: blue; text-decoration: none; margin-right: 10px; }
</style></head><body>
<div class="container">
<h2>Welcome, <?= htmlspecialchars($_SESSION["user"]) ?>!</h2>
<p><a href="logout.php">Logout</a> | <a href="post.php">Create New Post</a></p>

<h3>Blog Posts</h3>
<?php while($row = $result->fetch_assoc()): ?>
  <div class="post">
    <h4><?= htmlspecialchars($row['title']) ?></h4>
    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
    <small>By <?= htmlspecialchars($row['author']) ?> | <?= $row['created_at'] ?></small>
  </div>
<?php endwhile; ?>
</div></body></html>
