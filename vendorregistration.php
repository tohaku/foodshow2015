
<?php
    $pageTitle = "Vendor Registration";
    $pageHeader = "Goldstar Norcal Food Show 2016";
    $section = "vendor";
    $totalBooths = "69";
?>

<?php require("navbar.php");?>
<div id="container">
    <h3>Vendor Registration</h3>
    <form class="registrationForms" name="vendorRegistration">
        <label for="vendorName">Vendor Name:</label>
        <input type="text" value="Enter vendor name" id="vendorName" name="vendorName"/><br>
        <label for="FName">First Name:</label>
        <input type="text" value="First name" id="FName" name="FName"/><br>
        <label for="LName">Last Name:</label>
        <input type="text" value="Last name" id="LName" name="LName"/><br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" value="707-111-2222" id="phoneNumber" name="phoneNumber"/><br>
        <label for="email">Email:</label>
        <input type="text" value="example@hostname.com" id="email" name="email"/><br>

        <!-- for booth numbers, show selected booth numbers in text box but box is un-selectable
            select booth numbers from picture, on click add to array, clear and append to value
        -->
        <label for="boothNumbers">Booths:</label>
        <input type="text" value="Select booths in the map below" id="boothNumbers" name="boothNumbers"/><br>
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

<script>
    function registerBooth(boothID){
        boothsArray.push(boothID);
        alert(boothsArray);
       // document.getElementById('boothNumbers').value = boothsArray;
    }
</script>

</body>
</html>
