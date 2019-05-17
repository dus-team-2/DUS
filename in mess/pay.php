<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/center.css" rel="stylesheet" type="text/css" />
    <title>center</title>
</head>

<body>
<div>
    <p><h1>pay</h1><h2>User:<?php  session_start();
        // echo  $_SESSION['name'];
        $name=$_SESSION['name'];
        ?></h2></p>

    <?php
    include "config.php";
    $a=0;
    $result = mysqli_query($conn,"SELECT * FROM facility WHERE name='$facility'");
    while($row = mysqli_fetch_array($result))
    {
        $row['facility'];
        $a=$a+$row['price'];
//    echo "<br>";
    }
    $a;
    $result2= mysqli_query($conn,"SELECT * FROM user WHERE username='$name'");
    $row2= mysqli_fetch_array($result2);
    $is_member= $row2['is_uni_member'];
    if($is_member=="1"){
        $a=$a/2;
    }
    ?>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    date_default_timezone_set('EN');

    $result3 = mysqli_query($conn,"SELECT * FROM user WHERE username='$name'");

    while($row3 = mysqli_fetch_array($result3))
    {
        $email=$row3['email'];
//        echo $email;
    }

    $mail=new PHPMailer();

    $mail->SMTPDebug = 3;

    $mail->isSMTP();

    $mail->SMTPAuth=true;

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPSecure = 'ssl';

    $mail->Port = 465;

    $mail->Hostname = 'localhost';

    $mail->CharSet = 'UTF-8';

    $mail->FromName = "$name";

    $mail->Username = "alison.pancake@gmail.com";
    //Gamil帳號
    $mail->Password = "testfordurham";
    //Gmail密碼
    $mail->From = "alison.pancake@gmail.com";

    $mail->isHTML(true);
    //echo $email;

    $mail->addAddress("$email");

    $mail->Subject = '这是一个PHPMailer发送邮件的示例';

    $mail->Body = "Username:".$name."Price:".$a."Facility:".$facility."Date:".$date."Time:".$time;

    $status = $mail->send();

    if($status)
    {
        echo "<script>
        alert('Book successfully, email with detail sent.');
        window.location = 'booking.php';
        </script>";
    }
    else
    {
        echo 'Error'.$mail->ErrorInfo;
    }

    ?>
</div>
</body>
</html>
