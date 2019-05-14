<?php
include "header.php";
include "side.php";
session_start();
if($_SESSION["loginStatus"] != 1){
    echo "<script>
            window.location = 'navLoginUser.php';
        </script>";
}
require "dbconfig.php";
$statement = $pdo->query("SELECT facility.name FROM facility;");
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

$edit = $pdo->query("SELECT * FROM facility WHERE facility.name = '".$_GET['adminFacilitiesEditSelectName']."'");
$edit_row = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="span9">
    <h1>Edit Facilities</h1>
</div>

    <!-- Functions to alert if a value is null -->
    <script>
        function adminFacilitiesEditSelect(){
            if(document.getElementById("adminFacilitiesEditSelectName").value==""){
                alert("Please select a facility.");
                return false;
            }
        }
    </script>

    <!-- Delete a facility -->
    <div class = "span9">
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get" id="adminFacilitiesEditSelect">
            <p>
                <label for="adminFacilitiesEditSelectName">Please select a facility for editing: </label>
                <select name="adminFacilitiesEditSelectName" id="adminFacilitiesEditSelectName"/>
                <option value="">-- Please select --</option>
                <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                </select>
            </p>
            <div class = "button">
                <input type="submit" onclick="return adminFacilitiesEditSelect();" value="Submit" />
            </div>
        </form>
    </div>

<?php
if($_SERVER["REQUEST_METHOD"] === "GET") {
    ?>
    <!-- Edit a facility -->
    <div class="span9">
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesEdit">
            <p>Please input the information for editing a facility:</p>
            <p>
                <label for="adminFacilitiesEditName">Facility Name: </label>
                <input type="text" name="adminFacilitiesEditName" id="adminFacilitiesEditName"
                       value="<?php echo $edit_row['name']; ?>"/>
            </p>

            <p>
                <label for="adminFacilitiesEditDescription">Facility Description: </label>
                <input type="text" name="adminFacilitiesEditDescription" id="adminFacilitiesEditDescription"
                       value="<?php echo $edit_row['description']; ?>"/>
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
                <input type="text" name="adminFacilitiesEditAddress" id="adminFacilitiesEditAddress"
                       value="<?php echo $edit_row['contact_address']; ?>"/>
            </p>

            <div class="button">
                <input type="submit" onclick="return adminFacilitiesEdit();" value="Submit"/>
            </div>
        </form>
    </div>
    <?php
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
$sql = "UPDATE Xdqrs89_SE2_DUS.facility SET
facility.name, facility.description, facility.price, facility.capacity, facility.contact_email, facility.contact_tel, facility.contact_address =
".$_POST['adminFacilitiesEditName'].",
".$_POST['adminFacilitiesEditDescription'].",
".$_POST['adminFacilitiesEditPrice'].",
".$_POST['adminFacilitiesEditCapacity'].",
".$_POST['adminFacilitiesEditEmail'].",
".$_POST['adminFacilitiesEditTel'].",
".$_POST['adminFacilitiesEditAddress']."
WHERE facility.name = '".$_GET['adminFacilitiesEditSelectName']."'";
$pdo->exec($sql);

    echo "<script>
            alert('success!');
            window.location = 'facilities.php';
          </script>";
}
include "footer.php";
?>