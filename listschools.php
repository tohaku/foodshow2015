<?php require("navbar.php");?>
<div style="background-color: #fff;">
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
echo "<table id='schoolListTable'>".
    "<tr><th>School Name</th><th>First Name</th><th>Last name</th><th>Phone #</th><th>Email</th></tr>";
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
    echo "<tr>";
    echo "<td>".$row["schoolName"]."</td><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["phoneNumber"]."</td><td>".$row["email"]."</td>";
    echo "</tr>";
}

mysql_close($dbconn);
echo "</table>";
?>
</div>
</body>
</html>
