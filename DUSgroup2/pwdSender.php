<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  require "dbconfig.php";

  function randomkeys($length){   
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
    do{
        $key="";
        for($i=0;$i<$length;$i++){   
            $key .= $pattern{mt_rand(0,62)};    //生成php随机数   
        }
    }while(preg_match('/[A-Z]/', $key) == 0 || preg_match('/[0-9]/', $key) == 0);
    return $key;   
  }   
  $randomPwd = randomkeys(10); 
  // echo $randomPwd;

  $C_name=$_POST['C_name'];
  $C_email=$_POST['C_email'];
  $recoveryAnswer = $_POST['answer'];
  // $C_tel=$_POST['C_tel'];
  // $C_message=$_POST['C_message'];


  $sql = "SELECT username, email FROM user
  WHERE username = :username AND email = :email AND security_answer = :security_answer";
  $statement = $pdo -> prepare($sql);
  $statement -> bindParam(":username", $C_name, PDO::PARAM_STR);
  $statement -> bindParam(":email", $C_email, PDO::PARAM_STR);
  $statement -> bindParam(":security_answer", $recoveryAnswer, PDO::PARAM_STR);
  $statement -> execute();

  if($statement -> rowCount() == 1){
    unset($statement);
    // unset($pdo);

    $sql = "UPDATE user SET password = :password WHERE username = :username";
    $statement = $pdo -> prepare($sql);
    $statement -> bindParam(":password", $randomPwd, PDO::PARAM_STR);
    $statement -> bindParam(":username", $C_name, PDO::PARAM_STR);
    $statement -> execute();

    unset($statement);
    $sql = "UPDATE user SET password = ENCRYPT(password) WHERE username = :username";
    $statement = $pdo -> prepare($sql);
    $statement -> bindParam(":username", $C_name, PDO::PARAM_STR);
    $statement -> execute();

    unset($pdo);

    // $data = $statement -> fetch();
    $mail= new PHPMailer();                             //建立新物件
    $mail->SMTPDebug = 0;                        
    $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    $mail->SMTPAuth = true;                        //設定SMTP需要驗證
    $mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
    $mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet = "utf-8";                       //郵件編碼
    $mail->Username = "alison.pancake@gmail.com";       //Gamil帳號
    $mail->Password = "testfordurham";                 //Gmail密碼
    $mail->From = "alison.pancake@gmail.com";        //寄件者信箱
    $mail->FromName = "DUS";                  //寄件者姓名
    $mail->Subject ="New Password"; //郵件標題
    $mail->Body = "Hi, ".$C_name." (".$C_email."), your new password is: ".$randomPwd; //郵件內容
    // $mail->addAttachment('../uploadfile/file/dirname.png','new.jpg'); //附件，改以新的檔名寄出
    $mail->IsHTML(true);                             //郵件內容為html
    $mail->AddAddress("$C_email");            //收件者郵件及名稱
    if(!$mail->Send()){
      echo "Error: " . $mail->ErrorInfo;
    }else{
      echo "<script>
        alert('Email with new password sent.');
        window.location = 'navLoginUser.php';
        </script>";
    }
  }else{
    // invalid answer
    echo "<script>
        alert('Invalid answer.');
        window.location = 'navLoginPwdForgot.php';
    </script>";
  }
  

?>