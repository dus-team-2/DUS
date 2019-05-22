<?php

	require_once('model/booking.php');
	$fixedEvents = get_fixed_events();
	$bookings = get_all_bookings();
	
include "header.php";?>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid/main.min.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid/main.min.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/list/main.min.css">
		
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/core/main.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/interaction/main.min.js"></script>	
		<script src="https://unpkg.com/@fullcalendar/daygrid/main.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/timegrid/main.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/list/main.min.js"></script>

		<script>
			document.addEventListener('DOMContentLoaded', function(){
			//$(document).ready(function() {
				var calendarEl = document.getElementById('calendar');
				var calendar = new FullCalendar.Calendar(calendarEl, {
				//var calendar = $('#calendar').fullCalendar({
					plugins: ['interaction','dayGrid','timeGrid','list'],
					defaultView: 'dayGridMonth',
					displayEventEnd: true,
					eventLimit: true,
					eventLimitClick: 'list',
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay'
					},
					businessHours: [{
						daysOfWeek: [ 1, 2, 3 ,4 ,5],
						startTime: '07:00', 
						endTime: '22:00'  
					},{
						daysOfWeek: [ 6, 0 ],
						startTime: '9:00',
						endTime: '18:00'
					}],
					eventClick: function(info) {
						//alert(info.event.id);
                        window.location.href="navBookingDetail.php?bid=" + info.event.id;
					},
					<?php if (!empty($fixedEvents)||!empty($bookings)){ ?>
					events: [
						<?php if(!empty($fixedEvents)){
							foreach($fixedEvents as $event){
								$endTime = $event['slot']+1;
								if($event['slot']<10){
									$start = $event['date']."T0".$event['slot'].":00:00";
								}else{
								$start = $event['date']."T".$event['slot'].":00:00";}
								if($endTime<10){
									$end = $event['date']."T0".$endTime.":00:00";
								}else{
								$end = $event['date']."T".$endTime.":00:00";}
								echo "{ id: '".$event['id']."', title: '".$event['title']." ".$event['content']."', start: '".$start."', end: '".$end."'},";
							}
						}
						if(!empty($bookings)){
							foreach($bookings as $event){
								$endTime = $event['slot']+1;
								if($event['slot']<10){
									$start = $event['date']."T0".$event['slot'].":00:00";
								}else{
								$start = $event['date']."T".$event['slot'].":00:00";}
								if($endTime<10){
									$end = $event['date']."T0".$endTime.":00:00";
								}else{
								$end = $event['date']."T".$endTime.":00:00";}
								echo "{ id: '".$event['id']."', title: '".$event['facility']." booked by ".$event['user']."', start: '".$start."', end: '".$end."', color: 'green'},";
							}
						}
						?>
					],
					<?php } ?>
					timeFormat: 'H(:mm)'
				});
				calendar.render();
			});
		</script>

<?php
include "header2.php";
include "side.php";
//session_start();
if($_SESSION["loginStatus"] != 1){
    echo "<script>
			window.location = 'navLoginUser.php';
        </script>";
}
// require "dbconfig.php";

?>

<div class="span9" style="padding-right: 5%">
    <h1>Overall Calendar</h1>
    <p class="explain">* Click on the bookings to check details !</p>
	<div id='calendar'></div>
</div>



<?php include "footer.php";?>