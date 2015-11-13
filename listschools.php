<!DOCTYPE html>
<html>
<head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/12/2015
 * Time: 1:44 PM
 * List all registered schools in the database
 */
include("inc/config.php");

$dbconn = mysql_connect($dbhost,$dbuser,$dbpass);

if (!dbconn){
    die("Couldn't connect to the database". mysql_error());
}

$sql = "SELECT schoolName, FName, LName, phoneNumber, email";
mysql_select_db('foodshow2015');
$retval = mysql_query($sql,$dbconn);

if(!retval){
    die("Sadly it didn't not connect to the database: ". mysql_error());
}
echo "<table>";
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC))){
        echo"<tr>".
            "<td>{$row[`schoolName`]}</td>".
            "<td>{$row[`FName`]}</td>".
            "<td>{$row[`LName`]}</td>".
            "<td>{$row[`phoneNumber`]}</td>".
            "<td>{$row[`email`]}</td>".
            "</tr>";
    }
echo "</table>";

mysql_close($dbconn);
?>
</body>
</html>
