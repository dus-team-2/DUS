<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-11
 * Time: 20:24
 */
//$search_content = $_POST['search_content'];
require_once ('../controller/search_result.php');
?>

<body>
<div class="individual_content">
    <div class="individual_second_layer">

        <div id="operation_div">
            <div id="filter_div">
                <select id="filter_content" class="form-control">
                    <option value="1">All</option>
                    <option value="2">Only facility</option>
                    <option value="3">Only event</option>
                </select>
                <button id="filter_button" class="btn btn-primary" onclick="filter_search()">Apply</button>
            </div>
        </div>
        <div id="message_div">
            <p class="explain" style="color: #742e68; font-size: 15px"><?php echo $search_message ?></p>
        </div>
        <!--facility list-->
        <div id="search_result_div">
            <div class="list_div" id="search_facility">
                <div class="list-group" id="search_list_f">
                    <?php
                    for ($i=0; $i<count($facility_result_set); $i++ ){
                        if(substr($facility_result_set[$i]['description'],0,120)){
                            $description = substr($facility_result_set[$i]['description'],0,120);
                        }
                        else{
                            $description = $facility_result_set[$i]['description'];
                        }
                        echo "
                    <div>
                        <a href='navFacilityDetails.php?fid=".$facility_result_set[$i]['id']."' class='list-group-item list-group-item-action'>
                            <div class='icon_div'><img src='../view/image/icon_F.png' class='icon_search'></div>
                            <div class='list_inner_content_div'>
                                <div class='d-flex w-100 justify-content-between'>
                                    <h5 class='mb-1'>". $facility_result_set[$i]['name'] ."</h5>
                                </div>
                                <p class='mb-1' style='word-wrap:break-word;word-break:break-all;'>". $description ."</p>
                                
                            </div>
                            <div id='id4' style='clear:both'></div>
                        </a>
                    </div>";

                    }
                    ?>
                </div>
            </div>
            <div class="list_div" id="search_event">
                <div class="list-group" id="search_list_f">
                    <?php
                    for ($i=0; $i<count($event_result_set); $i++ ){
                        if(substr($event_result_set[$i]['content'],0,120)){
                            $description = substr($event_result_set[$i]['content'],0,120);
                        }
                        else{
                            $description = $event_result_set[$i]['content'];
                        }
                        echo "
                            <div>
                                <a href='../DUSgroup2/navBookingDetail.php?bid=". $event_result_set[$i]['id'] ."' class='list-group-item list-group-item-action'>
                                    <div class='icon_div'><img src='../view/image/icon_E.png' class='icon_search'></div>
                                    <div class='list_inner_content_div'>
                                        <div class='d-flex w-100 justify-content-between'>
                                            <h5 class='mb-1'>". $event_result_set[$i]['title'] ."</h5>
                                        </div>
                                        <p class='mb-1' style='word-wrap:break-word;word-break:break-all;'>". $description ."</p>
                                        
                                    </div>
                                    <div id='id4' style='clear:both'></div>
                                </a>
                            </div>";

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


