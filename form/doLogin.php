<?php

require_once '../config/lib.php';

global $email;

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['login_submit'])){
    loginUser($email);
    echo '<p class=greeting>Willkommen zurück, '. $_SESSION['name'].'!</p>';

    require '../pages/home.html';
}else {
    echo 'Ein Fehler beim Login ist aufgetreten.';
}

?>