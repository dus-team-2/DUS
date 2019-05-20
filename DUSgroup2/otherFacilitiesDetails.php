<?php
include "header.php"; 
include "header2.php";
include "side.php";
require "dbconfig.php";

if($_GET["action"] != "otherFacilitiesDetails"){
    // echo "here";
    echo"<script>
        alert('You haven\'t chosen any facilities.');
        window.location = 'otherFacilitiesDetails.php';
        </script>";
}

$name = $_GET["name"]; //對應值
$sql = "SELECT * FROM facility WHERE name = :name";
$statement = $pdo -> prepare($sql);
$statement -> bindParam(":name", $name);
$statement -> execute();

$data = $statement -> fetchAll(PDO::FETCH_ASSOC);//把東西撈出來
unset($statement);//剛剛加的
unset($pdo);

?>

<div class="span9">
    <h1>Other Facilities</h1>
</div>

<div class="span9">

<p>ID: <?php echo $data[0]["id"]?></p>
<p>Facility: <?php echo $data[0]["name"]?></p>
<p>Description: <?php echo $data[0]["description"]?></p>
<p>Price: <?php echo $data[0]["price"]?></p>
<p>Capacity: <?php echo $data[0]["capacity"]?></p>
<p>Contact Email: <?php echo $data[0]["contact_email"]?></p>
<p>Contact Tel: <?php echo $data[0]["contact_tel"]?></p>
<p>Contact Address: <?php echo $data[0]["contact_address"]?></p>
<p>
    <?php if($data[0]["pic"] != null):?>
        <img src=<?php echo $data[0]["pic"]?> style="width:80%; display:block;" alt="facility picture 1">
    <?php endif;?>

    <?php if($data[0]["pic_2"] != null):?>
        <img src=<?php echo $data[0]["pic_2"]?> style="width:80%; display:block;" alt="facility picture 1">
    <?php endif;?>
</p>



</div>

<?php include 'footer.php';?>