<?php
   $username = $_GET ['username'];
   $password = $_GET ['passowrd'];


echo $username;
echo "<br>";
echo $password;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="getMetoda.php" method="get"></form>

    <label for="username" >Username</label>
    <input type="text" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">

   <input type="submit" value="submit">
</body>
</html>


