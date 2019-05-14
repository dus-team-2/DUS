<?php
session_start();
include_once'DatabaseConnection.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Check Availability</title>
    <link rel="stylesheet" href="css/Booking.css"/>
    <script type="text/javascript" src="js/DatePicker/WdatePicker.js" charset="UTF-8"></script>
</head>

<body>
<p>Check Availability</p>

<table >
    <tbody id="resourceTable">
    <div class="notice">
        Check Availability<br>
        Notice：<div class="occupied">&nbsp;&nbsp;</div>Occupied
        <div class="useable">&nbsp;&nbsp;</div>Available
    </div>

    <?php
    $sql="select * from facility where 1=1";
    $query=mysql_query($sql);
    $rowscount=mysql_num_rows($query);
    for($i=0;$i<$rowscount;$i++){
        ?>
        <th></th>
        <th><?php echo mysql_result($query,$i,name);?></th>
        <?php
    }
    ?>
    <tr>
    <tr><td>8:00-9:00</td></tr>
    <tr><td>9:00-10:00</td></tr>
    <tr><td>10:00-11:00</td></tr>
    <tr><td>11:00-12:00</td></tr>
    <tr><td>12:00-13:00</td></tr>
    <tr><td>13:00-14:00</td></tr>
    <tr><td>14:00-15:00</td></tr>
    <tr><td>15:00-16:00</td></tr>
    <tr><td>16:00-17:00</td></tr>
    <tr><td>17:00-18:00</td></tr>
    <tr><td>18:00-19:00</td></tr>
    <tr><td>19:00-20:00</td></tr>
    <tr><td>20:00-21:00</td></tr>
    <tr><td>21:00-22:00</td></tr>
    </tr>

    </tbody>

</table>

<form id="form1" name="form1" method="post" action="">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="black" style="border-collapse:collapse">
        <tr><td>Date:</td><td><input name='Date' type='text' id='Date' value='<?php echo mysql_result($query,0,bisaishijian);?>' onclick="WdatePicker({'dateFmt':'yyyy-MM-dd'})" style='border:solid 1px #000000; color:#666666; width:125px;' /></td></tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="hidden" name="addnew" value="1" />
                <input type="submit" name="Submit" value="Search";"  style='border:solid 1px #000000; color:#666666' />
                <input type="reset" name="Submit2" value="Reset" style='border:solid 1px #000000; color:#666666' /></td>
        </tr>
    </table>
</form>
