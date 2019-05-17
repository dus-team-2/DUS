<?php
require_once("model/booking.php");
$fixedEvents = get_fixed_events();
//print_r($fixedEvents);

include "header.php";?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid/main.min.css">
		<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid/main.min.css">
		
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.js"></script>
		<script src="https://unpkg.com/@fullcalendar/interaction/main.min.js"></script>	
		<script src="https://unpkg.com/@fullcalendar/daygrid/main.min.js"></script>
		<script src="https://unpkg.com/@fullcalendar/timegrid/main.min.js"></script>
		
		<script>
			document.addEventListener('DOMContentLoaded', function(){
				var calendarEl = document.getElementById('calendar');
				var calendar = new FullCalendar.Calendar(calendarEl, {
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
						window.location.href="navBookingDetail.php?bid=" + info.event.id;
					},
					<?php if (!empty($fixedEvents)){ ?>
					events: [
						<?php 
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
								echo "{ id: '".$event['id']."', title: '".$event['title']."', start: '".$start."', end: '".$end."'},";
							}
						?>
					]
					<?php } ?>
				});
				calendar.render();
			});
		</script>

<?php
include "header2.php";


?>
<div id="content" class="row-fluid">
    <div class="span3 pages">
        <ul>
            <li class="sideways"><a href="facilities.php"> Our Facilities</a></li>
            <li class="sideways">
                <a href="events.php">Events</a>
                <ul >
                    <li><a href="eventService.php">Our Event Service</a></li>
                    <li class="navcurrent"><strong class="current"> Event Calendar</strong>
                    <li><a href="eventFeedback.php">Event Feedback</a></li>
                </ul>
            </li>
            <li class="sideways"><a href="https://www.teamdurham.com/facilities/durham/">Maiden Castle</a></li>
            <li class="sideways"><a href="https://www.teamdurham.com/queenscampus/">Queen's Campus</a></li>
            <li class="sideways"><a href="https://www.teamdurham.com/about/facilities/durham/contactus/">Contact Us</a></li>
        </ul>
    </div>

    <div class="span9">
        <h1>Event Calendar</h1>
        <p>* Click on the events to check details !</p>
		<div class="main">
			<div id='calendar'></div>
		</div>
    </div>



<?php include "footer.php";?>