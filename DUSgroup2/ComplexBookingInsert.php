
<?php
	require_once("model/booking.php");
include "header.php";
include "header2.php";
include "side.php";
//session_start();

if($_SESSION["loginStatus"] != 1){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
//session_start();
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
	 if(check_duplicate($var, $date, $time, $user_id)){
		 $user = get_user_by_id($user_id);
		 //print_r($user);
	   echo "   <script>
   setTimeout(function(){window.location.href='navBookingsAddIndividual.php';},0);
   alert ('".$user['username']." have already booked！');
   </script>";
   $available = false;
			break;
   }
   
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
	
	include "footer.php";
	 
?>
