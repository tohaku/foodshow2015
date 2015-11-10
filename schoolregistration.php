<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "School Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
?>

<?php require("navbar.php");?>
<div id="container">
    <form name="schoolRegistration">
        <label for="schoolName">School Name:</label>
        <input type="text" value="Enter school name" id="schoolName" name="schoolName"/>
        <label for="FName">First Name:</label>
        <input type="text" value="First name" id="FName" name="FName"/>
        <label for="LName">Last Name:</label>
        <input type="text" value="Last name" id="LName" name="LName"/>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="707-111-2222" id="phoneNumber" name="phoneNumber"/>
        <label for="email">Email:</label>
        <input type="text" value="email@hostname.com" id="email" name="email"/>
    </form>
</div>

</body>
</html>