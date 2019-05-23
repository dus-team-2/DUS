<?php
include "header.php";
include "header2.php";
include "side.php";
// require "dbconfig.php";

?>

<div class="individual_content">
    <div class="individual_second_layer">
        <div class="span9">
            <h2>Forgot Password</h2>
        </div>




        <div class="span9">
            <form id="form1" name="form1" method="post" action="navLoginQuestion.php">
                <div class="form-row">
                    <label for="C_name">Your username</label>
                    <input id="C_name" class="form-control" name="C_name" type="text" />
                </div>

                <div class="form-row">
                    <label for="C_email">Your registered email</label>
                    <input id="C_email" class="form-control" name="C_email" type="text" />
                </div>

                <!-- <label>您的電話號碼：</label>
                <input id="C_tel" name="C_tel" type="text" />

                <label>意見：</label>
                <textarea id="C_message" name="C_message"></textarea> -->

                <!-- <div>
                <input id="submit" name="submit" type="submit" value="Submit" />
                </div> -->
                <br>
                <div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="navLoginUser.php" class="btn btn-primary">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>




<?php include "footer.php";?>

