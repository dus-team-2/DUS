<?php
//get session id and check login condition by session id
//$sid = $_GET['sid'];

//require login check
//require_once ('');
require_once ('../controller/private_booking_list.php');
//login_check($sid);
//$user_email = $_SESSION['user'];
//$ismanager = is_manager($user_email);

?>


<div class="individual_content">
    <div class="individual_second_layer">
        <div>
            <button type="button" class="btn btn-primary" onclick="window.location.href='#'" style="background-color: #742e68; border: white">Change to calendar view</button>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DATE</th>
                    <th scope="col">TIME</th>
                    <th scope="col">FACILITY</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for($i=0; $i<count($private_booking_set); $i++){
                    echo '<tr>
                    <th scope="row">'.$private_booking_set[$i][0]['id'].'</th>
                    <td>' .$private_booking_set[$i][1].'</td>
                    <td>' .$private_booking_set[$i][2].'</td>
                    <td>' .$private_booking_set[$i][3].'</td>';
                }
                ?>
                </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
