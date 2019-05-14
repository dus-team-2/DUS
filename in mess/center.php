<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/center.css" rel="stylesheet" type="text/css" />
<title>center</title>
</head>

<body>
<div>
<p><h1>booking</h1><h2>User:<?php  session_start();

 echo  $_SESSION['name'];     ?></h2></p>


  <?php

include "config.php";

$sql = "SELECT name FROM facility";
$result = mysqli_query($conn, $sql);
 




?>

<form style=" margin-left:400px; margin-top:200px;" action="insert.php" method="post">



Booking space: <select name="facility">
<?php
if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
		
		$a= $row['name'];
        echo "<option value='$a'>".$a."</option>";
    }
} else {
    echo "0";
}


?>
</select>

<br />
<dd style="margin-top:20px;">Week:<select name="week">
<option value="Monday">Monday:</option>
<option value="Tuesday">Tuesday:</option>
<option value="Wednesday">Wednesday:</option>
<option value="Thursday">Thursday:</option>
<option value="Friday">Friday:</option>

</select>


&nbsp;&nbsp;time:<select name="time">
<option value="8">8:00-9:00</option>
<option value="9">9:00-10:00</option>
<option value="10">10:00-11:00</option>
<option value="11">11:00-12:00</option>
<option value="12">12:00-13:00</option>
<option value="13">13:00-14:00</option>
<option value="14">14:00-15:00</option>
<option value="15">15:00-16:00</option>
<option value="16">16:00-17:00</option>
<option value="17">17:00-18:00</option>
<option value="18">18:00-19:00</option>
<option value="19">19:00-20:00</option>
<option value="20">20:00-21:00</option>
<option value="21">21:00-22:00</option>

</select>






</dd>










<dd><input type="submit" value="submit" /></dd>




</form>
</div>











</body>
</html>