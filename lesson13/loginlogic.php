<?php
include_once('config.php');

if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $surname= $_POST['surname'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $tempPass= $_POST['password'];
    $password= password_hash($tempPass, PASSWORD_DEFAULT);
    
}

if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password)){
    echo "You need to fill all of the fields";
}

?>