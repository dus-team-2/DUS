<?php
	
	
include "header.php";
include "header2.php";
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

    <?php
    include "config.php";
    $sql = "SELECT id,name FROM facility";
    $result = mysqli_query($conn, $sql);
    ?>
    <form  action="NormalBookingInsert.php" method="post">
        Booking space: <select name="facility">
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