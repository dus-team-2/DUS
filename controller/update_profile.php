<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-09
 * Time: 17:02
 */
require_once ('../model/common.php');

$current_user_id = $_SESSION['id'];
$current_user_all = get_by_from('*', 'id', 'user', $current_user_id);

//print_r($current_user_email);
?>


