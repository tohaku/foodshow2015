<?php
    $pageTitle = "Food Show 2015";
    $pageHeader = "Gold Star Norcal Food Show 2016";
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
        <span id="address">Courtyard Marriott Vallejo<br>
        1000 Fairgrounds Drive Vallejo CA, 94589<br>
        (707)644-1200 / (800)321-2211</span><br>
        Rooms have been put on hold until January 10th to lock in lower rates for event attendees.  We recommend calling the Marriott to make reservations instead of reserving rooms online to ensure you get the lower rates.  Let them know it's for the Gold Star Foods food show.<br>
        <a href="http://www.marriott.com/hotels/travel/sfovl-courtyard-vallejo-napa-valley" target="_blank">Marriott Hotel Vallejo</a><br>
    </p>
    <h2>Vendor Registration</h2>
    <ul>
        <li>$500 per booth</li>
        <li>Each booth comes with
            <ul>
                <li>Two 8' tables w/ covers</li>
                <li>Two chairs</li>
                <li>Electricity via spider boxes
                    <ul>
                        <li>Must provide your own cables</li>
                    </ul>
                </li>
                <li>Kitchen facilities</li>
                <li>Garbage cans placed around the hall</li>
            </ul>
        </li>
        <li>Vendors may share booths
            <ul>
                <li>2 vendors max per booth</li>
                <li>$300 each, $600 total</li>
            </ul>
        </li>
        <li>Early bird special
            <ul>
                <li>Eligible if paid by 12/18/2015</li>
                <li>$450 per booth</li>
                <li>$550 total for shared booths</li>
            </ul>
        </li>
        <li>All checks must be received by 1/08/2015</li>
        <li>Please address all checks to Gold Star Foods Norcal<br>5100 Fulton Dr Fairfield, CA 94534</li>
    </ul>

    <h2>Currently registered vendors with more to come</h2>
    <?php
    try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $registeredVendors = $conn->prepare("SELECT vendorName FROM vendorRegistration ORDER BY vendorName ASC");
        $registeredVendors->execute();

        $row=$registeredVendors->fetchAll();
        echo "<ul>";
        foreach($row as $results){
            echo "<li>".$results["vendorName"]."</li>";
        }
        echo "</ul>";
    }
    catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
    $conn = null;

    ?>
</div>
</body>



</html>
