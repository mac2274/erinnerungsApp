<?php

require_once 'config.db.php';

global $mysqli;

// variables
$name = $_POST['reg_name'];
$email = $_POST['reg_email'];
$pwd = $_POST['reg_pwd'];
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

function regUser()
{
    $sql = "INSERT INTO user SET name=?, email=?, passwort=?;";

}