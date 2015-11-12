<!DOCTYPE html>
<html lang="en">
<?php
    $pageTitle = "School Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "school";
?>

<?php require("navbar.php");?>

<?php
    $schoolName = "";
    $FName = "";
    $LName = "";
    $phoneNumber = "";
    $email = "";
    //errors for required fields or validation
    $formError = "";
    $schoolNameError = "";
    $FNameError = "";
    $LNameError = "";
    $phoneNumberError = "";
    $emailError = "";


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["schoolName"])){
            $schoolNameError = "*";
        }else {
            $schoolName = testInput($_POST["schoolName"]);
        }

        if(empty($_POST["FName"])){
            $FNameError = "*";
        }else {
            $FName = testInput($_POST["FName"]);
        }

        if(empty($_POST["LName"])){
            $LNameError = "*";
        }else {
            $LName = testInput($_POST["LName"]);
        }

        //combined not empty and email verification
        if(!empty($_POST["email"])){
            $email = testInput($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                //filter_var returns false if not an email, returns email string if an email
                $emailError = "*";
            }else{

            }
        }else{
            $emailError = "*";
        }

        $phoneNumber = testInput($_POST["phoneNumber"]);
    }

    //SQL injection prevention, normalize data
    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<div id="container">
    <form method="post" action="<?php $_PHP_SELF ?>" class="registrationForms" name="schoolRegistration">
        <?php if($schoolNameError||$FNameError||$LNameError||$emailError == "*"){echo "<p class='formError'>Error: Please recheck your information</p>";}?>
        <label for="schoolName">School Name:</label>
        <input type="text" value="Enter school name" id="schoolName" class="<?php if($schoolNameError="*"){echo "formError";}?>" name="schoolName"/><span class="formError"><?php echo $schoolNameError;?></span><br>
        <label for="FName">First Name:</label>
        <input type="text" value="First name" id="FName" class="<?php if($FNameError="*"){echo "formError";}?>" name="FName"/><span class="formError"><?php echo $FNameError;?></span><br>
        <label for="LName">Last Name:</label>
        <input type="text" value="Last name" id="LName" class="<?php if($LNameError="*"){echo "formError";}?>" name="LName"/><span class="formError"><?php echo $LNameError;?></span><br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="707-111-2222" id="phoneNumber" name="phoneNumber"/><br>
        <label for="email">Email:</label>
        <input type="text" value="email@hostname.com" id="email" class="<?php if($emailError="*"){echo "formError";}?>" name="email"/><span class="formError"><?php echo $emailError;?></span><br>
        <input type="submit" value="Register"/>
    </form>
</div>

<?php
    //testing that php values were posted and received by webpage
    echo $schoolName . "<br>" . $FName . "<br>" . $LName . "<br>" . $phoneNumber . "<br>" . $email;
?>
</body>
</html>