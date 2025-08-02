<?php
require_once '../config/lib.php';

global $regName;
global $regEmail;
global $hashedPwd;

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['reg_submit'])){
    regUser($regName, $regEmail, $hashedPwd);
    require '../pages/makeValue.php';
} else {
    echo 'Ein Fehler beim Registrieren ist aufgetreten.';
}