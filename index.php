<?php

require_once 'config/config.db.php';
require_once 'config/lib.php';
// ----> Datenbank organisieren
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
        Wir helfen dir, an alle wichtigen Dinge zu denken!
    </p>
</body>

</html>

<?php


// if (empty($_GET['id'])) {
//     require 'pages/register.php';
// } else {
//     echo 'help';
//     require 'config/prepared.php';
// }

if (empty($_POST['reg_submit'])) {
    require 'pages/register.php';
    echo 'hallo1';

} else if (!empty($_POST['reg_submit'])) {
    setcookie("register", "registered");
    echo 'hello Hanoi!';
    //echo $_COOKIE['register'];

    require 'pages/mk_value.php';
    echo 'hello2';

    echo '<h3>Erinnerung:</h3>';
    require 'config/query.php';

    if (!empty($_POST['mk_submit'])){
        echo 'Du hast eine neue Erinnerung hinzugefügt!';
        // das wird nicht mehr erreicht, also hackt es kurz vorher!
        // und man kann auch keine Links auswählen, denn dann kommt ma wieder zur REgistrierung.....
    }
} else {
    echo 'config/prepared.php';
}


?>