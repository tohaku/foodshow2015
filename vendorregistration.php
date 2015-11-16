
<?php
    $pageTitle = "Vendor Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "vendor";
    $totalBooths = "69";
?>

<?php require("navbar.php");?>

<?php
$vendorName = "Enter vendor name";
$FName = "First name";
$LName = "Last name";
$phoneNumber = "707-111-2222";
$email = "email@hostname.com";
$boothNumbers = "Select booths in the map below";
//errors for required fields or validation
$formError = false;
$vendorNameError = "";
$FNameError = "";
$LNameError = "";
$phoneNumberError = "";
$emailError = "";
$boothError = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //need to check if required fields are empty and display error
    if(empty($_POST["vendorName"])){
        $vendorNameError = "*";
        $formError = true;
    }else {
        $schoolName = testInput($_POST["schoolName"]);
    }

    if(empty($_POST["FName"])){
        $FNameError = "*";
        $formError = true;
    }else {
        $FName = testInput($_POST["FName"]);
    }

    if(empty($_POST["LName"])){
        $LNameError = "*";
        $formError = true;
    }else {
        $LName = testInput($_POST["LName"]);
    }

    //combined not empty and email verification
    if(empty($_POST["email"])) {
        $emailError = "*";
        $formError = true;
    }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $emailError = "*";
        $formError = true;
    }else{
        $email = testInput($_POST["email"]);
    }

    if(empty($_POST["boothNumbers"])){
        $boothError = "*";
        $formError = true;
    }else{
        $boothNumbers = $_Post["boothNumbers"];
    }

    if(empty($_POST["phoneNumber"])){
        $phoneNumberError = "*";
        $formError = true;
    }else{
        $phoneNumber = testInput($_POST["phoneNumber"]);
    }
    //post the information if there's no problems
    /*
    if(!$formError){
        $dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
        $sql = "INSERT INTO registeredSchools".
            "(schoolName,FName,LName,phoneNumber,email)".
            "VALUES('$schoolName','$FName','$LName','$phoneNumber','$email')";
        mysql_select_db('foodshow2015');
        $retval = mysql_query($sql, $dbconn);

        if(!$retval){
            die('Could not submit data: '.mysql_error());
        }
        mysql_close($dbconn);

        //redirecting to thank you page
        header('Location: submitted.php');
        exit();
    }*/
}

//SQL injection prevention, normalize data
function testInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php
    //testing
    foreach($_POST as $key => $entry){
        if (is_Array($entry)){
            foreach($entry as $value){
                echo $key." : ".$value."<br>";
            }
        }else{
            echo $key." : ".$entry."<br>";
        }
    }
echo ($_POST["boothNumbers"]);

?>
<div id="container">
    <h3>Vendor Registration</h3>
    <form method="post" action="<?php $_PHP_SELF ?>" class="registrationForms" name="vendorRegistration">
        <?php if($formError){echo "<p class='formError'>Error: Please recheck your information</p>";}?>
        <label for="vendorName">Vendor Name:</label>
        <input type="text" value="<?php echo $vendorName;?>" id="vendorName" class="<?php if($vendorNameError=="*"){echo "formError";}?>" name="vendorName"/><span class="formError"><?php echo $vendorNameError;?></span><br>
        <label for="FName">First Name:</label>
        <input type="text" value="<?php echo $FName;?>" id="FName" class="<?php if($FNameError=="*"){echo "formError";}?>" name="FName"/><span class="formError"><?php echo $FNameError;?></span><br>
        <label for="LName">Last Name:</label>
        <input type="text" value="<?php echo $LName;?>" id="LName" class="<?php if($LNameError=="*"){echo "formError";}?>" name="LName"/><span class="formError"><?php echo $LNameError;?></span><br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="<?php echo $phoneNumber;?>" id="phoneNumber" class="<?php if($phoneNumberError=="*"){echo "formError";}?>" name="phoneNumber"/><span class="formError"><?php echo $phoneNumberError;?></span><br>
        <label for="email">Email:</label>
        <input type="text" value="<?php echo $email;?>" id="email" class="<?php if($emailError=="*"){echo "formError";}?>" name="email"/><span class="formError"><?php echo $emailError;?></span><br>
        <label for="boothNumbers">Booths:</label>
        <input type="text" value="<?php echo $boothNumbers;?>" id="boothNumbers" class="<?php if($boothError=="*"){echo "formError";}?>" name="boothNumbers"/><span class="formError"><?php echo $boothError;?></span><br>
        <input type="submit" value="Register"/>
    </form>
</div>

<div id="floorMap">
    <div class="floormapText"><p>Kitchen and Restrooms</p></div>
    <?php
    $counter = 1;
    while ($counter<=$totalBooths){
        if($counter<18) {
            if($counter == 1){echo "<div id='boothRow1'>";}
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        elseif($counter<35){
            if($counter == 18) {
                echo "</div><div id='boothRow2'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        elseif($counter<52){
            if($counter == 35){
                echo "</div><div id='boothRow3'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        else {
            if($counter == 52){
                echo "</div><div id='boothRow4'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
            if($counter == $totalBooths){
                echo "</div>";
            }
        }
        $counter++;
    }
    ?>
    <div class="floormapText"><p>Entrance</p></div>
    <p>Select the booths you would like to register. Booths that are red have already been registered and can't be selected.</p>
</div>

</body>
</html>
