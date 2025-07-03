<?php
session_start();

require_once 'config/config.db.php';
require_once 'config/lib.php';
require_once 'config/lib_user.php';

echo 'Request-Methode: ' . $_SERVER['REQUEST_METHOD'];
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
        Da verliert man schnell den Überblick im ganzen Durcheinander! und wenn du da gerne eine kleine Hilfe möchtest,
        dann
        bist du bei uns genau an der richtige Stelle!
    </p>
    <p>
        Wir helfen dir, an alle wichtigen Dinge zu denken!
    </p>
</body>

</html>

<?php
// logout
if (isset($_GET['logout'])) {
    echo '<p style="color:red;">Erfolgreich ausgeloggt!</p>';
}

// REGISTRIERUNG: user wird registriert mit password & email -> DB
if (isset($_POST['reg_submit'])) {
    user_function($_POST['reg_name'], $_POST['reg_email'], $_POST['reg_pwd']);

    $_SESSION['name'] = $_POST['reg_name'];
    echo '<p class="padding-top-5">Hallo, ' . $_SESSION['regName'] . ' du hast dich erfolgreich Registriert!</p>';
}

// ERSTELLEN VON ERIN: erinnerung wird hergestellt -> DB
if (isset($_POST['mk_submit'])) {
    erin_function($_POST['mk_value'], $_POST['mk_description'], $_POST['status'], $_POST['changed'], $_SESSION['UserId'], $_POST['mk_deadline']);
}

if (!isset($_SESSION['LoginDone']) || $_SESSION['LoginDone'] !== true) {
    require 'pages/login.php';
    echo 'Noch nicht registriert? Dann rasch hier <a href="pages/register.php">registrieren</a>.<br>';

} elseif (isset($_POST['mk_submit']) && !empty($_POST['mk_value'])) {
    echo '<h4>Klasse, ' . $_SESSION['UserName'] . '!</h4>';
    echo 'Du hast eine neue Erinnerung erstellt: <br>';
    echo '<p class="made">' . htmlspecialchars($_POST['mk_value']) . '</p>';
    echo '<div id="justMade" style="display:flex; flex-direction:row; gap:5%;">';
    require 'pages/parts/last_erinsButton.php';
    require 'pages/parts/new_erinButton.php';
    echo '</div>';
    require 'pages/parts/backButton.php';

} elseif (isset($_GET['id'])) {
    require 'config/prepared.php';
    require 'pages/parts/backButton.php';

} elseif (isset($_POST['li_submit']) && $_POST['li_pwd'] == true) {
    echo '<p class="padding-top-5">Willkommen zurück, ' . htmlspecialchars($_SESSION['UserName']) . '!</p>';
    require 'pages/mk_value.php';
    require 'pages/parts/index_searchButton.php';
    // require 'pages/parts/last_erins.php';
    if (isset($_POST['search_submit'])) {
        require 'config/search.php';
    } else {
        echo 'Deine Detailsuche ist schiefgelaufen. Versuche es nochmal!';
    }
} else {
    require 'pages/login.php';
}



// logout-button 
if (isset($_SESSION['LoginDone']) && $_SESSION['LoginDone'] === true) {
    echo '<a class="alert button logoutBut" href="./pages/logout.php">LOGOUT</a>';
}

?>