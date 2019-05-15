<?php
//connect to database to display games

$facility_id = $_GET['fid'];
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


        $FacilityPrice = $row['price'];


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
    <title>Aerobics Prices</title>
    <link href="DUSport.css" rel="stylesheet">
    <link href="aerobics_price.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <div id="wb_txtaerohead" style="position:absolute;left:231px;top:0px;width:467px;height:52px;z-index:10;">
        <span style="color:#4F4F4F;font-family:Verdana;font-size:43px;">Aerobics Prices</span></div>
    <div id="wb_txtaerofullpricelist" style="position:absolute;left:231px;top:77px;width:250px;height:600px;z-index:11;">
        <span style="color:#4F4F4F;font-family:Arial;font-size:13px;line-height:24px;"><strong> Aerobics Price per hour  £<?php echo $FacilityPrice ?> </span></div>
</div>
</body>
</html>