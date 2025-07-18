<?php

require_once '../config/lib.php';

if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['reg_submit'])){
    loginUser($email);

}

?>