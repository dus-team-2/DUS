<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-12
 * Time: 14:54
 */
//insert the link to facility detail page
$current_user = $_SESSION['id'];
require_once ('../controller/booking_detail.php');

?>

<div class="individual_content">
    <div class="individual_second_layer">
        <div class="show_profile_info" id="show_booking_info">

            <div id="booking_type_div" style="display:  <?php if ($is_manager){
                echo 'block';
            }else{
                echo 'none';
            } ?>">
                <h2>Type: <?php if ($is_fixed){
                    echo 'Fixed Event';
                    }else{
                        echo 'Individual Booking';
                    } ?></h2>
                <h2>ID : <?php echo $current_booking['id'] ?></h2>
                <button class="btn btn-primary" onclick="if(confirm('Are you sure to delete this booking?')){window.location.href = '../controller/delete_booking.php?bid=<?php echo $current_booking['id'] ?>'}">Delete</button>
                <hr/>
            </div>




            <div id="fixed_event_div" style="display: <?php if ($is_fixed){
                echo 'block';
            }else{
                echo  'none';
            }
            ?>">


                <table class="table_two_row">
                    <tbody>
                    <tr>
                        <th scope="row">Title :</th>
                        <td><?php echo $current_booking['title'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Content:</th>
                        <td><?php echo $current_booking['content'] ?></td>
                    </tr>
                    </tbody>
                </table>
                <p class="normal_th">Date & Time:</p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=0; $i<count($time_detail); $i++){
                        echo "<tr>
                    <th scope='row'>".$time_detail[$i][0]."</th>
                    <td>" .$time_detail[$i][1]."</td>
                    ";
                    }
                    ?>
                    </tr>
                    </tbody>
                </table>
                <table class="table_three_row">
                    <tbody>
                        <tr>
                            <th scope="row">Place/Facility: </th>
                            <td><?php echo $related_facilities[0]['name'] ?></td>
                            <td> <button class="btn btn-primary" onclick="window.location.href = 'navFacilityDetails.php?fid=<?php echo $related_facilities[0]['id'] ?>';">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="individual_booking_div" style="display: <?php if ($is_fixed){
                echo 'none';
            }else{
                echo 'block';
            } ?>">
                <table class="table_four_row">
                    <tbody>
                    <tr>
                        <th scope="row">Date :</th>
                        <td><?php echo $time_detail[0][0] ?></td>
                        <th scope="row">Time :</th>
                        <td><?php
                            echo $time_detail[0][1]
                            ?></td>
                    </tr>
                    </tbody>
                </table>
                <p class="normal_th"> Users :</p>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">UNI MEMBER</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">TEL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i=0; $i<count($related_users); $i++){
                                if($related_users[$i]['is_uni_member']){
                                    $is_uni_member = 'Yes';
                                }else{
                                    $is_uni_member = 'No';
                                }
                                echo '<tr>
                    <th scope="row">'.$related_users[$i]['id'].'</th>
                    <td>' .$related_users[$i]['username'].'</td>
                    <td>' .$is_uni_member.'</td>
                    <td>' .$related_users[$i]['email'].'</td>
                    <td>' .$related_users[$i]['tel'].'</td>';
                            }
                            ?>
                            </tr>
                            </tbody>
                        </table>

                <p class="normal_th">Facility: </p>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i=0; $i<count($related_facilities); $i++){

                                echo "<tr>
                    <th scope='row'>".$related_facilities[$i]['id']."</th>
                    <td>" .$related_facilities[$i]['name']."</td>
                    <td> <a href='navFacilityDetails.php?fid=".$related_facilities[$i]['id']."'><button class='btn btn-primary'  >View</button></a></td>";
                            }
                            ?>
                            </tr>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>
