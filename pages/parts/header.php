<?php
require_once '../config/lib.php';

if (!isset($_SESSION['loginDone']) && isset($_SESSION['regName'])) {
    echo 'Hallo, ' . $_SESSION['regName'] . '. Schön, dass du hier bist!';
} elseif(isset($_SESSION['loginDone']) && isset($_GET['search'])){ // search
    echo 'Das ist die Seite, auf der Du nach Erinnerungen suchen kannst, '.  $_SESSION['name'] . '.';
} elseif(isset($_SESSION['loginDone']) && isset($_GET['seeLast'])){ // see last erinnerungen
    echo 'Das sind die zuletzt erstellten Erinnerungen, '.  $_SESSION['name'] . '.';
} elseif(isset($_SESSION['loginDone']) && isset($_GET['delete'])){ // delete
    echo 'Hier kannst du Erinnerungen löschen, '.  $_SESSION['name'] . '.';
} elseif (isset($_SESSION['loginDone']) && isset($_GET['change'])) { // change
    echo 'Hier kannst du eine Erinnerung bearbeiten, ' . $_SESSION['name'] . '.';
} elseif (isset($_SESSION['loginDone'])) {
    echo 'Willkommen zurück, ' . $_SESSION['name'] . '!';

} else {
    echo 'Du bist noch nicht eingeloggt.';
}
?>
</p>