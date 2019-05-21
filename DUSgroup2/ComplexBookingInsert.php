<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>insert</title>
</head>

<body>
<?php
session_start();
include "config.php";
  $user_id=$_POST['user'];
  $facility=$_POST['facility'];
  //print_r($facility);
  $date=$_POST['date'];
  $time=$_POST['time'];
  $price=0;
  //$coun=count($facility);

 $available = true;
 foreach ($facility as $key => $var){
     //echo $var;
     //echo "</br>";
     $result3 = mysqli_query($conn,"SELECT * FROM booking_timeslot WHERE date='$date' AND slot='$time';");
     $a=0;

     while($row3 = mysqli_fetch_array($result3))
{
    $booking_id=$row3['booking_id'];
    $result4 = mysqli_query($conn,"SELECT * FROM booking_facility WHERE booking_id='$booking_id';");
    $row4 = mysqli_fetch_array($result4);
    $facility_id=$row4['facility_id'];
    if($facility_id==$var){
	   $a++;
	  }
}
    $result5 = mysqli_query($conn,"SELECT * FROM facility WHERE id='$var';");
	$row5= mysqli_fetch_array($result5);
	$capacity=$row5['capacity'];
	//echo "<br>";
	//echo $a;
	if($a<$capacity){}
			else{
		 echo "   <script>
                            setTimeout(function(){window.location.href='navBookingsAddIndividual.php'},0);
							alert ('The number has reached the upper limit');
                    </script>";
					 $available = false;
			break;
		}
 }
		 if($available){
			$sql = "INSERT INTO booking(is_fixed) VALUES ('0');";
			if (mysqli_query($conn,$sql)) {
				$oid = mysqli_insert_id($conn);
				$sql = "INSERT INTO booking_timeslot(booking_id,date,slot) VALUES ('$oid','$date','$time');";

				if (mysqli_query($conn,$sql)) {
					$sql = "INSERT INTO user_booking(user_id,booking_id)
					VALUES ('$user_id','$oid')";

					if (mysqli_query($conn,$sql)) {
						$result = true;
						foreach ($facility as $key => $var){
							$sql = "INSERT INTO booking_facility(booking_id,facility_id) VALUES ('$oid','$var');";
							$result5 = mysqli_query($conn,"SELECT * FROM facility WHERE id='$var';");
							$row5= mysqli_fetch_array($result5);
							$price += $row5['price'];
							if (mysqli_query($conn,$sql)) {}else{
								$result = false;
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
						if($result){
							echo "   <script>
                            setTimeout(function(){window.location.href='ComplexBookingEmail.php'},0);
							alert ('Booked successfully!');
                    </script>";
						}
					}else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
	$_SESSION['totalComplex'] = $price;
	$_SESSION['uid'] = $user_id;
	
	
	 
?>
</body>
</html>
