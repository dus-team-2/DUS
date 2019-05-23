<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-10
 * Time: 14:26
 */

require_once('../model/update.php');
require_once ('../model/common.php');

//print_r('123');
//print_r($_POST['user_id']);
/**$file_dir = $_POST['update_pic'];
$handler = fopen($file_dir, 'r+b');
$file_size = filesize($file_dir);
header("Content-type: image/*");
Header("Accept-Ranges: bytes");
Header("Accept-Length: ".$file_size);
Header("Content-Disposition: attachment; filename=" . basename( $file_dir));
$pic_data = fread($handler,$file_size);
fclose($handler);


if(is_uploaded_file($_FILES['update_pic']['tmp_name'])) {
    $fp = fopen($_FILES['update_pic']['tmp_name'], "rb");
    if (!$fp) die("file open error");
    //print_r(filesize($_FILES['update_pic']['tmp_name']));
    $file_data = addslashes(fread($fp, filesize($_FILES['update_pic']['tmp_name'])));
    fclose($fp);
    unlink($_FILES['update_pic']);
}
//print_r($file_data);
//print_r($_POST['update_pic']);
//print_r($pic_data);

update_user($_POST['user_id'], $_POST['update_username'], $_POST['update_gender'], $file_data, $_POST['update_is_uni_member'],$_POST['update_date_of_birth'], $_POST['update_tel'], $_POST['update_address']);
/**echo "<script>
alert('succesfully updated!');
window.location.href='../view/profile.php';
</script>";**/
//echo "<script>alert(".$_POST['update_is_uni_member'].");</script>";

header('content-type:text/html;charset=utf-8');
$fileInfo=$_FILES['update_pic'];
$maxSize=2097152;//maximal limit
$allowExt=array('jpeg','jpg','png','gif','wbmp');
$flag=true;//check if it is a picture type
//1.check error
if($fileInfo['error']==0){
    //check size
    if($fileInfo['size']>$maxSize){
        exit('file is too large');
    }
    //$ext=strtolower(end(explode('.',$fileInfo['name'])));
    $ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
    if(!in_array($ext,$allowExt)){
        exit('illegal file type');
    }
    //check if it is from HTTP POST
    if(!is_uploaded_file($fileInfo['tmp_name'])){
        exit('file is not from HTTP POST');
    }
    //check if it is a picture
    if($flag){
        if(!getimagesize($fileInfo['tmp_name'])){
            exit('not a picture');
        }
    }
    $path='../uploads';
    if(!file_exists($path)){
        mkdir($path,0777,true);
        chmod($path,0777);
    }
    //ensure there is no file covered by another one with the same name
    $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
    //echo $uniName;exit;
    $destination=$path.'/'.$uniName;
    if(move_uploaded_file($fileInfo['tmp_name'],$destination)){
        update_user($_POST['user_id'], $_POST['update_username'], $_POST['update_gender'], $destination, (int)($_POST['update_is_uni_member']),$_POST['update_date_of_birth'], $_POST['update_tel'], $_POST['update_address']);

        echo "<script>alert('Profile updated!'); window.location.href='../DUSgroup2/navAccountInfo.php'</script>";

    }else{
        echo 'profile modification failed';
    }
}elseif($fileInfo['error'] == 4){
    $destination = get_by_from('pic','id','user', $_POST['user_id'])['pic'];
    //echo "<script>alert($destination)</script>";

    update_user($_POST['user_id'], $_POST['update_username'], $_POST['update_gender'], $destination, (int)($_POST['update_is_uni_member']),$_POST['update_date_of_birth'], $_POST['update_tel'], $_POST['update_address']);
    echo "<script>alert('Profile updated!'); window.location.href='../DUSgroup2/navAccountInfo.php'</script>";
} else{
    //error info
    switch($fileInfo['error']){
        case 1:
            echo "<script>alert('file size over the limit of PHP upload_max_filesize'); window.location.href='../view/update_profile.php'</script>";
            break;
        case 2:
            echo "<script>alert('file size over the MAX_FILE_SIZE of the form'); window.location.href='../view/update_profile.php'</script>";
            break;
        case 3:
            echo "<script>alert('file is partly uploaded'); window.location.href='../view/update_profile.php'</script>";
            break;

        case 6:
            echo "<script>alert('no temporary directory'); window.location.href='../view/update_profile.php'</script>";
            break;
        case 8:
            echo "<script>alert('system error'); window.location.href='../view/update_profile.php'</script>";

            break;
    }
}

//echo $destination;

