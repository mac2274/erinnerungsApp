<?php
session_start();

require_once 'config.db.php';


function regUser($name, $email, $hashedPwd)
{
    global $mysqli;
    // variables
    $name = $_POST['reg_name'];
    $email = $_POST['reg_email'];
    $hashedPwd = password_hash($_POST['reg_pwd'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO user (name, email, password) VALUE (?,?,?);";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('sss', $name, $email, $hashedPwd);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    return $stmt->affected_rows;
}

function loginUser()
{
    global $mysqli;
    $email = $_POST['login_email'];
    $sql = "SELECT FROM user (email) VALUE (?);";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt){
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('s', $email);
    if (!$stmt->execute()){
        throw new Exception($stmt->error);
    }
    return $stmt->get_result();
}
;
