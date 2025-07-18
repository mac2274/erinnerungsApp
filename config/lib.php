<?php
session_start();

require_once 'config.db.php';


function regUser($name, $email, $hashedPwd)
{
    global $mysqli;
    // variables
    $regName = $_POST['reg_name'];
    $regEmail = $_POST['reg_email'];
    $hashedPwd = password_hash($_POST['reg_pwd'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, password) VALUE (?,?,?)";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('sss', $name, $email, $hashedPwd);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    // Session setzen
    $_SESSION['name'] = $name;

    return $stmt->affected_rows;
}

function loginUser($email)
{
    global $mysqli;
    // variable
    $loginEmail = $_POST['login_email'];
    $loginPwd = $_POST['login_pwd'];

    $sql = "SELECT name, email, password FROM user WHERE email=?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('s', $loginEmail);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $getRow = $result->fetch_assoc();

        if (password_verify($loginPwd, $getRow['password'])) {
            $_SESSION['name'] = $getRow['name'];
            $_SESSION['email'] = $getRow['email'];
            $_SESSION['loginDone'] = true;
        }
    }
}

