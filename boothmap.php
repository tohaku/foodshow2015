<!DOCTYPE html>
<head>
    <script>
        function registerBooth(){
            alert("A booth has been clicked");
            alert($(this).attr("id"));
        }
    </script>
</head>
<body>

<?php
    $totalBooths = 69;
?>

<?php require("navbar.php");?>

<div id="floorMap">
    <div class="floormapText"><p>Kitchen and Restrooms</p></div>
<?php
$counter = 1;
while ($counter<=$totalBooths){
    if($counter<18) {
        if($counter == 1){echo "<div id='boothRow1'>";}
        echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth()'>" . $counter . "</div>";
    }
    elseif($counter<35){
        if($counter == 18) {
            echo "</div><div id='boothRow2'>";
        }
        echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth()'>" . $counter . "</div>";
    }
    elseif($counter<52){
        if($counter == 35){
            echo "</div><div id='boothRow3'>";
        }
        echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth()'>" . $counter . "</div>";
    }
    else {
        if($counter == 52){
            echo "</div><div id='boothRow4'>";
        }
        echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth()'>" . $counter . "</div>";
        if($counter == $totalBooths){
            echo "</div>";
        }
    }
    $counter++;
}
?>
    <div class="floormapText"><p>Entrance</p></div>
</div>
</body>