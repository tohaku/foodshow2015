<?php require_once("inc/config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href="main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="jsfunctions.js"></script>
    <script>
        var boothsArray = ["placeHolder"];
        $(document).ready(function(){
            $("input[type='text']").on("click", function () {
                $(this).select();
            });
        });
        function registerBooth(boothID){
            var daleks = duplicatedCheck(boothID , boothsArray);
            if(daleks){
                if(daleks===0){boothsArray.shift()}
                //elseif(daleks===boothsArray.length-1){boothsArray.pop()}
                else{
                    boothsArray.splice(daleks, 1);
                }
                document.getElementById(boothID).style.backgroundColor = '#fff';
            }
            else{
                boothsArray.push(boothID);
                document.getElementById(boothID).style.backgroundColor = '#84FFFF';
            }
            //issue with first value in array being duplicated and not removed
            //using workaround to ignore 0 index in boothsArray
            var tempProblemSolver = boothsArray.splice(1,1);
            document.getElementById('boothNumbers').value = tempProblemSolver.join(" ");
        }

    </script>
</head>
<body>
<div class = "header" style="background-color:<?php if($section=='school'){echo '#4CAF50';}elseif($section=='vendor'){echo '#B388FF';}elseif($section=='directions'){echo '#FF5722';}?>;">
    <span id="pageTitle"><a href="index.php"><img src="pics/gsfLogo.png"><?php echo $pageHeader; ?></img></a></span>
    <ul class="nav">
        <li class="<?php if ($section=="info"){echo"selectedPage";}?>"><a href="index.php">Information</a></li>
        <li class="<?php if ($section=="school"){echo"selectedPage";}?>"><a href="schoolregistration.php">School Registration</a></li>
        <li class="<?php if ($section=="vendor"){echo"selectedPage";}?>"><a href="vendorregistration.php">Vendor Registration</a></li>
        <li class="<?php if ($section=="directions"){echo"selectedPage";}?>"><a href="directions.php">Directions</a></li>
    </ul>
</div>
