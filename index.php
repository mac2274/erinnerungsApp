<?php
    require_once 'config.db.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="design.css" type="text/css">

    </head>
    <body>
       <h1>Erinnerungs-Helper</h1>

       <?php require_once 'showAll_erin.php'; ?> 

       <?php 
       
        require_once 'register.php'; ?> 
            
       <?php require_once 'mk_erin.php'; ?>
    </body>
</html>

