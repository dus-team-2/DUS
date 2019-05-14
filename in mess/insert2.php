<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>insert</title>
</head>

<body>
<?php
session_start();

  $name=$_SESSION['name']; 
 
 
include "config.php";

 $week=$_POST['week'];
 echo" </br>";
  $facility=$_POST['facility'];
 echo" </br>";
 
  $time=$_POST['time'];
echo" </br>";


$result = mysqli_query($conn,"SELECT * FROM facility
WHERE name='$facility'");

$row = mysqli_fetch_array($result);
 $capacity=$row['capacity'];
 
 $price=$row['price'];

$a=0;


$result2= mysqli_query($conn,"SELECT * FROM booking
WHERE facility='$facility' AND week='$week' AND time='$time'");


while($row2= mysqli_fetch_array($result2))
{
   $a++;
}
 $a;

if($a<$capacity){

$sql = "INSERT INTO booking (facility,week,time,price,user)
VALUES ('$facility', '$week', '$time','$price','$name')";
 
if (mysqli_query($conn, $sql)) {
	
	   echo "   <script>
					        
                            setTimeout(function(){window.location.href='pay.php';},0);
							alert ('book successfully      ！');
							
							
                    </script>";
	
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

else{
	
	  echo "   <script>
					        
                            setTimeout(function(){window.location.href='center2.php';},0);
							alert ('The number has reached the      ！');
							
							
                    </script>";
					
	
	
	}







?>

</body>
</html>