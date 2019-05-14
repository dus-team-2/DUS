<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-12
 * Time: 14:54
 */

require_once ('../model/common.php');

$current_user_all = get_by_from('*', 'id', 'user',$current_user);

$booking_id = $_GET['bid'];
$current_booking = get_by_from('*', 'id', 'booking', $booking_id);
$time_detail_result = get_some_by_filter_with_order('booking_timeslot', 'booking_id', $booking_id, 'date', 'ASC');
$time_detail = array();
$tmp_date = '';
$time_string = '';
for($i=0; $i<count($time_detail_result); $i++){
    if ($i !== count($time_detail_result)-1){
        if (count($time_detail) === 0 && $time_string === ''){
            $tmp_date = $time_detail_result[$i]['date'];
            $tmp_array = array();
            array_push($tmp_array, $time_detail_result[$i]['date']);
            $time_string = $time_string.$time_detail_result[$i]['slot'].":00-".((int)($time_detail_result[$i]['slot'])+1).":00\n\n";
        }else if($time_detail_result[$i]['date'] === $tmp_date){
            $time_string = $time_string.$time_detail_result[$i]['slot'].":00-".((int)($time_detail_result[$i]['slot'])+1).":00\n\n";
        }else if ($time_detail_result[$i]['date'] !== $tmp_date){
            array_push($tmp_array, $time_string);
            array_push($time_detail, $tmp_array);
            $time_string = '';
            $tmp_array = array();
            $tmp_date = $time_detail_result[$i]['date'];
            array_push($tmp_array, $time_detail_result[$i]['date']);
            $time_string = $time_string.$time_detail_result[$i]['slot'].":00-".((int)($time_detail_result[$i]['slot'])+1).":00\n\n";
        }
    }else{
        if (count($time_detail) === 0 && $time_string === ''){
            $tmp_date = $time_detail_result[$i]['date'];
            $tmp_array = array();
            array_push($tmp_array, $time_detail_result[$i]['date']);
            $time_string = $time_string.$time_detail_result[$i]['slot'].":00-".((int)($time_detail_result[$i]['slot'])+1).":00\n\n";
            array_push($tmp_array, $time_string);
            array_push($time_detail, $tmp_array);
        }else if($time_detail_result[$i]['date'] === $tmp_date){
            $time_string = $time_string.$time_detail_result[$i]['slot'].":00-".((int)($time_detail_result[$i]['slot'])+1).":00\n\n";
            array_push($tmp_array, $time_string);
            array_push($time_detail, $tmp_array);
        }else if ($time_detail_result[$i]['date'] !== $tmp_date){
            array_push($tmp_array, $time_string);
            array_push($time_detail, $tmp_array);
            $time_string = '';
            $tmp_array = array();
            $tmp_date = $time_detail_result[$i]['date'];
            array_push($tmp_array, $time_detail_result[$i]['date']);
            $time_string = $time_string.$time_detail_result[$i]['slot'].":00-".((int)($time_detail_result[$i]['slot'])+1).":00\n\n";
            array_push($tmp_array, $time_string);
            array_push($time_detail, $tmp_array);
        }
    }
}

$related_users_idset = get_some_by_filter('user_booking', 'booking_id', $booking_id);
$related_users = array();
for($i=0; $i<count($related_users_idset); $i++){
    array_push($related_users,get_by_from('*', 'id', 'user', $related_users_idset[$i]['user_id']));
}
$related_facilities_idset = get_some_by_filter('booking_facility', 'booking_id', $booking_id);
$related_facilities = array();
for($i=0; $i<count($related_facilities_idset); $i++){
    array_push($related_facilities,get_by_from('*', 'id', 'facility', $related_facilities_idset[$i]['facility_id']));
}

$is_fixed = $current_booking['is_fixed'];
$is_manager = $current_user_all['is_manager'];
