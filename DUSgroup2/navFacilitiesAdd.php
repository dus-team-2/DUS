<?php
include "header.php";
include "header2.php";
include "side.php";
//session_start();
if($_SESSION["loginStatus"] != 1){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
require "dbconfig.php";

if(isset($_GET["adminFacilitiesAddName"])) {
//check if the input name has exist
    $check_add_stmt = $pdo->query("SELECT * FROM facility WHERE facility.name='" . $_POST['adminFacilitiesAddName'] . "';");
    $check_add = $check_add_stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($check_add[0]['name']) {
        echo "<script>
            alert('The name has exist!');
        </script>";
    }
}
?>
<div class="individual_content">
    <div class="individual_second_layer">
        <div class="span9">
            <h2>Add Facilities</h2>
        </div>

        <!-- Functions to alert if a value is not acceptable -->
        <script>
            function adminFacilitiesAdd(){
                if(document.getElementById("adminFacilitiesAddName").value==""||document.getElementById("adminFacilitiesAddName").value.match(/^\s+$/g)){
                    alert("Please enter Facility Name.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddDescription").value==""||document.getElementById("adminFacilitiesAddDescription").value.match(/^\s+$/g)){
                    alert("Please enter Facility Description.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddPrice").value==""||document.getElementById("adminFacilitiesAddPrice").value.match(/^\s+$/g)){
                    alert("Please enter Facility Price.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddPrice").value<0){
                    alert("The price can not be negative.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddCapacity").value==""||document.getElementById("adminFacilitiesAddCapacity").value.match(/^\s+$/g)){
                    alert("Please enter Facility Capacity.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddCapacity").value<0){
                    alert("The capacity can not be negative.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddEmail").value==""||document.getElementById("adminFacilitiesAddEmail").value.match(/^\s+$/g)){
                    alert("Please enter Facility Contact Email.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddTel").value==""||document.getElementById("adminFacilitiesAddTel").value.match(/^\s+$/g)){
                    alert("Please enter Facility Contact Tel.");
                    return false;
                }
                else if(document.getElementById("adminFacilitiesAddAddress").value==""||document.getElementById("adminFacilitiesAddAddress").value.match(/^\s+$/g)){
                    alert("Please enter Facility Contact Address.");
                    return false;
                }
            }
        </script>

        <!-- Add a facility -->
        <div class = "span9">
            <form  name = "Form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesAdd" enctype="multipart/form-data">
                <p class="explain">*Please input the information for adding a facility:</p>

                <div class="form-row">
                    <label for="adminFacilitiesAddName">Facility Name: </label>
                    <input type="text" class="form-control" name="adminFacilitiesAddName" id="adminFacilitiesAddName" />
                </div>

                <div class="form-row">
                    <label for="adminFacilitiesAddDescription">Facility Description: </label>
                    <!--input type="text" class="form-control" name="adminFacilitiesAddDescription" id="adminFacilitiesAddDescription" /-->
                    <textarea form="adminFacilitiesAdd"  class="form_textarea" rows="5" wrap="hard" name="adminFacilitiesAddDescription" id="adminFacilitiesAddDescription"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="adminFacilitiesAddPrice">Facility Price: </label>
                        <input type="number" class="form-control" name="adminFacilitiesAddPrice" id="adminFacilitiesAddPrice" min="0" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="adminFacilitiesAddCapacity">Facility Capacity: </label>
                        <input type="number" class="form-control" name="adminFacilitiesAddCapacity" id="adminFacilitiesAddCapacity" min="0" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="adminFacilitiesAddEmail">Facility Contact Email: </label>
                        <input type="text" class="form-control" name="adminFacilitiesAddEmail" id="adminFacilitiesAddEmail" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="adminFacilitiesAddTel">Facility Contact Tel: </label>
                        <input type="text" class="form-control" name="adminFacilitiesAddTel" id="adminFacilitiesAddTel" />
                    </div>
                </div>


                <div class="form-row">
                    <label for="adminFacilitiesAddAddress">Facility Contact Address: </label>
                    <input type="text" class="form-control" name="adminFacilitiesAddAddress" id="adminFacilitiesAddAddress" />
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="adminFacilitiesAddPic">Choose picture</label>
                        <input type="file" class="form-control" name="adminFacilitiesAddPic" id="adminFacilitiesAddPic" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="adminFacilitiesAddPic2">Choose picture 2</label>
                        <input type="file" class="form-control" name="adminFacilitiesAddPic2" id="adminFacilitiesAddPic2" />
                    </div>
                </div>
                <div class = "form-row">
                    <input type="submit" class="btn btn-primary" onclick="return adminFacilitiesAdd();" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>

    <script>
        //show file name
        var imageFile;
        $("input[name=adminFacilitiesAddPic]").change(function(e){
            imageFile = e.target.files[0];
            $(".adminFacilitiesAddPic").html(imageFile.name);
        })

        var imageFile2;
        $("input[name=adminFacilitiesAddPic2]").change(function(e){
            imageFile2 = e.target.files[0];
            $(".adminFacilitiesAddPic2").html(imageFile2.name);
        })
    </script>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
	$tempEmail = $_POST['adminFacilitiesAddEmail'];
	$checkEmail="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
	if(!preg_match($checkEmail,$tempEmail)){	
				echo "<script>
            alert('Invalid email!');
            window.location = 'navFacilitiesAdd.php';
        </script>";
		
            }else{
    if(!empty($_FILES["adminFacilitiesAddPic"]["name"])){
        $fileName = $_FILES["adminFacilitiesAddPic"]["name"];
        //$explodedFileName = explode(".", $fileName);
        //$newFileName = $fileName[0].date("YmdHis").".".$explodedFileName[1];
		$newFileName = "image/".$fileName;
        $fileStorePath = $newFileName;
        move_uploaded_file($_FILES["adminFacilitiesAddPic"]["tmp_name"], $fileStorePath);
        //echo $newFileName;
    }else{
        $newFileName = null;
    }
    if(!empty($_FILES["adminFacilitiesAddPic2"]["name"])){
        $fileName2 = $_FILES["adminFacilitiesAddPic2"]["name"];
        //$explodedFileName2 = explode(".", $fileName2);
        //$newFileName2 = $explodedFileName2[0].date("YmdHis").".".$explodedFileName2[1];
        $newFileName2 = "image/".$fileName2;
        $fileStorePath2 = $newFileName2;
        move_uploaded_file($_FILES["adminFacilitiesAddPic2"]["tmp_name"], $fileStorePath2);
        //echo $newFileName2;
    }else{
        $newFileName2 = null;
    }

    $sql = "INSERT INTO Xdqrs89_SE2_DUS.facility (name, description, price, capacity, contact_email, contact_tel, contact_address, pic, pic_2) VALUES (
'".$_POST['adminFacilitiesAddName']."',
'".$_POST['adminFacilitiesAddDescription']."',
'".$_POST['adminFacilitiesAddPrice']."',
'".$_POST['adminFacilitiesAddCapacity']."',
'".$_POST['adminFacilitiesAddEmail']."',
'".$_POST['adminFacilitiesAddTel']."',
'".$_POST['adminFacilitiesAddAddress']."',
'".$newFileName."',
'".$newFileName2."'
);";
    $pdo->exec($sql);
    echo "<script>
            alert('success!');
            window.location = 'facilities.php';
        </script>";
}}
include "footer.php";
?>