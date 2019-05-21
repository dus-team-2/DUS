<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>insert</title>
</head>

<body>
<?php
//session_start();
include "model/booking.php";
//$user= '1';
//$_SESSION['id'];
$facility=$_POST['facility'];
$dates=$_POST['date'];
$dates = explode(",",$dates);
$times=$_POST['time'];
$title=$_POST['title'];
$content=$_POST['content'];

$sql = "SELECT * FROM facility WHERE id='".$facility."'";
$facility = get_one_data($sql);

$available = true;
foreach($dates as $date){
	foreach($times as $time){
		$space = check_space($facility['id'],$date,$time);
		if($space==0){
			echo "   <script>
                            setTimeout(function(){window.location.href='navBookingsBlock.php';},0);
							alert ('".$date." ".$time.":00 has been fully booked!');
              </script>";
			$available = false;
			break;
		}
	}
	if(!$available){
		break;
	}
}

if($available){
	$sql= "INSERT INTO booking (is_fixed,title,content) VALUES(1,'".$title."','".$content."');";
	$pdo = make_database_connection();
	$statement = $pdo->query($sql);
	$result = $statement->rowCount();
	if($result){
		$booking_id= $pdo->lastInsertId();
		//print_r($booking_id);
		$sql= "INSERT INTO booking_facility (booking_id, facility_id) VALUES('".$booking_id."','".$facility['id']."');";
		$statement = $pdo->query($sql);
		$result = $statement->rowCount();
		if($result){
			foreach($dates as $date){
				foreach($times as $time){
					$sql= "INSERT INTO booking_timeslot (booking_id, date, slot) VALUES('".$booking_id."','".$date."', '".$time."');";
					//print_r($sql);
					$pdo = make_database_connection();
					$statement = $pdo->query($sql);
					$result = $statement->rowCount();
					if(!$result){
						echo "   <script>
                            setTimeout(function(){window.location.href='navBookingsBlock.php';},0);
							alert ('Booking_timeslot insert wrong!');
						</script>";
						break;
					}
				}
				if(!$result){
					break;
				}
			}
			if($result){
				echo "   <script>
                            setTimeout(function(){window.location.href='navBookingsBlock.php';},0);
							alert ('Booked successfully!');
                    </script>";
			}
		}else{
			echo "   <script>
                            setTimeout(function(){window.location.href='navBookingsBlock.php';},0);
							alert ('Booking_facility insert wrong!');
              </script>";
		}
	}else{
		echo "   <script>
                            setTimeout(function(){window.location.href='navBookingsBlock.php';},0);
							alert ('Booking insert wrong!');
              </script>";
	}
}

?>
</body>
</html>
