<!doctype html>

<?php


$facility_id = $_GET['fid'];
//connect to database to display games
$servername = "mysql.dur.ac.uk";
$username = "dqrs89";
$password = "dqrs89ru34nner";
$dbname = "Xdqrs89_SE2_DUS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// username and password sent from form

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "Select * from facility where id = ".$facility_id;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $FacilityName = $row['name'];
        $FacilityDescription = $row['description'];
        $FacilityPrice = $row['price'];
        $FacilityCapacity = $row['capacity'];
        $FacilityContactEmail = $row['contact_email'];
        $FacilityContactTel = $row['contact_tel'];
        $FacilityContactAdd = $row['contact_address'];
        $FacilityFirstPic = $row['pic'];
        $FacilitySecondPic = $row['pic_2'];

    }
}  else
{
    echo "0 results";
}
$conn->close();

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Facilty Details</title>
    <link href="DUSport.css" rel="stylesheet">
    <link href="areobics.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="wb_txtaerobics" style="width:100%";>
        <span style="color:#4F4F4F;font-family:Verdana;font-size:43px;"><?php echo $FacilityName ?></span></div>

    <div id="wb_txtaerodetails" style="width:100%;">
        <span style="color:#4F4F4F;font-family:Verdana;font-size:13px;line-height:24px;"><?php echo $FacilityDescription ?></span></div>
    <div id="wb_txtaerocontactadd" style="width:100%;">
        <span style="color:#4F4F4F;font-family:Verdana;font-size:13px;line-height:24px;"> <strong>Contact: </strong><br> <?php echo $FacilityContactEmail ?><br><strong><?php echo $FacilityContactAdd ?></strong> <br>  Tel:<?php echo $FacilityContactTel ?></span></div>
    <div id="facility_detail_image_div" >
        <div id="wb_aerobics1" style="float: left;">
            <img src= <?php echo $FacilityFirstPic?> id="aerobics1" alt="" style="height:180pt;" /></div>
        <div id="wb_aerobics2" style="float: left;">
            <img src=<?php echo $FacilitySecondPic?> id="aerobics2" alt="" style="height:180pt;" /></div>
    </div>
</div>

</body>
</html>
