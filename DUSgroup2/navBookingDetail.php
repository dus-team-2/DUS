<?php
include "header.php";
?>
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <script src="../view/js/bootstrap.bundle.js"></script>
    <script src="../view/js/bootstrap.js"></script>
    <script src="../view/js/script_joyce.js"></script>
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../view/css/css_joyce.css">

<?php
include "header2.php";
//session_start();
/*if(!isset($_SESSION["loginStatus"])){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}*/
// require "dbconfig.php";

?>


    <div>
        <?php
        include "side.php";
        require_once ('../view/booking_detail.php');
        ?>
    </div>





<?php include "footer.php";?>