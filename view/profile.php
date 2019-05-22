<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-10
 * Time: 15:15
 */

require_once ('../controller/profile.php');
?>


<div class="individual_content">
    <div id="modify_btn_container">
        <button id="modify_profile" class="btn btn-primary" onclick="window.location.href='../DUSgroup2/navUpdateProfile.php'">Modify</button>
    </div>
    <div>
        <div id="show_pic">
            <img src="<?php echo $current_user_all['pic'] ?>" id="profile_pic" onerror="this.src='../view/image/black.png'">
        </div>
        <div id="show_profile_info">
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">User id :</th>
                    <td><?php echo $current_user_all['id'] ?></td>
                    <th scope="row">Username :</th>
                    <td><?php echo $current_user_all['username'] ?></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <th scope="row">Email :</th>
                    <td><?php echo $current_user_all['email'] ?></td>
                    <th scope="row">Gender :</th>
                    <td><?php echo $current_user_all['gender'] ?></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <th scope="row">Uni member :</th>
                    <td><?php  if($current_user_all['is_uni_member']){
                        echo "Yes";
                        }else{
                        echo "No";
                        } ?></td>
                    <th scope="row">Date of birth :</th>
                    <td><?php echo $current_user_all['date_of_birth'] ?></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <th scope="row">Tel :</th>
                    <td><?php echo $current_user_all['tel'] ?></td>

                </tr>
                <tr>
                    <th scope="row">Address :</th>
                    <td><?php echo $current_user_all['address'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

