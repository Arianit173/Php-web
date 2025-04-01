<?php
//  phpinfo();
//  $x="Hello"
//  print_r($x);

// $x="Hello World";
// echo gettype($x);
// $y=5;
// echo gettype($y);
// $z=10.5;
// echo gettype($z);



?>

<?php 

// function displayPhpVersion(){
//     echo "This is PHP" .phpverison();
//     echo "\n";
// }
// displayPhpVersion();




?>
<?php 
// function hello(){
//     echo "Hello World";
// }
// hello();

?>

<?php 
// function sum(){
//     $value =120+20;
//     echo $value;
// }
// sum();
?>

<?php 
// function maximum ($x, $y){
//     if($x > $y){
//         return $x;
//     }else{
//         return $y;
//     }

//     $a=20;
//     $b=30;

//     $test=maximum ($a, $b);
//     echo "THe max of $a and $b is $test";
// }
?>

 <?php 
// function divisible(){
    
//     if(($n % 2) == 0){
//         return"$n eshte e plotpjestueshme 2 ";
//     }else{
//         return "$n nuk eshte e plotpjestueshme me 2";
//     }
// }

// print_r(divisible(4). "<br>");
// print_r(divisible(35). "<br>");
// print_r(divisible(16). "<br>");
// print_r(divisible(3). "<br>");

?>

<?php 
// $x=5;

// function Draw(){
//     $y=8;
//     echo $y;
// }
// echo "\n, $x";
// Draw();


?>

<?php 
// $x=5;
// $y=10;

// function sum(){
//     global $x , $y;
//     $y=$x + $y;
// }
// sum();
// echo $y;
?>

<?php 
// function Counter(){
//     static $counter = 0;
//     $counter++;
//     echo "Vlera e counter eshte: $counter  <br>";
// }
// Counter();
// Counter();
// Counter();
// Counter();
// Counter();

?>

<?php 

// // $sports =array('Real Madrid', 'Barcelona', 'Arsenal', 'Bayern');
// $sports =['Real Madrid', 'Barcelona', 'Arsenal', 'Bayern'];
// // echo $sports[2]
//  echo end($sports);
//  echo count($sports);


?>

<?php 
// $sports= ['Real Madrid', 'Barcelona', 'Arsenal', 'Bayern'];

// $len=count($sports);

// for($i=0; $i<$len; $i++){
//     echo $sports[$i], "\n";
// }

?>

<?php 
// $sports= ['Real Madrid', 'Barcelona', 'Arsenal', 'Bayern'];

// array_push($sports , 'Benfica');
// var_dump($sports);

?>
<?php 
// $sports= ['Real Madrid', 'Barcelona', 'Arsenal', 'Bayern'];

// array_pop($sports);
// var_dump($sports);

?>

<?php  

// $sports= array('Real Madrid', 'Barcelona', 'Arsenal', 'Bayern');
// array_unshift($sports);
// var_dump();

?>

<?php 
// $sports= array('Real Madrid', 'Barcelona', 'Arsenal', 'Bayern');
// array.shift($sports);
// var_dumps($sports);


?>
<?php 

// $sports=["Real Madrid", "Barcelona", "Arsenal", "Bayern"];
// $output=array_splice($sports,2);
// $output1=array_splice($sports,3);
// $output2=array_splice($sports,-2,1);
// var_dump($output,$output1,$output2);


?>

<?php 
// $sports=[12,24,36,48,60];

// var_dump(array_sum($sports));

?>

<?php 
$temp =[25, 30, 25, 26, 20, 28, 25]
$average_temp=array_sum($temp)/7;

echo $average_temp;

?>