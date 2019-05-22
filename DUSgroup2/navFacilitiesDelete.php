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
<div class="individual_content">
    <div class="individual_second_layer">
        <div class="span9">
            <h2>Delete Facilities</h2>
        </div>

        <!-- Functions to alert if a value is null -->
        <script>
            function adminFacilitiesDelete(){
                if($("#adminFacilitiesDeleteId").val()==""){
                    alert("Please select a facility.");
                }else{
                    var r=confirm("Are you sure to delete this facility?")
                    if(r==false){
                        return false;
                    }else{

                    }
                }
            }
        </script>

        <!-- Select a facility -->
        <div class = "span9">
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" id="adminFacilitiesDelete">
                <div class="form-row">
                    <label for="adminFacilitiesDeleteId"><p class="explain"> *Please select a facility for deleting: </p></label>
                    <select class="form-control" name="adminFacilitiesDeleteId" id="adminFacilitiesDeleteId"/>
                    <option value="">-- Please select --</option>
                    <?php foreach($row as $element){
                        echo "<option value='".$element['id']."'>".$element['name']."</option>";
                    }
                    ?>
                    </select>
                </div>
                <br>
                <div class = "button">
                    <input type="submit" class="btn btn-primary" onclick="return adminFacilitiesDelete();" value="Submit" />
                </div>
            </form>
        </div>

    </div>
</div>


<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "DELETE FROM Xdqrs89_SE2_DUS.facility WHERE facility.id = '".$_POST['adminFacilitiesDeleteId']."'";
    $pdo->exec($sql);

    echo "<script>
            alert('Success!');
            window.location = 'facilities.php';
        </script>";
}
include "footer.php";
?>