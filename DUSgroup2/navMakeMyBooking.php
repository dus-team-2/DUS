<?php
	require_once('model/booking.php');
	
	$noSpaceSC = get_no_space('Squash courts');
	$noSpaceAR = get_no_space('Aerobics room');
	$noSpaceT = get_no_space('Tennis');
	$noSpaceAT = get_no_space('Athletics track');
	
include "header.php";?>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid/main.min.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid/main.min.css">
		
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/core/main.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/interaction/main.min.js"></script>	
		<script src="https://unpkg.com/@fullcalendar/daygrid/main.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/timegrid/main.min.js"></script>
		
		<script>
			$(document).ready(function() {
				
				//loadCalendar('calendarSC', 'Squash courts');
				var calendarEl = document.getElementById('calendarSC');
				var calendar = new FullCalendar.Calendar(calendarEl, {
				//var calendar = $('#calendar').fullCalendar({
					plugins: ['interaction','dayGrid','timeGrid'],
					defaultView: 'dayGridMonth',
					displayEventEnd: true,
					eventLimit: true,
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay'
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
						alert(info.event.id);
						window.location.href="";
					},
					<?php if (!empty($noSpaceSC)){ ?>
					events: [
						<?php 
							foreach($noSpaceSC as $event){
								$endTime = $event['slot']+1;
								$start = $event['date']."T".$event['slot'].":00:00";
								$end = $event['date']."T".$endTime.":00:00";
								if($event['is_fixed']==1){
									echo "{ id: '".$event['id']."', title: '".$event['title']."', start: '".$start."', end: '".$end."'},";
								}else if($event['space']>0){
									echo "{ id: '".$event['id']."', title: '".$event['space']." court(s) left', start: '".$start."', end: '".$end."', color: 'green'},";
								}else{
									echo "{ id: '".$event['id']."', title: 'Fully booked', start: '".$start."', end: '".$end."', color: 'red'},";
								}
							}
						?>
					]
					<?php } ?>
				});
				calendar.render();
				//loadCalendar('calendarAR', 'Aerobics room');
				var calendarEl = document.getElementById('calendarAR');
				var calendar = new FullCalendar.Calendar(calendarEl, {
				//var calendar = $('#calendar').fullCalendar({
					plugins: ['interaction','dayGrid','timeGrid'],
					defaultView: 'dayGridMonth',
					displayEventEnd: true,
					eventLimit: true,
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay'
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
						alert(info.event.id);
						window.location.href="";
					},
					<?php if (!empty($noSpaceAR)){ ?>
					events: [
						<?php 
							foreach($noSpaceAR as $event){
								$endTime = $event['slot']+1;
								$start = $event['date']."T".$event['slot'].":00:00";
								$end = $event['date']."T".$endTime.":00:00";
								if($event['is_fixed']==1){
									echo "{ id: '".$event['id']."', title: '".$event['title']."', start: '".$start."', end: '".$end."'},";
								}else if($event['space']>0){
									echo "{ id: '".$event['id']."', title: '".$event['space']." room(s) left', start: '".$start."', end: '".$end."', color: 'green'},";
								}else{
									echo "{ id: '".$event['id']."', title: 'Fully booked', start: '".$start."', end: '".$end."', color: 'red'},";
								}
							}
						?>
					]
					<?php } ?>
				});
				calendar.render();
				//loadCalendar('calendarT', 'Tennis');
				var calendarEl = document.getElementById('calendarT');
				var calendar = new FullCalendar.Calendar(calendarEl, {
				//var calendar = $('#calendar').fullCalendar({
					plugins: ['interaction','dayGrid','timeGrid'],
					defaultView: 'dayGridMonth',
					displayEventEnd: true,
					eventLimit: true,
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay'
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
						alert(info.event.id);
						window.location.href="";
					},
					<?php if (!empty($noSpaceT)){ ?>
					events: [
						<?php 
							foreach($noSpaceT as $event){
								$endTime = $event['slot']+1;
								$start = $event['date']."T".$event['slot'].":00:00";
								$end = $event['date']."T".$endTime.":00:00";
								if($event['is_fixed']==1){
									echo "{ id: '".$event['id']."', title: '".$event['title']."', start: '".$start."', end: '".$end."'},";
								}else if($event['space']>0){
									echo "{ id: '".$event['id']."', title: '".$event['space']." court(s) left', start: '".$start."', end: '".$end."', color: 'green'},";
								}else{
									echo "{ id: '".$event['id']."', title: 'Fully booked', start: '".$start."', end: '".$end."', color: 'red'},";
								}
							}
						?>
					]
					<?php } ?>
				});
				calendar.render();
				//loadCalendar('calendarAT', 'Athletics track');
				var calendarEl = document.getElementById('calendarAT');
				var calendar = new FullCalendar.Calendar(calendarEl, {
				//var calendar = $('#calendar').fullCalendar({
					plugins: ['interaction','dayGrid','timeGrid'],
					defaultView: 'dayGridMonth',
					displayEventEnd: true,
					eventLimit: true,
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'dayGridMonth,timeGridWeek,timeGridDay'
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
						alert(info.event.id);
						window.location.href="";
					},
					<?php if (!empty($noSpaceAT)){ ?>
					events: [
						<?php 
							foreach($noSpaceAT as $event){
								$endTime = $event['slot']+1;
								$start = $event['date']."T".$event['slot'].":00:00";
								$end = $event['date']."T".$endTime.":00:00";
								if($event['is_fixed']==1){
									echo "{ id: '".$event['id']."', title: '".$event['title']."', start: '".$start."', end: '".$end."'},";
								}else if($event['space']>0){
									echo "{ id: '".$event['id']."', title: '".$event['space']." space left', start: '".$start."', end: '".$end."', color: 'green'},";
								}else{
									echo "{ id: '".$event['id']."', title: 'Fully booked', start: '".$start."', end: '".$end."', color: 'red'},";
								}
							}
						?>
					]
					<?php } ?>
				});
				calendar.render();
				$('#arCld').hide();
				$('#tCld').hide();
				$('#atCld').hide();
				$('#sc').click(function(event){
			$('#arCld').hide();
			$('#tCld').hide();
			$('#atCld').hide();
			$('#scCld').show();
		});
		$('#ar').click(function(event){
			$('#scCld').hide();
			$('#tCld').hide();
			$('#atCld').hide();
			$('#arCld').show();
		});
		$('#t').click(function(event){
			$('#scCld').hide();
			$('#arCld').hide();
			$('#atCld').hide();
			$('#tCld').show();
		});		
		$('#at').click(function(event){
			$('#scCld').hide();
			$('#arCld').hide();
			$('#tCld').hide();
			$('#atCld').show();
		});
			});
			
		</script>

<?php include "header2.php";
include "side.php";
//session_start();
if(!isset($_SESSION["loginStatus"])){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
// require "dbconfig.php";

?>

<div class="span9">
    <h1>Make a Booking</h1>
	<div>
				<button id='sc' value='Squash courts'>Squash courts</button>
				<button id='ar' value='Aerobics room'>Aerobics room</button>
				<button id='t' value='Tennis'>Tennis</button>
				<button id='at' value='Athletics track'>Athletics track</button>
			</div>
			<div id='scCld'>
				<h1>Squash courts</h1>
				<div id='calendarSC'></div>
			</div>
			<div id='arCld'>
				<h1>Aerobics room</h1>
				<div id='calendarAR'></div>
			</div>
			<div id='tCld'>
				<h1>Tennis</h1>
				<div id='calendarT'></div>
			</div>
			<div id='atCld'>
				<h1>Athletics track</h1>
				<div id='calendarAT'></div>
			</div>
</div>



<?php include "footer.php";?>