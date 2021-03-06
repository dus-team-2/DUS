<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../view/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="../view/css/bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="../view/css/css_joyce.css">
</head>
<body class="home">
	<div class="container-fluid">
		<div id="header" class="row-fluid">
			<div class="span12">
				<h1>
					<a href="https://www.teamdurham.com/" class="pull-right">
						<img width="140" src="./try_files/durham-university-logo-white.png" alt="Durham University" class="durham-university-logo">
					</a>
					<a href="https://www.teamdurham.com/" class="pull-left">
						<img src="./try_files/teamdurham.png" alt="Team Durham" class="team-durham-logo">
					</a>
					<a href="https://www.teamdurham.com/" class="team-durham-slogan">
						<span class="light">Durham University</span><br>Sport<br><br>
						<span class="slogan">Enabling Exceptional People to do Exceptional Things</span>
					</a>
				</h1>
			</div>
		</div>		
		<div id="navigation" class="row-fluid">
			<div class="span12">
				<ul class="nav nav-pills">
					<li><a href="https://www.teamdurham.com/">Home</a></li>
					<li><a href="https://www.teamdurham.com/about/">About Us</a></li>
					<li><a href="facilities.php">Facilities</a></li>
					<li><a href="https://www.teamdurham.com/about/whycometodurham/">Why Durham?</a></li>
					<li><a href="https://www.teamdurham.com/collegesport/">College Sport</a></li>
					<li><a href="https://www.teamdurham.com/universitysport/">University Sport</a></li>
					<li><a href="https://www.teamdurham.com/leadership/">Leadership Development</a></li>
					<li><a href="https://www.teamdurham.com/alumni/">Alumni</a></li>
					<li><a href="https://www.teamdurham.com/community/">Community Outreach</a></li>
					<li><a href="https://www.teamdurham.com/holidaycamps/">Holiday Camps</a></li>
				</ul>
			</div>
		</div>		
		
		<div id="menu2">
			<ul>
				<?php 
					echo'<li></li><li>
						<form action="navSearchResult.php" method="post">
						<div style="padding-right: 15%">
						    <div style="width: 70%; float: left">
						        <input type="text" class="form-control" id="searchhhh" name="search_content"  />
						    </div>
						    <div style="width: 25%;float: left; padding-left: 3%">
						        <button type="submit" class="btn btn-primary" >search</button>
						    </div>
						 </div>
						</form>
						</li>';
				?>
			</ul>			
		</div>

		<div id="menu">
			<ul>
				<?php
				//session_start();
				if(empty($_SESSION)){
					// visitor
					echo '<li> 
							<a href="navLoginUser.php">Login/Register</a>
						</li>';
				}else if($_SESSION["loginStatus"] == 2){
					// user
					echo '<li> 
							<a href="dbfunction.php?action=logout">Logout</a>
						</li>

						<li> 
							<a>My Account</a>
							<ul style="width:auto">
								<li style="width:auto"><a href="navAccountBookings.php">My Bookings</a></li>
								<li style="width:auto"><a href="navAccountInfo.php">Personal Information</a></li>
								<li style="width:auto"><a href="navAccountResetPwd.php">Reset Password</a></li>
							</ul>
						</li>

						<li> 
							<a href="navMakeMyBooking.php">Make a Booking</a>
						</li>
						
						<li> 
							<a style="width:auto"><i class="fas fa-user"></i> Hi, '.$_SESSION["username"].'</a>
						</li>';
				}elseif($_SESSION["loginStatus"] == 1){
					// admin
					echo '<li> 
							<a href="dbfunction.php?action=logout">Logout</a>
						</li>

						<li> 
							<a>My Account</a>
							<ul style="width:auto">
								<li style="width:auto"><a href="navAccountBookings.php">My Bookings</a></li>
								<li style="width:auto"><a href="navAccountInfo.php">Personal Information</a></li>
								<li style="width:auto"><a href="navAccountResetPwd.php">Reset Password</a></li>
							</ul>
						</li>

						<li> 
							<a>Bookings</a>
							<ul style="width:auto">
								<li style="width:auto"><a href="navBookingsAddIndividual.php">Add Individual User Bookings</a></li>
								<li style="width:auto"><a href="navMakeMyBooking.php">Make My Booking</a></li>
								<li style="width:auto"><a href="navBookingsBlock.php">Block Periods</a></li>
								<li style="width:auto"><a href="navBookingsOverallCalendar.php">Overall Calendar</a></li>
							</ul>
						</li>

						<li> 
							<a>Facilities</a>
							<ul>
								<li><a href="navFacilitiesAdd.php">Add</a></li>
								<li><a href="navFacilitiesEdit.php">Edit</a></li>
								<li><a href="navFacilitiesDelete.php">Delete</a></li>
							</ul>
						</li>
					
						<li>
							<a style="width:auto"><i class="fas fa-user"></i> Hi, '.$_SESSION["username"].'</a>
						</li>';
				}else{
					// visitor
					echo '<li> 
							<a href="navLoginUser.php">Login/Register</a>
						</li>';
				}
				?>

			</ul>
		</div>
