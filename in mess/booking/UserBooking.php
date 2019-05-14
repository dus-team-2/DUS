<?php
session_start();
include_once'DatabaseConnection.php';
$addnew=$_POST["addnew"];
if($addnew=="1"){
    $title=$_POST["title"];
    $content=$_POST["content"];
    $date=$_POST["date"];
    $facility_id=$_POST["facility_id"];
    $slot=$_POST["slot"];
    $user_id=$_POST["user_id"];

    $sql1="insert into booking(title,content) values ('$title','$content')";
    mysql_query($sql1);

    $sql2="insert into booking_timeslot(date,slot) values ('$date','$slot')";
    mysql_query($sql2);
    
    echo "<script>javascript:alert('Successful operation!');history.back();</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Online Booking</title>
    <link rel="stylesheet" href="css/Booking.css"/>
    <script type="text/javascript" src="js/DatePicker/WdatePicker.js" charset="UTF-8"></script>
</head>

<body>
<p>User Online Booking</p>
<br>
<br>
<form id="form2" name="form2" method="post" action="" >
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="black" style="border-collapse:collapse">
        <tr><td>Title:</td><td><input name='title' type='text' id='title' value='' style='border:solid 1px #000000; color:#666666' />*</td></tr>
        <tr><td>Content:</td><td><input name='content' type='text' id='content' value='' style='border:solid 1px #000000; color:#666666' />*</td></tr>
        <tr><td>Date:</td><td><input name='date' type='text' id='date' value='' onclick="WdatePicker({'dateFmt':'yyyy-MM-dd'})" style='border:solid 1px #000000; color:#666666; width:125px;' /></td></tr>
        <tr><td>Facility:</td><td><select name='facility' id='facility'><?php getoption("facility","name")?></select></td></tr>
        <tr><td>Time:</td><td>
                <label><input name="slot[]" type="checkbox" value="8:00-9:00" />8:00-9:00</label><br>
                <label><input name="slot[]" type="checkbox" value="9:00-10:00" />9:00-10:00</label><br>
                <label><input name="slot[]" type="checkbox" value="10:00-11:00" />10:00-11:00</label><br>
                <label><input name="slot[]" type="checkbox" value="11:00-12:00" />11:00-12:00</label><br>
                <label><input name="slot[]" type="checkbox" value="12:00-13:00" />12:00-13:00</label><br>
                <label><input name="slot[]" type="checkbox" value="13:00-14:00" />13:00-14:00</label><br>
                <label><input name="slot[]" type="checkbox" value="14:00-15:00" />14:00-15:00</label><br>
                <label><input name="slot[]" type="checkbox" value="15:00-16:00" />15:00-16:00</label><br>
                <label><input name="slot[]" type="checkbox" value="16:00-17:00" />16:00-17:00</label><br>
                <label><input name="slot[]" type="checkbox" value="17:00-18:00" />17:00-18:00</label><br>
                <label><input name="slot[]" type="checkbox" value="18:00-19:00" />18:00-19:00</label><br>
                <label><input name="slot[]" type="checkbox" value="19:00-20:00" />19:00-20:00</label><br>
                <label><input name="slot[]" type="checkbox" value="20:00-21:00" />20:00-21:00</label><br>
                <label><input name="slot[]" type="checkbox" value="21:00-22:00" />21:00-22:00</label><br>
            </td></tr>
        <tr><td>Username:</td><td><select name='name' id='user_id'><?php getoption("user","username")?></select></td></tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="hidden" name="addnew" value="1" />
                <input type="submit" name="Submit" value="Add" style='border:solid 1px #000000; color:#666666' />
                <input type="reset" name="Submit2" value="Reset" style='border:solid 1px #000000; color:#666666' /></td>
        </tr>
    </table>
</form>
</body>
