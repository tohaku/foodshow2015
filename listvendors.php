<?php
$pageTitle = "School Registration";
$pageHeader = "Gold Star Norcal Food Show 2016";
$section = "listSchools";
?>
<?php require("navbar.php");?>
<div style="background-color: #fff;">
    <?php
    echo "<table style='margin: 0 auto;'>";
    try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbResults = $conn->prepare("SELECT vendorName, FName, LName, phoneNumber, email FROM vendorRegistration ORDER BY vendorName ASC");
        $dbResults->execute();

        $row=$dbResults->fetchAll();
        foreach($row as $results){
            echo "<tr><td style='padding: 4px;'>".$results["vendorName"]."</td><td style='padding: 4px;'>".$results["FName"]."</td><td style='padding: 4px;'>".$results["LName"]."</td><td style='padding: 4px;'>".$results["phoneNumber"]."</td><td style='padding: 4px;'>".$results["email"]."</td>";
        }
    }
    catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
    $conn = null;
    echo "</table>";
    ?>
</div>
</body>
</html>