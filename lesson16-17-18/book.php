<?php

session_start();
include_once('config.php');

$user_id = $_SESSION['id'];
$movie_id = $_SESSION ['movie_id'];


$nr_tickets = $_POST ['nr_tickets'];
$date = $_POST['date'];
$time = $_POST['time'];


$sql ="INSERT INTO bookings (user_id, movie_id, nr_tickets, data,time) VALUES(:user_id, :movie_id, :nr_tickets, :data,:time)";
$insertMovie = $conn-> prepare($sql);
	
	$insertMovie->bindParam(':user_id', $user_id);
	$insertMovie->bindParam(':movie_id', $movie_id);
	$insertMovie->bindParam(':nr_tickets', $nr_tickets);
	$insertMovie->bindParam(':date', $date);
		$insertMovie->bindParam(':time', $time);

	$insertMovie->execute();
    	header("Location:home.php");
?>