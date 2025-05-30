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

 
if (!empty($_POST['reg_submit'])) {
    setcookie("register", "registered", 0, "/");
    //echo 'eins';
    //echo $_COOKIE['register'];

    if(isset($_COOKIE['register'])){
        //echo 'zwei';

        require 'pages/mk_value.php';
        require 'config/query.php';

        if(isset($_GET['id'])){
            echo 'drei';
            if(isset($_POST['mk_submit'])){
                echo 'vier';
                require 'config/prepared.php';
            }
        }
    }
 
} else if (!empty($_POST['li_submit'])){
    require 'pages/login.php';
} else {
    require 'pages/register.php';
}

?>