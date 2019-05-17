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
$statement = $pdo->query("SELECT id, facility.name FROM facility;");
$row = $statement->fetchAll(PDO::FETCH_ASSOC);
//print_r(isset($_GET['adminFacilitiesEditSelectId']));
if(isset($_GET["adminFacilitiesEditSelectId"])) {
$edit = $pdo->query("SELECT * FROM facility WHERE facility.id = '".$_GET['adminFacilitiesEditSelectId']."';");
$edit_row = $edit->fetch(PDO::FETCH_ASSOC);}
//print_r($edit_row);

//check if the input name has exist
$check_edit_stmt = $pdo->query("SELECT * FROM facility WHERE facility.name='".$_POST['adminFacilitiesEditName']."';");
$check_edit = $check_edit_stmt->fetchAll(PDO::FETCH_ASSOC);
if($check_edit[0]['name']){
    echo "<script>
            alert('The name has exist!');
        </script>";
}
?>

<div class="span9">
    <h1>Edit Facilities</h1>

    <!-- Functions to alert if a value is null -->
    <script>
        function adminFacilitiesEditSelect(){
            if(document.getElementById("adminFacilitiesEditSelectId").value==""){
                alert("Please select a facility.");
                return false;
            }
        }
    </script>

    <!-- Select a facility -->
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get" id="adminFacilitiesEditSelect">
            <p>
                <label for="adminFacilitiesEditSelectId">Please select a facility for editing: </label>
                <select name="adminFacilitiesEditSelectId" id="adminFacilitiesEditSelectId"/>
                <option value="">-- Please select --</option>
                <?php foreach($row as $element){
                    echo "<option value='".$element['id']."'>".$element['name']."</option>";
                }
                ?>
                </select>
            </p>
            <div class = "button">
                <input type="submit" onclick="return adminFacilitiesEditSelect();" value="Submit" />
            </div>
        </form>

<?php
if(isset($_GET["adminFacilitiesEditSelectId"])) {
    ?>

    <!-- Functions to alert if a value is not acceptable -->
    <script>
        function adminFacilitiesEdit(){
            if(document.getElementById("adminFacilitiesEditName").value==""){
                alert("Please enter Facility Name.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesEditDescription").value==""){
                alert("Please enter Facility Description.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesEditPrice").value==""){
                alert("Please enter Facility Price.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesEditPrice").value<0){
                alert("The price can not be negative.");
            }
            else if(document.getElementById("adminFacilitiesEditCapacity").value==""){
                alert("Please enter Facility Capacity.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesEditCapacity").value<0){
                alert("The capacity can not be negative.");
            }
            else if(document.getElementById("adminFacilitiesEditEmail").value==""){
                alert("Please enter Facility Contact Email.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesEditTel").value==""){
                alert("Please enter Facility Contact Tel.");
                return false;
            }
            else if(document.getElementById("adminFacilitiesEditAddress").value==""){
                alert("Please enter Facility Contact Address.");
                return false;
            }
        }
    </script>

    <!-- Edit a facility -->
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesEdit">
            <p>Please input the information for editing a facility:</p>
            <p>
                <label for="adminFacilitiesEditName">Facility Name: </label>
                <input type="text" name="adminFacilitiesEditName" id="adminFacilitiesEditName"
                       value="<?php echo $edit_row['name']; ?>"/>
				<input type="hidden" name="adminFacilitiesEditId" id="adminFacilitiesEditId"
                       value="<?php echo $edit_row['id']; ?> " />
            </p>

            <p>
                <label for="adminFacilitiesEditDescription">Facility Description: </label>
                <textarea name="adminFacilitiesEditDescription" id="adminFacilitiesEditDescription" rows="10">
                       <?php echo $edit_row['description']; ?></textarea>
            </p>

            <p>
                <label for="adminFacilitiesEditPrice">Facility Price: </label>
                <input type="number" name="adminFacilitiesEditPrice" id="adminFacilitiesEditPrice"
                       value="<?php echo $edit_row['price']; ?>"/>
            </p>

            <p>
                <label for="adminFacilitiesEditCapacity">Facility Capacity: </label>
                <input type="number" name="adminFacilitiesEditCapacity" id="adminFacilitiesEditCapacity"
                       value="<?php echo $edit_row['capacity']; ?>"/>
            </p>

            <p>
                <label for="adminFacilitiesEditEmail">Facility Contact Email: </label>
                <input type="text" name="adminFacilitiesEditEmail" id="adminFacilitiesEditEmail"
                       value="<?php echo $edit_row['contact_email']; ?>"/>
            </p>

            <p>
                <label for="adminFacilitiesEditTel">Facility Contact Tel: </label>
                <input type="text" name="adminFacilitiesEditTel" id="adminFacilitiesEditTel"
                       value="<?php echo $edit_row['contact_tel']; ?>"/>
            </p>

            <p>
                <label for="adminFacilitiesEditAddress">Facility Contact Address: </label>
                <textarea name="adminFacilitiesEditAddress" id="adminFacilitiesEditAddress" rows="5">
                       <?php echo $edit_row['contact_address']; ?></textarea>
            </p>

            <p>
                <label for="adminFacilitiesEditPic">Choose file</label>
                <input type="file" name="adminFacilitiesEditPic" id="adminFacilitiesEditPic"
                       value="<?php echo $edit_row['pic']; ?>"/>
            </p>

            <p>
                <label for="adminFacilitiesEditPic2">Choose file 2</label>
                <input type="file" name="adminFacilitiesEditPic2" id="adminFacilitiesEditPic2"
                       value="<?php echo $edit_row['pic2']; ?>"/>
            </p>

            <div class="button">
                <input type="submit" onclick="return adminFacilitiesEdit();" value="Submit"/>

            </div>
        </form>
</div>
<?php
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_FILES["adminFacilitiesEditPic"]["name"])){
        $fileName = $_FILES["adminFacilitiesEditPic"]["name"];
        $explodedFileName = explode(".", $fileName);
        $newFileName = $explodedFileName[0].date("YmdHis").".".$explodedFileName[1];
        $fileStorePath = "image/".$newFileName;
        move_uploaded_file($_FILES["adminFacilitiesEditPic"]["tmp_name"], $fileStorePath);
        //echo $newFileName;
    }else{
        $newFileName = null;
    }
    if(!empty($_FILES["adminFacilitiesEditPic2"]["name"])){
        $fileName2 = $_FILES["adminFacilitiesEditPic2"]["name"];
        $explodedFileName2 = explode(".", $fileName2);
        $newFileName2 = $explodedFileName2[0].date("YmdHis").".".$explodedFileName2[1];
        $fileStorePath2 = "image/".$newFileName2;
        move_uploaded_file($_FILES["adminFacilitiesEditPic2"]["tmp_name2"], $fileStorePath2);
        //echo $newFileName2;
    }else{
        $newFileName2 = null;
    }

$sql = 'UPDATE Xdqrs89_SE2_DUS.facility SET
facility.name="'.$_POST['adminFacilitiesEditName'].'", 
facility.description="'.$_POST['adminFacilitiesEditDescription'].'", 
facility.price="'.$_POST['adminFacilitiesEditPrice'].'", 
facility.capacity="'.$_POST['adminFacilitiesEditCapacity'].'", 
facility.contact_email="'.$_POST['adminFacilitiesEditEmail'].'", 
facility.contact_tel="'.$_POST['adminFacilitiesEditTel'].'", 
facility.contact_address ="'.$_POST['adminFacilitiesEditAddress'].'", 
facility.pic ="'.$newFileName.'", 
facility.pic_2 ="'.$newFileName2.'" 
WHERE facility.id = "'.$_POST['adminFacilitiesEditId'].'";';
$result = $pdo->exec($sql);
if($result){
    echo "<script>
            alert('success!');
            window.location = 'facilities.php';
</script>";}
else{
	echo "<script>
            alert('fail!');
            window.location = 'facilities.php';
</script>";}
}
include "footer.php";
?>