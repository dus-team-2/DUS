<?php
    require_once('database.php');
	
	function get_fixed_events(){
		$sql = "SELECT booking.id AS id, title, content, facility.name AS facility, date, slot FROM booking JOIN booking_timeslot AS t ON t.booking_id = booking.id JOIN booking_facility AS f ON f.booking_id = booking.id JOIN facility ON f.facility_id = facility.id WHERE is_fixed = 1;";
		$events = get_all_data($sql);
		return $events;
	}
	
	function get_no_space($facilityName){
		$sql = "SELECT id, capacity FROM facility WHERE name = '".$facilityName."';";
		$facility = get_one_data($sql);
		$sql = "SELECT booking.id AS id, is_fixed, title, content, date, slot, COUNT(*) AS booked FROM booking JOIN booking_timeslot AS t ON booking.id = t.booking_id JOIN booking_facility AS f ON booking.id = f.booking_id WHERE f.facility_id = '".$facility['id']."' GROUP BY date, slot;";
		$bookings = get_all_data($sql);
		foreach($bookings as &$booking){
			$booking['space'] = $facility['capacity']-$booking['booked'];
		}
		return $bookings;
	}
	
	function get_all_bookings(){
		$sql = "SELECT booking.id AS id,user.username AS user, facility.name AS facility, facility.capacity AS capacity, date, slot FROM booking JOIN booking_timeslot AS t ON t.booking_id = booking.id JOIN booking_facility AS f ON f.booking_id = booking.id JOIN facility ON f.facility_id = facility.id JOIN user_booking AS u ON u.booking_id = booking.id JOIN user ON u.user_id = user.id;";
		$events = get_all_data($sql);
		return $events;
	}
	
	function get_bookings_by_userid($id){
		$sql = "SELECT booking.id AS id, facility.name AS facility, date, slot FROM booking JOIN booking_timeslot AS t ON t.booking_id = booking.id JOIN booking_facility AS f ON f.booking_id = booking.id JOIN facility ON f.facility_id = facility.id JOIN user_booking AS u ON u.booking_id = booking.id JOIN user ON u.user_id = user.id WHERE user.id = ".$id.";";
		$bookings = get_all_data($sql);
		return $bookings;
	}
?>