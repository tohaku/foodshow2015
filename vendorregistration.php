<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "Vendor Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
?>

<?php require("navbar.php");?>

    <form>
        <label for="vendorName">Vendor Name:</label>
        <input type="text" value="Enter vendor name" id="vendorName" name="vendorName"/>
        <label for="FName">First Name:</label>
        <input type="text" value="First name" id="FName" name="FName"/>
        <label for="LName">Last Name:</label>
        <input type="text" value="Last name" id="LName" name="LName"/>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="707-111-2222" id="phoneNumber" name="phoneNumber"/>
        <label for="email">Email:</label>
        <input type="text" value="example@hostname.com" id="email" name="email"/>

        <!-- for booth numbers, show selected booth numbers in text box but box is un-selectable
            select booth numbers from picture, on click add to array, clear and append to value
        -->
        <label for="boothNumbers">Booth Numbers:</label>
        <div id="boothNumbers">Append booth numbers here, ie 1,22,33</div>
    </form>

</body>
</html>
