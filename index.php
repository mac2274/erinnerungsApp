<?php
session_start();

require_once 'config/config.db.php';
require_once 'config/lib.php';
require_once 'config/lib_user.php';
// ----> Datenbank organisieren
?>

<html>

<head>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="styles/design.css" type="text/css">
    <link rel="stylesheet" href="styles/activities.css" type="text/css">
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
}
// erinnerung wird hergestellt -> DB
if (isset($_POST['mk_submit'])) {
    erin_function($_POST['mk_value'], $_POST['mk_description'], $_POST['status'], $_POST['changed'], $_POST['u_id'], $_POST['mk_deadline']);
}

if ($_SERVER['REQUEST_METHOD'] === "POST") { // handelt es sich um eine POST-Anfrage, dann:
    if (isset($_POST['reg_submit'])) {
        // $cookie_name = "username";
        // $cookie_value = htmlspecialchars($_POST['reg_name']);
        // setcookie($cookie_name, $cookie_value);

        $_SESSION['submit'] = $_POST['reg_submit'];

        if (!isset($_SESSION['registered'])) {
            echo 'Du bist jetzt registriert!';
            // $_SESSION['registered'] = true; --- Besser Namen nutzen:
            $_SESSION['registered'] = $_POST['reg_name'];

        } else {
            echo 'Du bist schon registreiert gewesen.';
        }

        header("Location:" . $_SERVER['PHP_SELF']);
        exit; // mit header und exit wird register.php nicht zweifach angezeigt!!   
    } elseif (isset($_POST['li_submit'])){
        if ($_POST['li_name'] === $_POST['reg_name']) {
            if ($_POST['li_pwd'] === $_POST['reg_pwd']) {
                echo 'Du bist bereits regisstriert! Wilkommen zurück, '.htmlspecialchars($_POST['li_name']);
            }
        }
    }
}

if (isset($_SESSION['registered']) && !isset($_GET['id'])) {
    echo '<br><h2>Hallo, ' . htmlspecialchars($_SESSION['registered']) . '!</h2>';
    echo '<i>Du bist jetzt registriert und darfst eine Erinnerung erstellen!</i>';

    echo $_SESSION['submt'];

    require 'pages/mk_value.php';


    if (isset($_POST['mk_submit'])) {
        echo '<h2>Erinnerungen:</h2>';
        require 'config/query.php';
    } else if (isset($_POST['search_id']) || isset($_POST['search_erin'])) {
        // echo 'Das Suchergebnis lautet: ';
        require 'config/search.php';

    }
} elseif (isset($_SESSION['registered']) && !isset($_GET['id']) && isset($_POST['mk_submit'])) {
    echo 'Button zur Erstellung von Erinnerungen';
} elseif (isset($_GET['id'])) {
    echo '<h2>Ausgewählte Erinnerung</h2>';
    require 'config/prepared.php';
} else {
    require 'pages/register.php';
    echo 'Oder ';
    require 'pages/login.php';
}


// var_dump($password);
// var_dump($hashed_password);

// if (password_verify($password, $hashed_password)) {
//     echo 'password is varified';
// } else {
//     echo 'no match!';
// } ----- Testing password_hash
?>