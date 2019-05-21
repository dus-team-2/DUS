<?php
include "header.php";
include "header2.php";
include "side.php";

require "dbconfig.php";


$sql = "SELECT id, name FROM facility";
$statement = $pdo -> prepare($sql);
$statement -> execute();
$data = $statement -> fetchall();

unset($statement);
unset($pdo);

// print_r($data);
// echo $data[0]["name"];
?>

<div class="span9">
    <h1>Other Facilities</h1>
</div>

<div class="span9">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Facility</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($data as $row):?>
            <tr>
                
                <td><?php echo $row["id"]?></td>
                <td>
                    <a href="navFacilityDetails.php?fid=<?php echo $row["id"]?>" class="right">
                    <?php echo $row["name"]?>
                    </a>
                </td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table> 
</div>

         




<?php include "footer.php";?>