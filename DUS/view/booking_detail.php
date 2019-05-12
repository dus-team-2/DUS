<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-12
 * Time: 14:54
 */
//insert the link to facility detail page
$current_user = 2;
require_once ('../controller/booking_detail.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script_joyce.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/css_joyce.css">
</head>
<body>
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
            </div>

            <h2>ID : <?php echo $current_booking['id'] ?></h2>
            <hr/>

            <div id="fixed_event_div" style="display: <?php if ($is_fixed){
                echo 'block';
            }else{
                echo  'none';
            }
            ?>">


                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">Title :</th>
                        <td><?php echo $current_booking['title'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Content :</th>
                        <td><?php echo $current_booking['content'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Date :</th>
                        <td><?php echo $time_detail[0]['date'] ?></td>
                        <th scope="row">Time :</th>
                        <td><?php echo $time_detail[0]['username'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Place/Facility: </th>
                        <td><?php echo $related_facilities[0]['name'] ?></td>
                        <td> <button class="btn btn-primary" onclick="window.location.href = '#';">View</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="individual_booking_div" style="display: <?php if ($is_fixed){
                echo 'none';
            }else{
                echo 'block';
            } ?>">
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">Date :</th>
                        <td><?php echo $time_detail[0]['date'] ?></td>
                        <th scope="row">Time :</th>
                        <td><?php
                            for ($i=0; $i<count($time_detail); $i++){
                                echo $time_detail[$i]['slot'].":00-".((int)($time_detail[$i]['slot'])+1).":00\n\n";
                            }
                            ?></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table">
                    <tbody>

                    <tr>
                        <th>Users :</th>
                    </tr>
                    <tr><td>
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
                        </td></tr>

                    <tr>
                        <th scope="row" style="color: #742e68; width: fit-content;">Facility: </th>
                    </tr>
                    <tr><td>
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
                                $facility_link = '#'.$related_facilities[$i]['id'];
                                echo "<tr>
                    <th scope='row'>".$related_facilities[$i]['id']."</th>
                    <td>" .$related_facilities[$i]['name']."</td>
                    <td> <button class='btn btn-primary' onclick='window.location.href = ". $facility_link .";'>View</button></td>";
                            }
                            ?>
                            </tr>
                            </tbody>
                        </table></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>