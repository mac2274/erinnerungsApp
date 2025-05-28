<?php
setcookie("register", "registered");

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

 
if (!empty($_POST['reg_submit'])) {
    //echo '<p class="h_2">Du bist bereits registriert ;)</p>';
    require 'pages/mk_value.php';
    // dann fülle das formular aus
    if(empty($_GET['id'])){
        //wenn GET-Array-Wert noch nicht existiert, dann:
        require 'config/query.php'; //die query.php gibt die Liste an Erinnerungen aus der db wieder
    } else{
        //andernfalls gebe die Werte (Liste) aus
        require 'config/prepared.php';
    }
} else{
    require 'pages/register.php';
}

?>