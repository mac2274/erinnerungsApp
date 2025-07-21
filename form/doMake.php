<?php
require_once '../config/lip.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['mk_submit'])){
    makeErinnerung($mkValue, $mkDescript, $status, $changed, $u_id, $mkDeadline);
    echo 'Du hast eine Erinnerung erstellt!';
} else {
    echo 'Es konnte keine neue Erinnerung erstellt werden.';
}
?>