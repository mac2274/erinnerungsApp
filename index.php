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
    echo 'hallo1';
    require 'pages/register.php';
} else if (!empty($_POST['reg_submit'])) {
    echo 'hello2';


    require 'pages/mk_value.php';

    // if (!empty($_POST['frm_reg_name']) && !empty($_POST['frm_reg_email']) && !empty($_POST['frm_reg_pwd'])) { 
    // }
}


?>