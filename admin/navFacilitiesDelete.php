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
?>

<div class="span9">
    <h1>Delete Facilities</h1>
</div>

    <!-- Functions to alert if a value is null -->
    <script>
        function adminFacilitiesDelete(){
            if(document.getElementById("adminFacilitiesDeleteName").value==""){
                alert("Please select a facility.");
                return false;
            }
        }
    </script>

    <!-- Delete a facility -->
    <div class = "span9">
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesDelete">
            <p>
                <label for="adminFacilitiesDeleteName">Please select a facility for deleting: </label>
                <select name="adminFacilitiesDeleteName" id="adminFacilitiesDeleteName"/>
                <option value="">-- Please select --</option>
                <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                </select>
            </p>
            <div class = "button">
                <input type="submit" onclick="return adminFacilitiesDelete();" value="Submit" />
            </div>
        </form>
    </div>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "DELETE FROM Xdqrs89_SE2_DUS.facility WHERE facility.name = '".$_POST['adminFacilitiesDeleteName']."'";
    $pdo->exec($sql);

    echo "<script>
            alert('success!');
            window.location = 'facilities.php';
        </script>";
}
include "footer.php";
?>