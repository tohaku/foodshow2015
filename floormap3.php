<?php require("navbar.php");?>
<!--
<head>
<style>
    #floorMap {
        width: 820px; /*added one more booth width*/
        min-height: 455px; /*added addition row height*/
        margin: 40px auto 10px;
        padding: 2px;
        background-color: #fff;
        border: inset 2px #000;
    }
    #boothRow1{
        margin-top: 35px;
        margin-left: 35px;
    }

    #boothRow2 {
        margin-left: 35px;
    }

    #boothRow3 {
        margin-top: 35px;
        margin-left: 35px;
    }

    #boothRow4 {
        margin-left: 35px;
    }
    #boothRow5 {
        margin-top: 35px;
    }

    .booth {
        display: inline-block;
        width: 35px;
        height: 35px;
        border: 1px solid #000;
        text-align: center;
        font-size: 18px;
        padding: 2px;
    }

    .boothReserved {
        display: inline-block;
        width: 35px;
        height: 35px;
        border: 1px solid #000;
        text-align: center;
        font-size: 18px;
        padding: 2px;
        background-color: #F00000;
    }
    #booth40, #booth56, #booth42, #booth58 {
        margin-left: 35px;
    }
    #booth9, #booth25, #booth74 {
        margin-left: 70px;
    }
</style>
    </head>
<body>
-->
<?php
$totalBooths = 82;
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
        if($counter<17) {
            if($counter == 1){echo "<div id='boothRow1'>";}
            if(in_array($timeLords,$galifrey2)){
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
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        elseif($counter<49){
            if($counter == 33){
                echo "</div><div id='boothRow3'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        elseif($counter<65){
            if($counter == 49){
                echo "</div><div id='boothRow4'>";
            }
            echo "<div class='booth' id='booth" . $counter . "' onclick='registerBooth(this.id)'>" . $counter . "</div>";
        }
        else {
            if($counter == 65){
                echo "</div><div id='boothRow5'>";
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