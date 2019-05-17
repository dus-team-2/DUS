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

//check if the input name has exist
$check_add_stmt = $pdo->query("SELECT * FROM facility WHERE facility.name='".$_POST['adminFacilitiesAddName']."';");
$check_add = $check_add_stmt->fetchAll(PDO::FETCH_ASSOC);
if($check_add[0]['name']){
    echo "<script>
            alert('The name has exist!');
        </script>";
}
?>

<div class="span9">
    <h1>Add Facilities</h1>
</div>

    <!-- Functions to alert if a value is not acceptable -->
    <script>
        function adminFacilitiesAdd(){
            if(document.getElementById("adminFacilitiesAddName").value==""){
                alert("Please enter Facility Name.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesAddDescription").value==""){
                alert("Please enter Facility Description.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesAddPrice").value==""){
                alert("Please enter Facility Price.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesAddPrice").value<0){
                alert("The price can not be negative.");
            }
            else if(document.getElementById("adminFacilitiesAddCapacity").value==""){
                alert("Please enter Facility Capacity.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesAddCapacity").value<0){
                alert("The capacity can not be negative.");
            }
            else if(document.getElementById("adminFacilitiesAddEmail").value==""){
                alert("Please enter Facility Contact Email.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesAddTel").value==""){
                alert("Please enter Facility Contact Tel.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesAddAddress").value==""){
                alert("Please enter Facility Contact Address.");
                return false;
            }
        }
    </script>

    <!-- Add a facility -->
    <div class = "span9">
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesAdd">
            <p>Please input the information for adding a facility:</p>

            <p>
                <label for="adminFacilitiesAddName">Facility Name: </label>
                <input type="text" name="adminFacilitiesAddName" id="adminFacilitiesAddName" />
            </p>

            <p>
                <label for="adminFacilitiesAddDescription">Facility Description: </label>
                <input type="text" name="adminFacilitiesAddDescription" id="adminFacilitiesAddDescription" />
            </p>

            <p>
                <label for="adminFacilitiesAddPrice">Facility Price: </label>
                <input type="number" name="adminFacilitiesAddPrice" id="adminFacilitiesAddPrice" />
            </p>

            <p>
                <label for="adminFacilitiesAddCapacity">Facility Capacity: </label>
                <input type="number" name="adminFacilitiesAddCapacity" id="adminFacilitiesAddCapacity" />
            </p>

            <p>
                <label for="adminFacilitiesAddEmail">Facility Contact Email: </label>
                <input type="text" name="adminFacilitiesAddEmail" id="adminFacilitiesAddEmail" />
            </p>

            <p>
                <label for="adminFacilitiesAddTel">Facility Contact Tel: </label>
                <input type="text" name="adminFacilitiesAddTel" id="adminFacilitiesAddTel" />
            </p>

            <p>
                <label for="adminFacilitiesAddAddress">Facility Contact Address: </label>
                <input type="text" name="adminFacilitiesAddAddress" id="adminFacilitiesAddAddress" />
            </p>

            <p>
                <label for="adminFacilitiesAddPic">Choose file</label>
                <input type="file" name="adminFacilitiesAddPic" id="adminFacilitiesAddPic" />
            </p>

            <p>
                <label for="adminFacilitiesAddPic2">Choose file 2</label>
                <input type="file" name="adminFacilitiesAddPic2" id="adminFacilitiesAddPic2" />
            </p>

            <div class = "button">
                <input type="submit" onclick="return adminFacilitiesAdd();" value="Submit" />
            </div>
        </form>
    </div>

    <script>
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
    if(!empty($_FILES["adminFacilitiesAddPic"]["name"])){
        $fileName = $_FILES["adminFacilitiesAddPic"]["name"];
        $explodedFileName = explode(".", $fileName);
        $newFileName = $explodedFileName[0].date("YmdHis").".".$explodedFileName[1];
        $fileStorePath = "image/".$newFileName;
        move_uploaded_file($_FILES["adminFacilitiesAddPic"]["tmp_name"], $fileStorePath);
        //echo $newFileName;
    }else{
        $newFileName = null;
    }
    if(!empty($_FILES["adminFacilitiesAddPic2"]["name"])){
        $fileName2 = $_FILES["adminFacilitiesAddPic2"]["name"];
        $explodedFileName2 = explode(".", $fileName2);
        $newFileName2 = $explodedFileName2[0].date("YmdHis").".".$explodedFileName2[1];
        $fileStorePath2 = "image/".$newFileName2;
        move_uploaded_file($_FILES["adminFacilitiesAddPic2"]["tmp_name2"], $fileStorePath2);
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
}
include "footer.php";
?>