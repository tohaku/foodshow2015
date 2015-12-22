<?php require("navbar.php");?>

<?php
$totalBooths = 93;
$galifrey = [];
//loading DB values into array on page load
//saves amount of DB connections with not being called by function
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbBoothResults = $conn->prepare("SELECT booths FROM registeredBooths");
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
?>


<div id="floorMap">
    <div class="floormapText"><p>Kitchen and Restrooms</p></div>
    <?php
    $counter = 1;
    while ($counter<=$totalBooths){
        $timeLords = "booth".$counter;
        if($counter<18) {
            if($counter == 1){echo "<div id='boothRow1'>";}
            if(in_array($timeLords,$galifrey2)){
                echo "<div class='boothReserved' id='booth" . $counter . "'>X</div>";
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
        elseif($counter<69){
            if($counter == 52){
                echo "</div><div id='boothRow4'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        elseif($counter<88){
            if($counter == 69){
                echo "</div><div id='boothRow5'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        elseif($counter == 88){
            echo "</div><div id='boothRow6'>";
            echo "<div class='booth' id='booth88'>Registration</div>";
        }
        else{
            echo "<div class='booth' id='booth" . ($counter + 1) . "' onclick='registerBooth(this.id)'>" . ($counter +1). "</div>";
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