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

    <!-- Delete a facility -->
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
                <textarea name="adminFacilitiesEditDescription" id="adminFacilitiesEditDescription" rows="10"
                       ><?php echo $edit_row['description']; ?></textarea>
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
                <textarea name="adminFacilitiesEditAddress" id="adminFacilitiesEditAddress" rows="5"
                       ><?php echo $edit_row['contact_address']; ?></textarea>
            </p>

            <div class="button">
                <input type="submit" onclick="return adminFacilitiesEdit();" value="Submit"/>
            </div>
        </form>
</div>
<?php
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
$sql = 'UPDATE Xdqrs89_SE2_DUS.facility SET
facility.name="'.$_POST['adminFacilitiesEditName'].'", facility.description="'.$_POST['adminFacilitiesEditDescription'].'", facility.price="'.$_POST['adminFacilitiesEditPrice'].'", facility.capacity="'.$_POST['adminFacilitiesEditCapacity'].'", facility.contact_email="'.$_POST['adminFacilitiesEditEmail'].'", facility.contact_tel="'.$_POST['adminFacilitiesEditTel'].'", facility.contact_address ="'.$_POST['adminFacilitiesEditAddress'].'" WHERE facility.id = "'.$_POST['adminFacilitiesEditId'].'";';
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