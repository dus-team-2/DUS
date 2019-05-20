<!DOCTYPE html>
<?php session_start();?>
<!-- saved from url=(0038)https://www.teamdurham.com/facilities/ -->
<html class="no-js" lang="en"><!--<![endif]--><head>
    
    <script src="../view/js/bootstrap.bundle.js"></script>
    <script src="../view/js/bootstrap.js"></script>
    <script src="../view/js/script_joyce.js"></script>
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../view/css/css_joyce.css">


    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telphone=no,email=no" />

    <link rel="stylesheet" type="text/css" href="../view/css/image_input.css" />
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Our Facilities - Durham University</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" href="https://www.teamdurham.com/images/template/teamdurham/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="try_files/team-durham.css" type="text/css">
    <link rel="stylesheet" href="nav.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <?php
include "header2.php";
if(!isset($_SESSION["loginStatus"])){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
// require "dbconfig.php";

?>


    <div>
        <?php
        include "side.php";
        require_once ('../view/update_profile.php');
        ?>
    </div>





<?php include "footer.php";?>