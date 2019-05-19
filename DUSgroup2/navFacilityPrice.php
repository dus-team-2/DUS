<?php
include "header.php";
?>
    <link href="../Facilities_Final/DUSport.css" rel="stylesheet">
    <link href="../Facilities_Final/areobics.css" rel="stylesheet">

<?php
include "header2.php";
?>
    <div>
        <?php

        
        if(!isset($_SESSION["loginStatus"])){
            echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
        }
        // require "dbconfig.php";
        include "side.php";
        require_once('../Facilities_Final/facility_price.php');
        ?>
    </div>


<?php include "footer.php";?>