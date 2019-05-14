<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-09
 * Time: 15:15


$pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
$statement = $pdo->query("SELECT * FROM booking WHERE id=1;");
$result = $statement->fetch(PDO::FETCH_ASSOC);
print_r($result);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="test2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="123">
    <button type="submit" value="submit">submit</button>
</form>
</body>
</html>