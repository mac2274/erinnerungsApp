<?php
require_once '../config/lib.php';

global $mkValue;
global $mkDetails;
global $mkDeadline;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mk_submit'])) {
    makeErinnerung($mkValue, $mkDetails, $_POST['status'], $_POST['changed'], $_POST['u_id'], $mkDeadline);
    // header(" Location : ..index.html?success=1&user=" . urlencode($_SESSION['name']));
    header("Location: ../pages/makeValue.php?make=done");
    exit;
} else {
    echo 'Es konnte keine neue Erinnerung erstellt werden.';
}
?>