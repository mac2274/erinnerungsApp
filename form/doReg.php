<?php
require_once '../config/lib.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['reg_submit'])) {
    $regName = $_POST['reg_name'];
    $regEmail = $_POST['reg_email'];
    $hashedPwd = password_hash($_POST['reg_pwd'], PASSWORD_DEFAULT);

    regUser($regName, $regEmail, $hashedPwd);

    // Session setzen
    $_SESSION['regName'] = $regName;

    require_once '../pages/makeValue.php';
} else {
    echo 'Ein Fehler beim Registrieren ist aufgetreten.';
}