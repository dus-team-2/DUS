<?php
include "header.php";

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

<div class="individual_content">
    <div class="individual_second_layer">
        <div class="span9">
            <h2>Add Individual User Bookings</h2>
            <?php
            include "config.php";
            $sql = "SELECT id,name FROM facility ORDER BY name ASC;";
            $result = mysqli_query($conn, $sql);

            $sql1 = "SELECT id, username FROM user ORDER BY username ASC;";
            $result1 = mysqli_query($conn, $sql1);
            ?>
            <form action="ComplexBookingInsert.php" method="post">
                <div class="form-row">
                <label>Booking for user:</label>
                    <select class="form-control" name="user">
                        <?php
                        if (mysqli_num_rows($result1) > 0) {
                            while($row = mysqli_fetch_assoc($result1)) {
                                $a= $row['username'];
                                $b= $row['id'];
                                echo "<option value='$b'>".$a."</option>";
                            }
                        } else {
                            echo "0";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-row">
                    <label>Booking space:</label>
                </div>
                    <?php
                    if (mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_assoc($result)) {
                            $a= $row['name'];
                            $b= $row['id'];

                            echo "<input type='checkbox' name='facility[]' value='$b'>  $a  ";
                            echo "<br>";
                        }
                    } else {
                        echo "0";
                    }
                    ?>
                    </select>
                    <br />

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Date:</label>
                        <input type="date" class="form-control" name="date"  min="<?php echo date('Y-m-d');?>" max="2030-01-01" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>time:</label>
                            <select  class="form-control" name="time" >
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
                    </div>
                </div>
                <div class="form-row">
                    <input type="submit" class="btn btn-primary" value="submit"/>
                </div>
            </form>
        </div>
    </div>
</div>





<?php include "footer.php";?>