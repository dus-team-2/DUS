
<?php
	require_once("model/booking.php");
include "header.php";
include "header2.php";
include "side.php";
//session_start();

if(!isset($_SESSION["loginStatus"])){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
//session_start();
include "config.php";
//fake!!!!!!!
  $user_id=$_SESSION['id'];
	//$user_id=2;
  $facility=$_POST['facility'];
  //echo "</br>";
  $date=$_POST['date'];
  $time=$_POST['time'];
  if(isset($_POST['user_ids'])){
	  $user_ids = $_POST['user_ids'];
	  $coun1=count($user_ids);
  }
  $coun=count($time);
$result5 = mysqli_query($conn,"SELECT * FROM facility WHERE id='$facility';");
	$facility= mysqli_fetch_array($result5);
	$capacity=$facility['capacity'];
	
	//echo $capacity;
	$price = $coun * $facility['price'];
	$_SESSION['total']=$price;
  
  $available = true;
 foreach ($time as $key => $var){
    //$var;
   //echo "</br>";
   
   if(check_duplicate($facility['id'], $date, $var, $user_id)){
	   echo "   <script>
   setTimeout(function(){window.location.href='navNormalBooking.php';},0);
   alert ('You have already booked！');
   </script>";
   $available = false;
			break;
   }
   $space = check_space($facility['id'], $date, $var);
   if($space>0){
	  if(!empty($user_ids)){
		foreach ($user_ids as $id){
			if(check_duplicate($facility['id'], $date, $var, $id)){
				$user = get_user_by_id($id);
				echo "   <script>
				setTimeout(function(){window.location.href='navNormalBooking.php';},0);
				alert (".$user['username']." has already booked！');
				</script>";
				$available = false;
				break;
			}
		}
		if($coun1<$space){}
	else{
	    echo "   <script>
   setTimeout(function(){window.location.href='navNormalBooking.php';},0);
   alert ('Only ".$space." space left！');
   </script>";
   $available = false;
			break;
 }
   } 
   }else{
	   echo "   <script>
   setTimeout(function(){window.location.href='navNormalBooking.php';},0);
   alert ('The number has reached the upper limit！');
   </script>";
   $available = false;
			break;
   }
    if(!$available){
		break;
	}
   
	/*$result3 = mysqli_query($conn,"SELECT * FROM booking_timeslot WHERE date='$date' AND slot='$var';");
	$a=0;
	while($row3 = mysqli_fetch_array($result3))
{
   $booking_id=$row3['booking_id'];
   $result4 = mysqli_query($conn,"SELECT * FROM booking_facility WHERE booking_id='$booking_id';");
   $row4 = mysqli_fetch_array($result4);
   $facility_id=$row4['facility_id'];
	  if($facility_id==$facility['id']){
	   $a++;
	  }
}*/
    
	//echo "<br>";
	//echo $a;
	}
 
 if($available){
	$sql = "INSERT INTO booking(is_fixed) VALUES ('0');";
	if (mysqli_query($conn,$sql)) {
	$oid = mysqli_insert_id($conn);
	$sql = "INSERT INTO booking_facility(booking_id,facility_id) VALUES ('$oid','".$facility['id']."');";
	if (mysqli_query($conn,$sql)) {
		$result=true;

		$sql = "INSERT INTO user_booking(user_id,booking_id) VALUES ('$user_id','$oid')";
			if (mysqli_query($conn,$sql)) {}else{
				$result=false;
			}
		if (!empty($user_ids)){
			foreach ($user_ids as $id){
				$sql = "INSERT INTO user_booking(user_id,booking_id) VALUES ('$id','$oid')";
				if (mysqli_query($conn,$sql)) {}else{
					$result=false;
					break;
				}
			}
		}

		if ($result) {
			$result = true;
			foreach ($time as $key => $var){
	$sql = "INSERT INTO booking_timeslot(booking_id,date,slot) VALUES ('$oid','$date','$var');";

			if (mysqli_query($conn,$sql)) {

			} else {
				$result = false;
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}}
			if($result){
			echo "   <script>
   setTimeout(function(){window.location.href='NormalBookingEmail.php';},0);
   alert ('Booked successfully!');
			</script>";}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
	
	//$result = mysqli_query($conn,"SELECT * FROM user WHERE username='$name'");
	//$row = mysqli_fetch_array($result);
	//$id=$row['id'];
	
	 
 }
  include "footer.php"; 
?>

