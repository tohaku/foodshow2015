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
    <ul>
        <li>$500 per booth</li>
        <li>Vendors may share booths
            <ul>
                <li>2 vendors max per booth</li>
                <li>$300 each, $600 total for the booth</li>
            </ul>
        </li>
        <li>Early bird special
            <ul>
                <li>We need to receive payment by 12/18/2015</li>
                <li>$450 Per Booth</li>
                <li>$550 total for shared booths</li>
            </ul>
        </li>
        <li>All checks must be received by 1/08/2015</li>
        <li>Please address all checks to Goldstar Foods Norcal<br>5100 Fulton Dr Fairfield, CA 94534</li>
    </ul>

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
