<?php
    $pageTitle = "Food Show 2015";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "info";
?>

<?php require("navbar.php");?>

<div id="container">
    <h2>Details</h2>
    <p>The event will be held at the Solano County Fairgrounds on October 25th.<br>
        The event starts at 10:30am and runs until 2:00pm.<br>
        Vendors may come in as early as 6:30am to setup before the event starts.<br>
        <br>
        Hotel arrangements can be made at:<br>
        <span id="address">Courtyard Marriot Vallejo<br>
        1000 Fairgrounds Drive Vallejo CA, 94589<br>
        (707)644-1200 / 1(800)321-2211</span><br>
        Use the links below to register online and get discounted rates!<br>
        <a href="#" target="_blank">$109 per night for 1 king bed</a><br>
        <a href="#" target="_blank">$119 per night for 2 queen beds</a>
    </p>
    <h2>Registered Processors with more to come</h2>
    <?php
    $dbconn = mysql_connect($dbhost,$dbuser,$dbpass);

    if (!dbconn){
        die("Couldn't connect to the database". mysql_error());
    }
    $sql = "SELECT vendorName FROM registeredVendors";
    mysql_select_db('foodshow2015');
    $retval = mysql_query($sql,$dbconn);

    if(!retval){
        die("Sadly it didn't not connect to the database: ". mysql_error());
    }
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
        echo "<p>".$row["vendorName"]."</p><br>";
    }
    mysql_close($dbconn);
    ?>
</div>
</body>



</html>
