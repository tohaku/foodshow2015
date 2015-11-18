<?php require("navbar.php");?>

<?php
    $totalBooths = 69;
    //loading DB values into array on page load
    //saves amount of DB connections with not being called by function
    $galifrey = [];//array to store all DB results
    $dbconn = mysql_connect($dbhost, $dbuser, $dbpass);
    if (!dbconn) {
        die("Couldn't connect to the database" . mysql_error());
    }
    $sql = "SELECT booths FROM registeredBooths";
    mysql_select_db('foodshow2015');
    $retval = mysql_query($sql, $dbconn);

    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
        $tempArray=explode(",",$row["booths"]);
        print_r($tempArray);

    }
    mysql_close($dbconn);

    function reservedBoothCheck($boothNumber)
    {

        /*i don't need to put into JS at all, I can just use PHP with the existing PHP that creates the map.
        *create a php function that can be called in the create map below, if it returns false give it a different
        *ID that can be styled differently.
         * Then on the JS that add the booth to the array / form field, do a check on the id and if it's a no no
         * don't add.
        */

        return false;
    }
?>


<div id="floorMap">
    <div class="floormapText"><p>Kitchen and Restrooms</p></div>
<?php
$counter = 1;
while ($counter<=$totalBooths){
    $timeLords = "booth".$counter;
    if($counter<18) {
        if($counter == 1){echo "<div id='boothRow1'>";}
            if(reservedBoothCheck($timeLords)){
                echo "<div class='boothReserved' id='booth" . $counter . ">" . $counter . "</div>";
            }
        else {
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
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