<?php
session_start();

require_once 'config.db.php';

// variables
$name = $_POST['reg_name'];
$email = $_POST['reg_email'];
$hashedPwd = password_hash($_POST['reg_pwd'], PASSWORD_DEFAULT);

function regUser($name, $email, $hashedPwd)
{   
    global $mysqli;
    $sql = "INSERT INTO user (name, email, password) VALUE (?,?,?);";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt){
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('sss', $name, $email, $hashedPwd);
    if (!$stmt->execute()){
        throw new Exception($stmt->error);
    }
    
    return $stmt->affected_rows;
}