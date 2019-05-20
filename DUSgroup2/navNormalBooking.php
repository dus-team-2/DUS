<?php
	
	
include "header.php";
?>
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="../view/js/script_joyce.js"></script>
    <script src="build/kalendae.js" type="text/javascript" charset="UTF-8"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

<?php
include "header2.php";
include "side.php";
//session_start();

/*if(!isset($_SESSION["loginStatus"])){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}*/
// require "dbconfig.php";

?>
<div class="span9">
    <h1>Make a Booking</h1>
<div>

    <?php
    include "config.php";
    $sql = "SELECT id,name FROM facility";
    $result = mysqli_query($conn, $sql);

    //read users from database
    $sql = "SELECT id,username FROM user";
    $user_result = mysqli_query($conn, $sql);
    $user_set = array();
    while ($temp_row = mysqli_fetch_assoc($user_result)){
        array_push($user_set,$temp_row);
    }
    ?>
    <form  action="NormalBookingInsert.php" method="post">
        Booking space: <select name="facility" id="booking_select_facility">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $a= $row['name'];
                    $b=$row['id'];
                    echo "<option value='$b'>".$a."</option>";
                }
            } else {
                echo "0";
            }
            ?>
        </select>
        <br />
        <div id="booking_input_user" style="display: none">
            <p>make a booking for a group of users:</p>
            <p class='label'><label>Select users:</label></p>
            <select name="user_ids[]" id="booking_user_ids" class="selectpicker" multiple data-live-search="true" title="Choose or input" data-size="3" multiple data-selected-text-format="count>2">
                <?php
                foreach($user_set as $member){
                    echo "<option value='".$member['id']."'>".$member['username']." </option>";
                }
                ?>
            </select>

            </br>
        </div>

        <dd >Date:<input type="date" name="date"  min="<?php echo date('Y-m-d');?>" max="2030-01-01"/>
<br/>
           time:<input type='checkbox' name='time[]' value='8'>8:00-9:00;
           <br />
               &nbsp;&nbsp;<input type='checkbox' name='time[]' value='9'>9:00-10:00;
           <br />
              &nbsp;&nbsp;<input type='checkbox' name='time[]' value='10'>10:00-11:00;
           <br />
               &nbsp;&nbsp;<input type='checkbox' name='time[]' value='11'>11:00-12:00;
           <br />
             &nbsp;&nbsp;<input type='checkbox' name='time[]' value='12'>12:00-13:00;
           <br />
              &nbsp;&nbsp;<input type='checkbox' name='time[]' value='13'>13:00-14:00;
           <br />
             &nbsp;&nbsp;<input type='checkbox' name='time[]' value='14'>14:00-15:00;
           <br />
           &nbsp;&nbsp;<input type='checkbox' name='time[]' value='15'>15:00-16:00;
           <br />
               &nbsp;&nbsp;<input type='checkbox' name='time[]' value='16'>16:00-17:00;
           <br />
              &nbsp;&nbsp;<input type='checkbox' name='time[]' value='17'>17:00-18:00;
           <br />
              &nbsp;&nbsp;<input type='checkbox' name='time[]' value='18'>18:00-19:00;
           <br />
               &nbsp;&nbsp;<input type='checkbox' name='time[]' value='19'>19:00-20:00;
           <br />
               &nbsp;&nbsp;<input type='checkbox' name='time[]' value='20'>20:00-21:00;
           <br />
               &nbsp;&nbsp;<input type='checkbox' name='time[]' value='21'>21:00-22:00;
           <br />
        </dd>
        <dd><input type="submit" value="submit" /></dd>
    </form>
</div>
</div>

<?php include "footer.php";?>