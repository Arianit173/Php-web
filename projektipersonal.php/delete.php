<?php include "session.php"; include "config.php";
if (!isset($_SESSION["user"])) header("Location: login.php");

$id = $_GET["id"];
$stmt = $conn->prepare("SELECT author FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($author);
$stmt->fetch();
$stmt->close();

if ($_SESSION["user"] !== $author) die("Nuk ke leje me fshi!");

$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
