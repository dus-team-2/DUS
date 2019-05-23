<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-09
 * Time: 17:02
 */

require_once ('../controller/update_profile.php');
?>


<div class="individual_content">
    <div class="individual_second_layer">
        <form action="../controller/submit.php" method="post" enctype="multipart/form-data" id="update_info_form">
            <input type="hidden" name="user_id" value="<?php echo $current_user_id ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">User ID</label>
                    <input class="form-control" type="text" placeholder="<?php echo $current_user_id ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email</label>
                    <input class="form-control" type="text" placeholder="<?php echo $current_user_all['email'] ?>" readonly>
                </div>
            </div>
            <!--image upload plugin-->
            <div class="form-group">
                <label for="profile_pic">Profile picture</label>
                <section class="logo-license">
                    <div class="half">
                        <a class="logo" id="logox">
                            <img id="bgl" src="<?php echo $current_user_all['pic']?>" onerror="this.src='../view/image/black.png'" >
                        </a>
                    </div>
                    <div class="clear"></div>
                </section>
                <br><br>
                <p class="explain">*Click on the image to choose your picture</p>
                <article class="jq22-container">
                    <div id="clipArea">
                        <div id="lei" >

                        </div>
                    </div>
                    <div class="foot-use"  >
                        <div id="uploader1_btn_container" class="uploader1 blue">
                            <input type="button" id="btn_open_file" name="file" class="button" value="open">
                            <input id="file" type="file" name="update_pic" accept="image/*"   />
                        </div>
                        <input type="button" id="clipBtn" class="button" value="confirm">
                    </div>
                    <div id="view"></div>
                </article>
            </div>

            <script src="../view/js/iscroll-zoom.js"></script>
            <script src="../view/js/hammer.js"></script>
            <script src="../view/js/jquery.photoClip.js"></script>
            <script>
                var obUrl = ''
                $("#clipArea").photoClip({
                    width: 300,
                    height: 300,
                    file: "#file",
                    view: "#view",
                    ok: "#clipBtn",
                    loadStart: function() {
                        console.log("loading");
                    },
                    loadComplete: function() {
                        console.log("complete");
                    },
                    clipFinish: function(dataURL) {
                        console.log(dataURL);//path
                    }
                });
            </script>
            <script>
                $(function(){
                    $("#logox").click(function(){
                        $(".jq22-container").show();
                    })
                    $("#clipBtn").click(function(){
                        $("#logox").empty();
                        $('#logox').append('<img src="' + imgsource + '" align="absmiddle" style=" width: 5rem;height: 5rem;">');
                        $(".jq22-container").hide();
                    })
                });
            </script>

            <!--div class="form-group">
                <label for="pic">select your new profile picture</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="update_pic">
            </div-->
            <div class="form-group">
                <label for="inputAddress">Username</label>
                <input type="text" class="form-control" name="update_username" value="<?php echo $current_user_all['username'] ?>">
            </div>
            <div class="form-row">


                <div class="form-group col-md-6">
                    <p class="notice"><br><br><br></p>
                    <label for="exampleFormControlSelect1">Gender</label>

                    <select class="form-control" id="exampleFormControlSelect1" name="update_gender" >

                        <option value="Male"<?php if(strcmp($current_user_all['gender'], 'Male')){
                            echo "selected = 'selected'";
                        } ?>>Male</option>
                        <option value="Female" <?php if(strcmp($current_user_all['gender'], 'Female')){
                            echo "selected = 'selected'";
                        } ?>>Female</option>
                        <option value="Other" <?php if(strcmp($current_user_all['gender'], 'Other')){
                            echo "selected = 'selected'";
                        } ?>>Other</option>
                        <option value="Better not to say" <?php if(strcmp($current_user_all['gender'], 'Better not to say')){
                            echo "selected = 'selected'";
                        } ?>>Better not to say</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Are you a member of Durham University?<p class="notice">*Please note that: 1.you can get a student discount if you are a uni member; 2.You need to show your campus card to the reception when using the facilities</p></label>
                    <select class="form-control" id="exampleFormControlSelect1" name="update_is_uni_member">
                        <option value="1" <?php if($current_user_all['is_uni_member'] == 1){
                            echo "selected = 'selected'";
                        } ?>>Yes</option>
                        <option value="0" <?php if($current_user_all['is_uni_member'] == 0){
                            echo "selected = 'selected'";
                        } ?>>No</option>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <p class="explain"><br></p>
                        <label for="date_of_birth">Date of Birth</label>
                        <input class="form-control" type="date" name="update_date_of_birth" value="<?php echo $current_user_all['date_of_birth'] ?>">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="tel">Tel</label>
                    <p class="explain">*format example: 07419999999</p>
                    <input class="form-control" type="text" name="update_tel" id="update_tel" value="<?php echo $current_user_all['tel'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address </label>
                <input type="text" class="form-control" name="update_address" value="<?php echo $current_user_all['address'] ?>">
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <button type="submit" id="btn_upload_profile" class="btn btn-primary" onclick="return update_form_check();" value="Confirm">Confirm</button>

        </form>
    </div>
</div>
