<?php
$servername = "myeusql.dur.ac.uk";
$username = "dqrs89";
$password = "dqrs89ru34nner";
$dbname = "Xdqrs89_SE2_DUS";
/*$servername = "localhost";
$username = "root";
$password = "19960614";
$dbname = "dus";*/
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("error: " . $conn->connect_error);
}
