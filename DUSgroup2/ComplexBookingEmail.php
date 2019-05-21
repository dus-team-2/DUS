<?php
include "header.php";

include "header2.php";
include "side.php";
//session_start();
if($_SESSION["loginStatus"] != 1){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
    include "config.php";
    $total=$_SESSION['totalComplex'];
	$id = $_SESSION['uid'];
    $result = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
    $row = mysqli_fetch_array($result);
    $is_uni_member=$row['is_uni_member'];
    $user=$row['username'];
    $email=$row['email'];


    if($is_uni_member==1){
        $total=$total/2;
    }

    //echo  $total;

    $user;


    ?>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {

        $mail->CharSet ="UTF-8";
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alison.pancake@gmail.com';
        $mail->Password = 'testfordurham';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('alison.pancake@gmail.com', 'DUS');
        $mail->addAddress($email, 'Booking User');
        $mail->addReplyTo('alison.pancake@gmail.com', 'info');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Bill' . time();
        $mail->Body    = "<h1>"."Hi, ".$user."  <br/>        ".". Your booking is done and you need to pay "."$total"." pounds.</h1>" . date('Y-m-d H:i:s');
        $mail->AltBody = 'the brower does not support';

        $mail->send();
        echo 'Email sent successfully';
		echo "   <script>
   setTimeout(function(){window.location.href='navBookingsOverallCalendar.php';},0);
   
			</script>";
    } catch (Exception $e) {
        echo 'Email sent failed', $mail->ErrorInfo;
    }
    ?>
</div>
</body>
</html>

