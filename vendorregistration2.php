<?php
$pageTitle = "Vendor Registration";
$pageHeader = "Goldstar Norcal Food Show 2016";
$section = "vendor";
require("navbar.php");
?>

<?php
$totalBooths = "82";
$galifrey = [];//array to store all booth DB results


$vendorName = "";
$FName = "";
$LName = "";
$phoneNumber = "";
$email = "";
//booths= blank, issue remembering booths, better to be blank and disable accidental form submission when no booths
$boothNumbers = "";
//errors for required fields or validation
$formError = false;
$vendorNameError = "";
$FNameError = "";
$LNameError = "";
$phoneNumberError = "";
$emailError = "";
$boothError = "";

//$dbconn = mysql_connect($dbhost, $dbuser, $dbpass);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //need to check if required fields are empty and display error
    if(empty($_POST["vendorName"])){
        $vendorNameError = "*";
        $vendorName ="Enter vendor name";
        $formError = true;
    }else {
        $vendorName = testInput($_POST["vendorName"]);
    }

    if(empty($_POST["FName"])){
        $FNameError = "*";
        $FName = "Enter first name";
        $formError = true;
    }else {
        $FName = testInput($_POST["FName"]);
    }

    if(empty($_POST["LName"])){
        $LNameError = "*";
        $LName = "Enter last name";
        $formError = true;
    }else {
        $LName = testInput($_POST["LName"]);
    }

    if(empty($_POST["email"])) {
        $emailError = "*";
        $email ="Please enter email";
        $formError = true;
    }else{
        $email=$_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $emailError = "*";
            $email ="invalid email entered";
            $formError = true;
        }else{
            $email = testInput($_POST["email"]);
        }
    }

    if(empty($_POST["boothNumbers"])){
        $boothError = "*";
        $boothNumbers = "Please select booths below";
        $formError = true;
    }else{
        $boothNumbers = testInput($_POST["boothNumbers"]);
    }

    if(empty($_POST["phoneNumber"])){
        $phoneNumberError = "*";
        $phoneNumber = "Please enter phone #";
        $formError = true;
    }else{
        $phoneNumber = testInput($_POST["phoneNumber"]);
    }
    //post the information if there's no problems
    if(!$formError){
        try {
            $dbconn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO vendorRegistration" .
                "(vendorName,FName,LName,phoneNumber,email,boothNumbers)" .
                "VALUES('$vendorName','$FName','$LName','$phoneNumber','$email','$boothNumbers')";
            $sql2 = "INSERT INTO registeredBooths2" .
                "(booths)" .
                "VALUES('$boothNumbers')";

            if($dbconn->exec($sql)){
                if($dbconn->exec($sql2)){
                    $dbconn=null;
                    header('Location: submitted.php');
                    exit();
                }
            }

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }
}
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbBoothResults = $conn->prepare("SELECT booths FROM registeredBooths2");
    $dbBoothResults->execute();

    $row=$dbBoothResults->fetchAll();
    foreach($row as $results){
        $tempArray = explode(",", $results["booths"]);
        $galifrey = array_merge($galifrey, $tempArray);
    }
}
catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}
$conn = null;

//SQL injection prevention, normalize data
function testInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'","",$data);
    return $data;
}
?>

<div id="container">
    <h3>Vendor Registration</h3>
    <?php
    if(new DateTime() < new DateTime("2015-12-18 16:00:00")){
        echo "<p>Early bird registration rates are still available</p>";
    }
    ?>
    <p>Please address all checks to Gold Star Foods NorCal at<br> 5100 Fulton Dr Fairfield, CA 94534<br>All checks are due by 1/08/2015 at the latest.</p>
    <form method="post" action="<?php $_PHP_SELF ?>" class="registrationForms" name="vendorRegistration" accept-charset="utf-8">
        <?php if($formError){echo "<p class='formError'>Error: Please recheck your information</p>";}?>
        <label for="vendorName">Vendor Name:</label>
        <input type="text" value="<?php echo $vendorName;?>" id="vendorName" class="<?php if($vendorNameError==='*'){echo 'formError';}?>" name="vendorName"/><span class="formError"><?php echo $vendorNameError;?></span><br>
        <label for="FName">First Name:</label>
        <input type="text" value="<?php echo $FName;?>" id="FName" class="<?php if($FNameError==='*'){echo 'formError';}?>" name="FName"/><span class="formError"><?php echo $FNameError;?></span><br>
        <label for="LName">Last Name:</label>
        <input type="text" value="<?php echo $LName;?>" id="LName" class="<?php if($LNameError==='*'){echo 'formError';}?>" name="LName"/><span class="formError"><?php echo $LNameError;?></span><br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="<?php echo $phoneNumber;?>" id="phoneNumber" class="<?php if($phoneNumberError==='*'){echo 'formError';}?>" name="phoneNumber"/><span class="formError"><?php echo $phoneNumberError;?></span><br>
        <label for="email">Email:</label>
        <input type="text" value="<?php echo $email;?>" id="email" class="<?php if($emailError==='*'){echo 'formError';}?>" name="email"/><span class="formError"><?php echo $emailError;?></span><br>
        <label for="boothNumbers">Booths:</label>
        <input type="text" value="<?php echo $boothNumbers;?>" id="boothNumbers" class="<?php if($boothError==='*'){echo 'formError';}?>" name="boothNumbers" readonly="readonly"/><span class="formError"><?php echo $boothError;?></span><br>
        <input type="submit" value="Register"/>
    </form>
</div>

<div id="floorMap">
    <div class="floormapText"><p>Kitchen and Restrooms</p></div>
    <?php
    $counter = 1;
    while ($counter<=$totalBooths){
        $timeLords = "booth".$counter;
        if($counter<17) {
            if($counter == 1){echo "<div id='boothRow1'>";}
            if(in_array($timeLords,$galifrey)){
                echo "<div class='boothReserved' id='booth" . $counter . "'>X</div>";
            }
            else {
                echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
            }
        }
        elseif($counter<33){
            if($counter == 17) {
                echo "</div><div id='boothRow2'>";
            }
            if(in_array($timeLords,$galifrey)){
                echo "<div class='boothReserved' id='booth" . $counter . "'>X</div>";
            }else {
                echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
            }
        }
        elseif($counter<49){
            if($counter == 33){
                echo "</div><div id='boothRow3'>";
            }
            if(in_array($timeLords,$galifrey)){
                echo "<div class='boothReserved' id='booth" . $counter . "'>X</div>";
            }else{
                echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
            }
        }
        elseif($counter<65){
            if($counter == 49){
                echo "</div><div id='boothRow4'>";
            }
            if(in_array($timeLords,$galifrey)){
                echo "<div class='boothReserved' id='booth" . $counter . "'>X</div>";
            }else{
                echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
            }
        }
        else {
            if($counter == 65){
                echo "</div><div id='boothRow5'>";
            }
            if(in_array($timeLords,$galifrey)){
                echo "<div class='boothReserved' id='booth" . $counter . "'>X</div>";
            }else {
                echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
            }
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
