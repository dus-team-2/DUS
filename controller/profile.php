<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-10
 * Time: 15:30
 */

require_once ('../model/common.php');

$current_user_id = 1;
$current_user_all = get_by_from('*', 'id', 'user', $current_user_id);