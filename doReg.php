<?php
require_once 'config/lib.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['reg_submit'])){
    regUser($name, $email, $hashedPwd);
    // echo 'Registered!';
    require 'home.html';
} else {
    echo 'Ein Fehler ist aufgetreten.';
}