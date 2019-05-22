<?php
	require_once('model/booking.php');
	
	$noSpaceSC = get_no_space('Squash Courts');
	$noSpaceAR = get_no_space('Aerobics Room');
	$noSpaceT = get_no_space('Tennis Courts');
	$noSpaceAT = get_no_space('Athletics Track');
	
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
						//alert(info.event.id);
						//window.location.href="";
					},
					<?php if (!empty($noSpaceSC)){ ?>
					events: [
						<?php 
							foreach($noSpaceSC as $event){
								$endTime = $event['slot']+1;
								if($event['slot']<10){
									$start = $event['date']."T0".$event['slot'].":00:00";
								}else{
								$start = $event['date']."T".$event['slot'].":00:00";}
								if($endTime<10){
									$end = $event['date']."T0".$endTime.":00:00";
								}else{
								$end = $event['date']."T".$endTime.":00:00";}
								if($event['space']>0){
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
						//alert(info.event.id);
						//window.location.href="";
					},
					<?php if (!empty($noSpaceAR)){ ?>
					events: [
						<?php 
							foreach($noSpaceAR as $event){
								$endTime = $event['slot']+1;
								if($event['slot']<10){
									$start = $event['date']."T0".$event['slot'].":00:00";
								}else{
								$start = $event['date']."T".$event['slot'].":00:00";}
								if($endTime<10){
									$end = $event['date']."T0".$endTime.":00:00";
								}else{
								$end = $event['date']."T".$endTime.":00:00";}
								if($event['space']>0){
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
						//alert(info.event.id);
						//window.location.href="";
					},
					<?php if (!empty($noSpaceT)){ ?>
					events: [
						<?php 
							foreach($noSpaceT as $event){
								$endTime = $event['slot']+1;
								if($event['slot']<10){
									$start = $event['date']."T0".$event['slot'].":00:00";
								}else{
								$start = $event['date']."T".$event['slot'].":00:00";}
								if($endTime<10){
									$end = $event['date']."T0".$endTime.":00:00";
								}else{
								$end = $event['date']."T".$endTime.":00:00";}
								if($event['space']>0){
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
						//alert(info.event.id);
						//window.location.href="";
					},
					<?php if (!empty($noSpaceAT)){ ?>
					events: [
						<?php 
							foreach($noSpaceAT as $event){
								$endTime = $event['slot']+1;
								if($event['slot']<10){
									$start = $event['date']."T0".$event['slot'].":00:00";
								}else{
								$start = $event['date']."T".$event['slot'].":00:00";}
								if($endTime<10){
									$end = $event['date']."T0".$endTime.":00:00";
								}else{
								$end = $event['date']."T".$endTime.":00:00";}
								if($event['space']>0){
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
        <div class="span9" style="padding-right: 5%">
            <h1>Facilities availability</h1>
            <div>
                <button id='sc' class="btn_calendar" value='Squash courts'>Squash courts</button>
                <button id='ar' class="btn_calendar" value='Aerobics room'>Aerobics room</button>
                <button id='t' class="btn_calendar" value='Tennis'>Tennis</button>
                <button id='at' class="btn_calendar" value='Athletics track'>Athletics track</button>
            </div>
            <div id='scCld'>
                <h2>Squash courts</h2>
                <div id='calendarSC'></div>
            </div>
            <div id='arCld'>
                <h2>Aerobics room</h2>
                <div id='calendarAR'></div>
            </div>
            <div id='tCld'>
                <h2>Tennis</h2>
                <div id='calendarT'></div>
            </div>
            <div id='atCld'>
                <h2>Athletics track</h2>
                <div id='calendarAT'></div>
            </div>
            <a href='navNormalBooking.php'><button class="btn btn-primary" type='button'>Book</button></a>
        </div>





<?php include "footer.php";?>