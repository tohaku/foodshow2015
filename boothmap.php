<!DOCTYPE html>
<head>

</head>
<body>

<?php
    $totalBooths = 69;
?>

<?php require("navbar.php");?>

<div id="floorMap">
    <div><p>Kitchen and Restrooms</p></div>
<?php
$counter = 1;
while ($counter<=$totalBooths){
    if($counter<18) {
        if($counter == 1){echo "<div id='boothRow1'>";}
        echo "<div class='booth' id='booth" . $counter . "'>" . $counter . "</div>";
    }
    elseif($counter<35){
        if($counter == 18) {
            echo "</div><div id='boothRow2'>";
        }
        echo "<div class='booth' id='booth" . $counter . "'>" . $counter . "</div>";
    }
    elseif($counter<52){
        if($counter == 35){
            echo "</div><div id='boothRow3'>";
        }
        echo "<div class='booth' id='booth" . $counter . "'>" . $counter . "</div>";
    }
    else {
        if($counter == 52){
            echo "</div><div id='boothRow4'>";
        }
        echo "<div class='booth' id='booth" . $counter . "'>" . $counter . "</div>";
        if($counter == $totalBooths){
            echo "</div>";
        }
    }
    $counter++;
}
?>
    <div><p>Entrance</p></div>
</div>
</body>