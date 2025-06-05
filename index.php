<?php

require_once 'config/config.db.php';
require_once 'config/lib.php';
require_once 'config/lib_user.php';
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

if (isset($_POST['reg_submit'])) {
    user_function($_POST['reg_name'], $_POST['reg_email'],$_POST['reg_pwd']);
    //setcookie("register", "registered");
}

if (isset($_POST['mk_submit'])){

}

if (!isset($_POST['reg_submit']) && empty($_COOKIE['register'])) {
    require 'pages/register.php';
    echo 'hallo1';

} else if (isset($_POST['reg_submit']) || !empty($_COOKIE['register'])) {

    if (!isset($_GET['id'])) {// wenn die ID nicht in URL übergeben wurde.... 
        require 'pages/mk_value.php';
        //echo 'hello2';

        echo '<h3>Erinnerung:</h3>';
        require 'config/query.php';

        if (!empty($_POST['mk_submit'])) {//POST-Request abgeschickt und nicht leer 
            echo 'Du hast eine neue Erinnerung hinzugefügt!';
            // und man kann auch keine Links auswählen, denn dann kommt ma wieder zur REgistrierung.....
        }
    } else {
        require 'config/prepared.php';
        //echo 'Hallo 4';
    }
}

// require 'pages/hello.php';
// require 'pages/hello.php';
// require 'pages/hello.php';

// require_once 'pages/hello.php';
// require_once 'pages/hello.php';


    // var_dump($password);
    // var_dump($hashed_password);

    // if (password_verify($password, $hashed_password)) {
    //     echo 'password is varified';
    // } else {
    //     echo 'no match!';
    // } ----- Testing password_hash
?>