<?php
require_once '../config/lib.php';

if (isset($_SESSION['loginDone'])) {
    echo 'Willkommen zurück, ' . $_SESSION['name'] . '!';

} else {
    echo 'Du bist noch nicht eingeloggt.';
}
?>
</p>