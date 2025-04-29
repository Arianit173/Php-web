<?php
// try{
// $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");

// $username ="Jack";

// $password= password_hash("password" PASSWORD_DEFAULT);

// $sql ="INSERT INTO users (username,password) VALUES ('$username','$password')";

// $pdo -> exec($sql);
// $last_id = $pdo -> lastInsertId();
// echo "New record creted successfully" .$last_id;
// }

// catch (PDOException $e){
//     echo $e -> getMessage();
// }

// try{
//     $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");  

//     $sql ="ALTER TABLE products DROP COLUMN name";
//     $pdo -> exec($sql);
//     echo "Column droped succesfully";

// }

// catch(PDOException $e){
//     echo $e -> getMessage();
// }

try{
        $pdo = new PDO ("mysql:host=localhost;dbname=db" , "root", "");  
    
        $sql ="DROP TABLE products ";
        $pdo -> exec($sql);
         echo "Table droped succesfully";
    
     }
    
     catch(PDOException $e){
         echo $e -> getMessage();
    }


?>