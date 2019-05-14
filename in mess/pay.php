<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/center.css" rel="stylesheet" type="text/css" />
<title>center</title>
</head>

<body>
<div>
<p><h1>pay</h1><h2>User:<?php  session_start();

 echo  $_SESSION['name'];   
 
 $name=$_SESSION['name'];
   ?></h2></p>


  <?php

include "config.php";
$a=0;
$result = mysqli_query($conn,"SELECT * FROM booking
WHERE user='$name'");

 while($row = mysqli_fetch_array($result))
{
    $row['facility'];
	
	$a=$a+$row['price'];
	
    echo "<br>";
}
 $a;
$result2= mysqli_query($conn,"SELECT * FROM user
WHERE username='$name'");
$row2= mysqli_fetch_array($result2);
  $student= $row2['student'];


if($student=="1"){
	
	
	
	$a=$a/2;
	echo "You need to pay:".$a;
	}

  
  else{
	  echo "You need to pay:".$a;
	  
	  
	  }




?>







</div>


</body>
</html>