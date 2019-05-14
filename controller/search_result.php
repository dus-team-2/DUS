<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-11
 * Time: 20:24
 */
require_once ('../model/common.php');

//echo "<script>alert('".$_POST['search_content']."')</script>";

$search_content = $_POST['search_content'];
$facility_result_set = array();
$event_result_set = array();
$facility_result_set = search_by_from('facility', 'name', 'description', $search_content);
$event_result_set = search_by_from_with_filter('booking', 'title', 'content', $search_content, 'is_fixed', 1);
if(count($facility_result_set)!== 0 || count($event_result_set)!== 0){
    $search_message = 'Here is the search result';

}
else{
    $search_message = 'No result found';
}

require_once ('../view/search_result.php');



