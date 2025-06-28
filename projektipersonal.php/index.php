<?php
include "session.php";
include "config.php";

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Colorful Blog</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f8f9fa, #e0f7fa);
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h2 {
      background: linear-gradient(45deg, #00bcd4, #2196f3);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 32px;
    }

    h3 {
      color: #3f51b5;
      margin-top: 30px;
    }

    .actions {
      margin: 10px 0;
    }

    .actions a {
      display: inline-block;
      padding: 8px 16px;
      margin: 5px 8px 0 0;
      background-color: #ff4081;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .actions a:hover {
      background-color: #e91e63;
    }

    .actions a.delete {
      background-color: #f44336;
    }

    .actions a.delete:hover {
      background-color: #c62828;
    }

    .post {
      border-left: 5px solid #2196f3;
      background: #f0faff;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.05);
      transition: transform 0.2s;
    }

    .post:hover {
      transform: translateY(-3px);
    }

    .post h4 {
      color: #1976d2;
      margin-top: 0;
    }

    .post p {
      color: #333;
      line-height: 1.6;
    }

    .post small {
      display: block;
      margin-top: 10px;
      font-size: 13px;
      color: #555;
    }

    @media (max-width: 600px) {
      .container {
        padding: 20px;
        margin: 20px;
      }

      h2 {
        font-size: 26px;
      }

      .actions a {
        padding: 8px 14px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome, <?= htmlspecialchars($_SESSION["user"]) ?>!</h2>

    <div class="actions">
      <a href="logout.php">Logout</a>
      <a href="post.php">+ New Post</a>
    </div>

    <h3>Blog Posts</h3>

    <?php while($row = $result->fetch_assoc()): ?>
      <div class="post">
        <h4><?= htmlspecialchars($row['title']) ?></h4>
        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
        <small>By <?= htmlspecialchars($row['author']) ?> | <?= $row['created_at'] ?></small>

        <?php if ($_SESSION["user"] === $row["author"]): ?>
          <div class="actions">
            <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('A je i sigurt që don me fshi postimin?')">Delete</a>
          </div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>
