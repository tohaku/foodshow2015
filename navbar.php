<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href="main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $("input['type=text']").on("click", function(){
            $(this).select();
        });
    </script>
</head>
<body>
<div class = "header">
    <span id="pageTitle"><a href="index.php"><?php echo $pageHeader; ?></a></span>
    <ul class="nav">
        <li class="<?php if ($section=="school"){echo"selectedPage";}?>"><a href="schoolregistration.php">School Registration</a></li>
        <li class="<?php if ($section=="vendor"){echo"selectedPage";}?>"><a href="vendorregistration.php">Vendor Registration</a></li>
        <li class="<?php if ($section=="directions"){echo"selectedPage";}?>"><a href="directions.php">Directions</a></li>
    </ul>
</div>