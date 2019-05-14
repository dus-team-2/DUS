<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/center.css" rel="stylesheet" type="text/css" />
<title>center</title>
</head>

<body>
<div>
<p><h1>Week</h1><h2>User:<?php  session_start();

 echo  $_SESSION['name'];     ?></h2></p>

<div style="width:500px; height:200px; margin-left:500px; margin-top:200px;">
 <a href="center.php"><h2>Monday to Friday</h2></a>
 <a href="center2.php"><h2>Saturday to Sunday</h2></a>
 
</div>

</div>










</body>
</html>