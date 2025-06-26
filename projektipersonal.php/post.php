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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Post</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f3e5f5, #e0f7fa);
    }

    .container {
      max-width: 600px;
      margin: 60px auto;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #7b1fa2;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    form button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background: #7b1fa2;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    form button:hover {
      background: #6a1b9a;
    }

    p {
      text-align: center;
      margin-top: 20px;
    }

    a {
      color: #1976d2;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Create New Post</h2>
  <form method="post">
    <input name="title" required placeholder="Post Title">
    <textarea name="content" required rows="6" placeholder="Your content here..."></textarea>
    <button type="submit">Post</button>
  </form>
  <p><a href="index.php">← Back to blog</a></p>
</div>
</body>
</html>
