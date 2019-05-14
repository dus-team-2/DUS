<?php
include "header.php";

include "header2.php";
include "side.php";
session_start();
if($_SESSION["loginStatus"] != 1){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
// require "dbconfig.php";

?>

<div class="span9">
    <h1>Add Individual User Bookings</h1>
</div>



<?php include "footer.php";?>