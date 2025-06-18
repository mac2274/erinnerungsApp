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

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['reg_submit'])) { // handelt es sich um eine POST-Anfrage, dann:
    $cookie_name = "username";
    $cookie_value = htmlspecialchars($_POST['reg_name']);
    setcookie($cookie_name, $cookie_value);

    header("Location:" . $_SERVER['PHP_SELF']);
    exit; // mit header und exit wird register.php nicht zweifach angezeigt!!
}
// ------- Wieso funktioniert der Code erst, wenn man die 2. if-Abfrage von der 1. trennt? so wird nach 2. Formular alles korrekt angezeigt ------

if (isset($_COOKIE['username'])) { // ich brauche einen Anhaltspunkt, der signalisiert, dass ich registriert bin!
    //echo 'Cookie ist gespeicchert!';
    require 'pages/mk_value.php';

    if (isset($_POST['mk_submit'])) {
        echo '<h2>Erinnerungen:</h2>';
        require 'config/query.php';

        if ($_GET['id']) { // erst wenn ich noch eine Neue Erinnerung erstelle werde ich zur "Detailseite" weitergeleitet....
            //echo 'Id in URL!';
            echo '<h2>Ausgewählte Erinnerung</h2>';
            require 'config/prepared.php';
        } else{
            echo 'Keine id hier';
        }
    }
} else {
    require 'pages/register.php';
}



// var_dump($password);
// var_dump($hashed_password);

// if (password_verify($password, $hashed_password)) {
//     echo 'password is varified';
// } else {
//     echo 'no match!';
// } ----- Testing password_hash
?>