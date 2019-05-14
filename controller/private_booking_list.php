<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-09
 * Time: 14:50
 */

require_once ('../model/common.php');

//get current_user_id from session;
//fake current
$current_user_id = $_SESSION["id"];

$private_booking_ids = array();
$private_booking_set = array();

$private_booking_ids= get_some_by_filter('user_booking', 'user_id', $current_user_id);

for($i=0; $i<count($private_booking_ids); $i++){
    $temporary_array = array();
    //each item in temporary_array composed by: 1 booking (with everything in booking table), a string of date, a string of time slots and a string of facility names
    //get the booking
    array_push($temporary_array, get_by_from('*', 'id', 'booking', $private_booking_ids[$i]['booking_id']));

    //get the string of time slot
    $slots = array();
    $slot_string = '';
    $slots = get_some_by_filter('booking_timeslot', 'booking_id', $private_booking_ids[$i]['booking_id']);
    for ($k=0; $k<count($slots); $k++){
        $next_hour = (int)($slot_string.$slots[$k]['slot'])+1;
        $slot_string = $slot_string.$slots[$k]['slot'].":00-".$next_hour.":00\n\n";
    }
    array_push($temporary_array, $slots[0]['date']);
    array_push($temporary_array, $slot_string);

    //get the string of facility names
    $facility_ids = array();
    $facility_name_string = '';
    $facility_ids = get_some_by_filter('booking_facility', 'booking_id', $private_booking_ids[$i]['booking_id']);
    for ($j=0; $j<count($facility_ids); $j++){

        $facility_name_string = $facility_name_string.get_by_from('name', 'id','facility', $facility_ids[$j]['facility_id'])['name']."\n\n";
    }
    array_push($temporary_array, $facility_name_string);

    //save the temporary array to the private booking set
    array_push($private_booking_set, $temporary_array);

}

//print_r($private_booking_set);



