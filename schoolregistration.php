<?php
    $pageTitle = "School Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "school";
?>

<?php require("navbar.php");?>

<?php
    $schoolName = "Enter school name";
    $FName = "First name";
    $LName = "Last name";
    $phoneNumber = "707-111-2222";
    $email = "email@hostname.com";
    //errors for required fields or validation
    $formError = false;
    $schoolNameError = "";
    $FNameError = "";
    $LNameError = "";
    $phoneNumberError = "";
    $emailError = "";


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //need to check if required fields are empty and display error
        if(empty($_POST["schoolName"])){
            $schoolNameError = "*";
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

        //need to add phone number verification function
        $phoneNumber = testInput($_POST["phoneNumber"]);

        //post the information if there's no problems
        if($FName!="panda") {
            if (!$formError) {
                $dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
                $sql = "INSERT INTO registeredSchools" .
                    "(schoolName,FName,LName,phoneNumber,email)" .
                    "VALUES('$schoolName','$FName','$LName','$phoneNumber','$email')";
                mysql_select_db('foodshow2015');
                $retval = mysql_query($sql, $dbconn);

                if (!$retval) {
                    die('Could not submit data: ' . mysql_error());
                }
                mysql_close($dbconn);

                //redirecting to thank you page
                header('Location: submitted.php');
                exit();
            }
        }
    }

    //SQL injection prevention, normalize data
    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<div id="container" <?php if($FName=="panda"){echo "style='background: url(http://theartmad.com/wp-content/uploads/2015/04/Forest-Clipart-7.png) no-repeat center bottom fixed;'";}?>>
    <h3>School Registration</h3>
    <!--need to not echo this form when form is submitted successfully, probly need to pass along success or not success-->
    <form method="post" action="<?php $_PHP_SELF ?>" class="registrationForms" name="schoolRegistration">
        <?php if($formError){echo "<p class='formError'>Error: Please recheck your information</p>";}?>
        <label for="schoolName">School Name:</label>
        <input type="text" value="<?php echo $schoolName;?>" id="schoolName" class="<?php if($schoolNameError=="*"){echo "formError";}?>" name="schoolName"/><span class="formError"><?php echo $schoolNameError;?></span><br>
        <label for="FName">First Name:</label>
        <input type="text" value="<?php echo $FName;?>" id="FName" class="<?php if($FNameError=="*"){echo "formError";}?>" name="FName"/><span class="formError"><?php echo $FNameError;?></span><br>
        <label for="LName">Last Name:</label>
        <input type="text" value="<?php echo $LName;?>" id="LName" class="<?php if($LNameError=="*"){echo "formError";}?>" name="LName"/><span class="formError"><?php echo $LNameError;?></span><br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="<?php echo $phoneNumber;?>" id="phoneNumber" name="phoneNumber"/><br>
        <label for="email">Email:</label>
        <input type="text" value="<?php echo $email;?>" id="email" class="<?php if($emailError=="*"){echo "formError";}?>" name="email"/><span class="formError"><?php echo $emailError;?></span><br>
        <input type="submit" value="Register"/>
    </form>
    <?php
        if($FName=="panda"){
            echo "<img src='http://orig03.deviantart.net/9e04/f/2013/305/3/c/placeholder_character_animation4_by_linzu-d6seolp.gif' style='height:80px;width:100px;float:right;clear: right;'>";
        }
    ?>
</div>

</body>
</html>