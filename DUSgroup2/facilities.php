<?php
include "header.php";
?>
<link href="../DUSport.css" rel="stylesheet">
<link href="../areobics.css" rel="stylesheet">

<?php
include "header2.php";

// require "dbconfig.php";

?>
<div>
<div id="content" class="row-fluid">
    <div class="span3 pages">
        <ul>
            <li class="navcurrent"><strong class="current">Our Facilities</strong>
            <li class="sideways"><a href="events.php">Events</a></li>
            <li class="sideways"><a href="https://www.teamdurham.com/facilities/durham/">Maiden Castle</a></li>
            <li class="sideways"><a href="https://www.teamdurham.com/queenscampus/">Queen's Campus</a></li>
            <li class="sideways"><a href="https://www.teamdurham.com/about/facilities/durham/contactus/">Contact Us</a></li>
        </ul>
    </div>

    <?php
    require_once ('../index.php');
    ?>
</div>

<?php include "footer.php";?>