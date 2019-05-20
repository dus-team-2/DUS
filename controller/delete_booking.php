<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-19
 * Time: 10:26
 */
require_once ('../model/common.php');

$booking_id = $_GET['bid'];
$success1 = delete_from_by('booking','id',$booking_id);
$success2 = delete_from_by('user_booking', 'booking_id', $booking_id);
$success3 = delete_from_by('booking_timeslot','booking_id', $booking_id);
$success4 = delete_from_by('booking_facility', 'booking_id', $booking_id);

if($success1 && $success2 && $success3 && $success4){
    echo "<script>alert('booking deleted!');
            window.location.href = '../DUSgroup2/navBookingsOverallCalendar.php'</script>";

}else{
    echo "<script>alert('delete failed!');
            window.location.href = '../DUSgroup2/navBookingDetail.php?bid=". $booking_id ."'</script>";
}
