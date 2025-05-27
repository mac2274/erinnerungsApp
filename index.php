<?php
require_once 'config/config.db.php';
require_once 'config/lib.php';
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/design.css" type="text/css">

</head>

<body>
    <h1>Erinnerungs-Helper</h1>

    <p>
        Benötigst du im Alltag auch manchmal eine kleiner Unterstützung. Der Alltag ist immer so voller Termine,
        Aufgaben und ToDis!!</p>
    <p>
        Da verliert man schnell den Überblick im ganzen Hustle! und wenn du da gerne eine Hilfestellung möchtest, dann
        sind wir genau die richtige Stelle!
    </p>
    <p> 
        Wir helfen dir, dich an alle wichtigen Dinge zu denken!
    </p>



</body>

</html>

<?php

if (isset($_POST['reg_submit'])){
    require 'pages/mk_value.php';
}else {
    require 'pages/register.php';
}

?>