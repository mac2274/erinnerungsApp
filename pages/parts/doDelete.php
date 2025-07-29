<?php
require_once '../config/lib.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['deleteId'])){
        $Id = $_POST['deleteId'];
        deleteValue();
        $message = 'Du hast die Erinnerung mit der ID #' . htmlspecialchars($Id) . ' gelöscht.';
    } elseif (!empty($_POST['deleteValue'])) {
        $Value = $_POST['deleteValue'];
        deleteValue();
        $message =  'Du hast die Erinnerung "'. htmlspecialchars($Value).'" gelöscht.';
    } else {
        $message = 'Es ist ein Fehler beim Löschen aufgetreten.';
    }
}