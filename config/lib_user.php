<?php

function user_function($user, $email, $password){
    global $mysqli;
    $name = $_POST['reg_name'];
    $email = $_POST['reg_email'];
    $password = $_POST['reg_pwd'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $q2 = "INSERT INTO user SET name=?, email=?, password=? ;";
    $stmt2 = $mysqli->prepare($q2); // --------------------------------------------- 1. prepare()
    if (!$stmt2) {
        throw new DBException($mysqli->error);
    }
    $stmt2->bind_param("sss", $name, $email, $hashed_password); // ---- 2. bind_param()
    if (!$stmt2->execute()) { // ---------------------------------------------------------- 3. execute()
        throw new DBException($stmt2->error);
    }
    return $stmt2->affected_rows;
}
?>