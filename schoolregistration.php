<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "School Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "school";
?>

<?php require("navbar.php");?>
<div id="container">
    <form class="registrationForms" name="schoolRegistration">
        <label for="schoolName">School Name:</label>
        <input type="text" value="Enter school name" id="schoolName" name="schoolName"/><br>
        <label for="FName">First Name:</label>
        <input type="text" value="First name" id="FName" name="FName"/><br>
        <label for="LName">Last Name:</label>
        <input type="text" value="Last name" id="LName" name="LName"/><br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="707-111-2222" id="phoneNumber" name="phoneNumber"/><br>
        <label for="email">Email:</label>
        <input type="text" value="email@hostname.com" id="email" name="email"/><br>
    </form>
</div>

</body>
</html>