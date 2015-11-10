<!DOCTYPE html>
<html lang="en">
<?php
$pageTitle = "School Registration";
$pageHeader = "Goldstar Norcal Food Show 2016";
?>

<?php require("navbar.php");?>

<div id="container">
    <p>Solano County Fairgrounds can be found at :<br> <span id="address">900 Fairgrounds Drive<br>Vallejo CA. 94589</span></p>
    <p>You can enter your starting address below to map your way to the event</p>
    <form action="http://maps.google.com/maps" method="get" target="_blank">
        <input type="text" name="saddr" onClick="SelectAll('gMapsText')" value="Enter Starting Address" id="gMapsText"/>
        <input type="hidden" name="daddr" value="900 Fairgrounds Drive Vallejo CA 94589"/>
        <input type="submit" value="Map It"/>
    </form>
</div>


</body>
</html>
