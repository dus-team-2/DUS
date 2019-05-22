<?php
include "header.php";?>
	<link rel="stylesheet" href="Kalendae/build/kalendae.css" type="text/css">
    <script type='text/javascript' src='Kalendae/build/kalendae.standalone.js'></script>
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
include "config.php";
    $sql = "SELECT id,name FROM facility ORDER BY name ASC;";
    $result = mysqli_query($conn, $sql);
?>

<div class="individual_content">
    <div class="individual_second_layer">

        <div class="span9">
            <h2>Block Periods</h2>
            <form  action="insertBlockBooking.php" method="post">
                <div class="form-row">
                    <label>Booking space:</label>
                    <select name="facility" class="form-control">
                        <?php
                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $a= $row['name'];
                                echo "<option value='".$row['id']."'>".$a."</option>";
                            }
                        } else {
                            echo "0";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-row">
                    <label>Date:</label>
                    <input id='date' class="form-control" name="date" type="text" value=''/>
                    <p class="explain">*Note for date: choose several dates if needed </p>
                </div>

                <div class="form-row">
                    <label>Time:</label>
                    <select class="form_multiselect" name="time[]" multiple="true">
                        <option value="8">8:00-9:00</option>
                        <option value="9">9:00-10:00</option>
                        <option value="10">10:00-11:00</option>
                        <option value="11">11:00-12:00</option>
                        <option value="12">12:00-13:00</option>
                        <option value="13">13:00-14:00</option>
                        <option value="14">14:00-15:00</option>
                        <option value="15">15:00-16:00</option>
                        <option value="16">16:00-17:00</option>
                        <option value="17">17:00-18:00</option>
                        <option value="18">18:00-19:00</option>
                        <option value="19">19:00-20:00</option>
                        <option value="20">20:00-21:00</option>
                        <option value="21">21:00-22:00</option>
                    </select>
                    <p class="explain">*Note for time: use 'ctrl' if you want to choose several time slots</p>
                </div>

                <div class="form-row">
                    <label>Title:</label>
                    <input type='text' class="form-control" id='title' name='title'/>
                </div>
                <div class="form-row">
                    <label>Content:</label>
                    <textarea id='content' class="form_textarea" rows="5" name='content'></textarea>
                </div>

            <div class="form-row">
                <input type="submit" class="btn btn-primary" value="submit" />
            </div>
        </form>


    </div>
    </div>
</div>


<script type="text/javascript">
		
		function calendarTool(inputName,) {
			new Kalendae.Input(inputName, {
				direction: 'today-future', //past  today-past  future   today-future   any  
				directionScrolling: true, 
				mode: 'multiple', 
				format: "YYYY-MM-DD"
			});
		};
		
		calendarTool('date')

</script>


<?php include "footer.php";?>