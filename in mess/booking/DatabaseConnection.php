<?php
error_reporting(0);
$host='localhost';//server name
$user='root';//username
$password='';//password
$database='DUS';//databasename
$conn=@mysql_connect($host,$user,$password) or die('Database connection failed!');
@mysql_select_db($database) or die('No database found!');
mysql_query("set names 'UTF-8'");
function getoption($ntable,$nzd)
{
    $sql="select ".$nzd." from ".$ntable."order by id_sec";
    $query=mysql_query($sql);
    $rowscount=mysql_num_rows($query);
    if($rowscount>0)
    {
        for ($fi=0;$fi<$rowscount;$fi++)
        {
            ?>
            <option value="<?php echo mysql_result($query,$fi,0);?>"><?php echo mysql_result($query,$fi,0);?></option>
            <?php
        }
    }
}
?>
