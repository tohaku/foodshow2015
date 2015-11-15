<?php require("navbar.php");?>
<?php
$dbconn = mysql_connect($dbhost,$dbuser,$dbpass);

if (!dbconn){
    die("Couldn't connect to the database". mysql_error());
}

$sql = "SELECT schoolName, FName, LName, phoneNumber, email FROM registeredSchools";
mysql_select_db('foodshow2015');
$retval = mysql_query($sql,$dbconn);

if(!retval){
    die("Sadly it didn't not connect to the database: ". mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
    echo $row["schoolName"]." ".$row["FName"]." ".$row["LName"];
}

mysql_close($dbconn);

?>
</body>
</html>
