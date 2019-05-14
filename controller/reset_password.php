<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-12
 * Time: 20:19
 */

require_once ('../model/update.php');

$current_user = $_POST['current_user'];
$hashPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
update_password($current_user, $hashPassword);

echo "<script>alert('password successfully reset!');
window.location.href = '../view/reset_password.php'</script>";
