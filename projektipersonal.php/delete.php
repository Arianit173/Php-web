<?php
include "session.php";
include "config.php";

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
  die("Post ID i pavlefshëm.");
}

$id = (int)$_GET["id"];


$stmt = $conn->prepare("SELECT author FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($author);
if (!$stmt->fetch()) {
  $stmt->close();
  die("Postimi nuk u gjet.");
}
$stmt->close();

if ($_SESSION["user"] !== $author) {
  die("⛔ Nuk ke leje me fshi këtë postim.");
}


$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: index.php");
exit();
