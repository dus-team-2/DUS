<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-10
 * Time: 15:27
 */

require_once ('../model/common.php');
header('Content-type:image/＊');
//header("Content-Transfer-Encoding: binary");
echo get_by_from('pic', 'id', 'user', $_GET['id'])['pic'];