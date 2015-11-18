<?php require("navbar.php");?>

<?php
    $totalBooths = 69;
    $dbconn = mysql_connect($dbhost,$dbuser,$dbpass);
    if (!dbconn){
        die("Couldn't connect to the database". mysql_error());
    }
    $sql = "SELECT booth FROM registeredBooths";
    mysql_select_db('foodshow2015');
    $retval = mysql_query($sql,$dbconn);
    $dServer = array();

    while($row = mysql_fetch_assoc($result)){
        $dServer[] = $row["booth"];
    }
?>
<script>
    function fillBooths(){
        var filledBooths=<?php echo json_encode($dServer);?>;
        console.log(filledBooths);
        for(i=0;i<filledBooths.length;i++){
            console.log(filledBooths[i]);
        }
    }
</script>

<input type="button" value="test script" onClick="fillBooths()"/>

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