<?php
    $pageTitle = "Food Show 2015";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "info";
?>

<?php require("navbar.php");?>

<div id="container">
    <h2>Details</h2>
    <p>The event will be held at the Solano County Fairgrounds on February 11th.<br>
        The event starts at 10:30am and runs until 2:00pm.<br>
        Vendors may come in as early as 6:30am to setup before the event starts.<br>
        <br>
        Hotel arrangements can be made at:<br>
        <span id="address">Courtyard Marriot Vallejo<br>
        1000 Fairgrounds Drive Vallejo CA, 94589<br>
        (707)644-1200 / 1(800)321-2211</span><br>
        Use the link below to register online and get a discounted rate!<br>
        <a href="http://www.marriott.com/hotels/travel/sfovl-courtyard-vallejo-napa-valley/?toDate=02/13/15&groupCode=EJFEJFA&stop_mobi=yes&fromDate=02/10/15&app=resvlink" target="_blank">$119 per night for 1 king bed or 2 queen beds</a><br>
    </p>
    <h2>Vendor Registration</h2>
    <p>
        Vendors who register early and we receive payment by 12/18/2015 are eligible for the early bird special.  Booths will cost $500 per booth or $450 if paid for before 12/18/2015.  Vendors may also share booths (2 vendors per booth max) for $300 each, $600 total or $550 total before 12/18/2015.  All checks must be received by 1/08/2015.  Please address all checks to Goldstar Foods NorCal at 5100 Fulton Dr. Fairfield, CA 94534 to ensure that we receive your payment on time.
    </p>
    <h2>Currently registered processors with more to come</h2>
    <?php
    $dbconn = mysql_connect($dbhost,$dbuser,$dbpass);

    if (!dbconn){
        die("Couldn't connect to the database". mysql_error());
    }
    $sql = "SELECT vendorName FROM vendorRegistration ORDER BY vendorName ASC";
    mysql_select_db('foodshow2015');
    $retval = mysql_query($sql,$dbconn);

    if(!retval){
        die("Sadly it didn't not connect to the database: ". mysql_error());
    }
    echo "<ul>";
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
        echo "<li>".$row["vendorName"]."</li>";
    }
    mysql_close($dbconn);
    echo "</ul>";
    ?>
</div>
</body>



</html>
