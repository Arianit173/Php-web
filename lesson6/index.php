<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// $my_file = fopen ("ds.text", "w");

// fclose($my_file);
// $my_filename = "ds.text";

// $my_file = fopen($my_filename, 'r');

// $size = filesize($my_filename);

// $my_filedata = fread($my_file,$size);
//  w- write only mode


// r - read only mode


// a - write only mode. Te dhenat ne files ruhen


// w+ , r+ , a+ 

// $file = fopen("ds.txt" , "r");
// while(!feof($file)){
//     echo fgets($file). "<br>";
// }
// fclose($file);

// $my_file = fopen("ds.text" , "r");

// $my_text = "Digital School";

// fwrite($my_file , $my_text);
file_put_contents('ds.txt' , "Add more text");

echo file_get_contents("ds.text");
?>
</body>
</html>