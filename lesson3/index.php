<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson 3</title>
</head>
<body>
  <?php
  
  $num= -10;
  $age= 88;
  $numri= 23;

  $a = 50;
  $b =10;

  $age2 = 15;
  if($num < 0){
    echo "$num is less than 0" . "<br>";
  }

  if(($age > 12) && ($age <20)){
    echo "You are a teenager <br>";
  }else{
    echo "You are a gorwn man <br>";
  }
 
  if($numri < 0){
    echo " The value of \$num us a negative number";
  }elseif( $numri == 0){
    echo "The value of $numri is 0";
  }else{
    echo "The value of $numri is a positive number <br>";
  }
  
  if($a==$b){
    echo "1 <br>";

  }elseif($a > $b){
    echo "2 <br>";

  }else{
    echo "3 <br>";
  }

  switch($age2){
    case($age2 >= 15 && $age2 < 18);
    echo" You are a minor (0-18 years old) <br>";
    break;

    case($age2 > 18 );
    echo "You are a young adult <br>" ;
    break;

    case($age > 25);
    echo "You are a grown man <br>";
    break;

  }


  ?>
  $whileVar =1;
  while($whileVar >= 5){
    echo "<br>Numri is $whileVar </br>";
    $whilevar++;
  }
   $dowhile =1;
   do{
    echo "Number is :$dowhile <br>";
    $dowhile++;
   }while($dowhile < 5);

   for($forVar =0; $forVar <=10; $forVar++){
    echo "Numri is :$forVar <br>";
   }

   
  
  ?>
  <?php
    $cars =array("BMW", "Audi", "Mercedes", "Toyota");
   foreach($cars as $value){
    echo "$value <br>";
   }
     ?>
     <?php
     $mosha = array("Arianit" =>"18", "Olt" =>"17", "Iart" =>"18", "Kron" =>"17");
     foreach($mosha as $x1 => $val){
      echo "$x1 is $val years old <br>";
     }



  ?>
</body>
</html>