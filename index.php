<?php
require_once 'config.db.php';
require_once 'lib.php';
?>

<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="design.css" type="text/css">

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

    <h3>Registiere dich jetzt hier!</h3>

    <?php require_once 'register.php'; ?>

</body>

</html>

<?php

if (empty($_GET['id'])){
    require 'mk_erin.php';
    require 'query.php';
}
?>