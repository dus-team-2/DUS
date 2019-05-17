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
$name=$_SESSION['name'];
$date=$_POST['date'];
echo" </br>";
$facility=$_POST['facility'];
echo" </br>";
$time=$_POST['time'];
echo" </br>";

$result = mysqli_query($conn,"SELECT * FROM facility WHERE name='$facility'");
$row = mysqli_fetch_array($result);
$capacity=$row['capacity'];
$price=$row['price'];
$facility_id=$row['id'];

$result2 = mysqli_query($conn,"SELECT * FROM user WHERE username='$name'");
$row2 = mysqli_fetch_array($result2);
$user_id=$row['id'];

$result3= mysqli_query($conn,"SELECT * FROM booking WHERE 1=1");
$row3 = mysqli_fetch_array($result3);
$booking_id=$row['id'];

$a=0;

$result4= mysqli_query($conn,"SELECT * FROM booking_timeslot WHERE booking_id='$booking_id' AND date='$date' AND slot='$time'");

while($row4= mysqli_fetch_array($result4))
{
    $a++;
}
$a;

if($a<$capacity){
    $sql_insert="BEGIN;
                INSERT INTO booking (id,title) VALUES('$booking_id','regular booking');
                INSERT INTO booking_facility(booking_id,facility_id) VALUES('$booking_id','$facility_id');
                INSERT INTO booking_timeslot(booking_id,date,slot) VALUES('$booking_id',$date','$time');
                INSERT INTO user_booking(user_id,booking_id) VALUES('$user_id','$booking_id');
                COMMIT;";

    if ($conn->multi_query($sql_insert) === TRUE) {
        echo "   <script>
                            setTimeout(function(){window.location.href='pay.php';},0);
							alert ('book successfully ！');
                    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}else{
    echo "   <script>
                            setTimeout(function(){window.location.href='NormalBooking.php';},0);
							alert ('The number has reached the upper limit！');
              </script>";
}

?>
</body>
</html>