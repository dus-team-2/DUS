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
//print_r($row);
?>

<div class="span9">
    <h1>Delete Facilities</h1>
</div>

    <!-- Functions to alert if a value is null -->
    <script>
        function adminFacilitiesDelete(){
            if($("#adminFacilitiesDeleteId").val()==""){
                alert("Please select a facility.");
            }else{
				//alert('success selected');
			}
        }
    </script>

    <!-- Select a facility -->
    <div class = "span9">
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesDelete">
            <p>
                <label for="adminFacilitiesDeleteId">Please select a facility for deleting: </label>
                <select name="adminFacilitiesDeleteId" id="adminFacilitiesDeleteId"/>
                <option value="">-- Please select --</option>
                <?php foreach($row as $element){
                    echo "<option value='".$element['id']."'>".$element['name']."</option>";
                }
                ?>
                </select>
            </p>
            <div class = "button">
                <input type="submit" onclick="return adminFacilitiesDelete();" value="Submit" />
            </div>
        </form>
    </div>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "DELETE FROM Xdqrs89_SE2_DUS.facility WHERE facility.id = '".$_POST['adminFacilitiesDeleteId']."'";
    $pdo->exec($sql);

    echo "<script>
            alert('success!');
            window.location = 'facilities.php';
        </script>";
}
include "footer.php";
?>