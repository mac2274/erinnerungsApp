<?php
require_once '../config/lib.php';

if (isset($_SESSION['loginDone'])) {
    echo 'Willkommen zurück, ' . $_SESSION['name'] . '!';
} elseif (isset($_SESSION['regName'])) {
    echo 'Hallo, ' . $_SESSION['regName']. '. Schön, dass du hier bist !';
} else {
    echo 'Du bist noch nicht eingeloggt.';
}
?>
</p>