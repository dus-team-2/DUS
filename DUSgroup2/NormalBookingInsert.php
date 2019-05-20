
<?php
	
include "header.php";
include "header2.php";
include "side.php";
//session_start();

/*if(!isset($_SESSION["loginStatus"])){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}*/
//session_start();
include "config.php";
//fake!!!!!!!
  //$user_id=$_SESSION['id'];
	$user_id=2;
  $facility=$_POST['facility'];
  echo "</br>";
  $date=$_POST['date'];
  $time=$_POST['time'];
  $user_ids = $_POST['user_ids'];
  $coun=count($time);
$result5 = mysqli_query($conn,"SELECT * FROM facility WHERE id='$facility';");
	$facility= mysqli_fetch_array($result5);
	$capacity=$facility['capacity'];
	echo $capacity;
  
  $available = true;
 foreach ($time as $key => $var){
    //$var;
   //echo "</br>";
	$result3 = mysqli_query($conn,"SELECT * FROM booking_timeslot WHERE date='$date' AND slot='$var';");
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
}
    
	//echo "<br>";
	echo $a;
	if($a<$capacity){}
	else{
	    echo "   <script>
   setTimeout(function(){window.location.href='NormalBooking.php';},0);
   alert ('The number has reached the upper limit！');
   </script>";
   $available = false;
			break;
 }}
 
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
   alert ('Book successfully!');
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

