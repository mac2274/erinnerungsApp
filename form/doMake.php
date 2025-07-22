<?php
require_once '../config/lip.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mk_submit'])) {

    $mkValue = $_POST['mk_value'];
    $mkDetails = $_PPOST['mk_details'];
    $mkDeadline = $_POST['mk_deadline'];
    
    makeErinnerung($mkValue, $mkDetails, $_POST['status'], $_POST['changed'], $_POST['u_id'], $mkDeadline);
    echo 'Du hast eine Erinnerung erstellt!';
} else {
    echo 'Es konnte keine neue Erinnerung erstellt werden.';
}
?>