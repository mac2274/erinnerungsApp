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
        Aufgaben und To-Dos!!</p>
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
// user wird registriert mit password & email -> DB
if (isset($_POST['reg_submit'])) {
    user_function($_POST['reg_name'], $_POST['reg_email'], $_POST['reg_pwd']);
    //setcookie("register", "registered");
}

// erinnerung wird hergestellt -> DB
if (isset($_POST['mk_submit'])) {
    erin_function($_POST['mk_value'], $_POST['mk_description'], $_POST['status'], $_POST['changed'], $_POST['u_id'], $_POST['mk_deadline']);
}


if (!isset($_POST['reg_submit'])) {
    require 'pages/register.php';

} else if (isset($_POST['reg_submit'])) {

    if (!isset($_GET['id'])) {// wenn die ID nicht in URL übergeben wurde.... 
        require 'pages/mk_value.php';
        echo 'hello2';

        echo '<h3>Erinnerung:</h3>';
        require 'config/query.php';

        // ---------------------- warum wird nach Erstellung der Erinerung zurück geführt zur REgistrierung?!------------------
  

    } else if(isset($_GET['id']) && !isset($_POST['mk_submit'])){
        //echo 'Bonjour!';
        // jetzt brauche ich den Inhalt von oben:
        echo '<br>';
        echo '<b>Klasse! Du hast soeben eine neue Erinnerung erstellt!</b>';
        echo '<h3>Erinnerung:</h3>';
        require 'config/query.php';
        require 'pages/mk_value.php';

    } else {
        require 'config/prepared.php';
        echo 'Hallo 4';
    }
} else {
    echo 'hallo Buh!';
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