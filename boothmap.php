<!DOCTYPE html>
<head>

</head>
<body>
<?php
    $totalBooths = 69;
?>

<div id="floorMap">
<?php
$counter = 1;
while ($counter<=$totalBooths){
    if($counter<17) {
        if($counter == 1){echo "<div id='boothRow1'>";}
        echo "<div class='booth' id='" . $counter . "'>" . $counter . "</div>";
    }
    elseif($counter<34){
        if($counter == 17) {
            echo "</div><div id='boothRow2'>";
        }
        echo "<div class='booth' id='" . $counter . "'>" . $counter . "</div>";
    }
    elseif($counter<51){
        if($counter == 34){
            echo "</div><div id='boothRow3'>";
        }
        echo "<div class='booth' id='" . $counter . "'>" . $counter . "</div>";
    }
    else {
        if($counter == 51){
            echo "</div><div id='boothRow4'>";
        }
        echo "<div class='booth' id='" . $counter . "'>" . $counter . "</div>";
        if($counter == $totalBooths){
            echo "</div>";
        }
    }
    $counter++;
}
?>
</div>
</body>