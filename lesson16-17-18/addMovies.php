<?php 
include_once('config.php');

if(isset($_POST['submit']))
{
	
	$movies_name = $_POST['movie_name'];
	$movies_desc = $_POST['movie_desc'];
	$movies_quality = $_POST['movie_quality'];
	$movies_rating = $_POST['movie_rating'];
    $movies_image = $_POST['movie_image'];

	$sql = "INSERT INTO movies(movie_name,movie_desc,movie_rating,movie_image) VALUES (:movie_name, :movie_desc,:movie_quality,:movie_rating,movie_image);
	$insertMovie = $conn-> prepare($sql);
	
	$insertMovie->bindParam(':movie_name', $movies_name);
	$insertMovie->bindParam(':movie_desc', $movies_desc);
	$insertMovie->bindParam(':movie_quality', $movies_quality);
	$insertMovie->bindParam(':movie_rating', $movies_rating);
		$insertMovie->bindParam(':movie_image', $movies_image);

	$insertMovie->execute();
    	header("Location:movies.php");
?>