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
function divisible(){
    
    if(($n % 2) == 0){
        return"$n eshte e plotpjestueshme 2 ";
    }else{
        return "$n nuk eshte e plotpjestueshme me 2";
    }
}

print_r(divisible(4). "<br>");
print_r(divisible(35). "<br>");
print_r(divisible(16). "<br>");
print_r(divisible(3). "<br>");

?>