<?php

require_once ('common.php');
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-11
 * Time: 15:49


echo $_FILES['123']['tmp_name'];
//echo '123test';
if(is_uploaded_file($_FILES['123']['tmp_name'])) {
    $fl = fopen($_FILES['123']['tmp_name'], "rb");

    if ($fl) {
        echo 'yes';
    } else {
        echo 'no';
    }
   //echo filesize($_FILES['123']['tmp_name']);
    $file_data = addslashes(fread($fl, filesize($_FILES['123']['tmp_name'])));
    echo $file_data;
}

require_once ('common.php');
header('Content-type:image/png');
echo get_by_from('pic', 'id', 'user', 1)['pic'];

//echo search_by_from('facility', 'name', 'description', 'gym');
if(strpos('gym', 'gym')!== false){
    echo 'yes';
}else{
    echo 'no';
}

$whole_table = get_all('facility');
print_r($whole_table);
$result = array();
for ($i=0; $i<count($whole_table); $i++){
    if(strpos($whole_table[$i]['name'], 'gym')!== false || strpos($whole_table[$i]['description'], 'gym')!== false){
        echo 'yeah';
        array_push($result, $whole_table[$i]);
    }
}
print_r($result);*/
//print_r(search_by_from_with_filter('booking', 'title', 'content', 'yoga', 'is_fixed','1'));

$whole_table = get_by_from('*', 'is_fixed', 'booking', 1);
print_r($whole_table);
$result = array();
for ($i=0; $i<count($whole_table); $i++){
    print_r($whole_table[$i]['title']);
    if(strpos($whole_table[$i]['title'], 'yoga')!== false || strpos($whole_table[$i]['content'], 'yoga')!== false){
        array_push($result, $whole_table[$i]);
    }
}
print_r($result);