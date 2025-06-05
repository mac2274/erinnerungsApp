<?php

function user_function($user, $email, $password){
    global $mysqli;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $q2 = "INSERT INTO user SET name=?, email=?, password=?;";
    $stmt2 = $mysqli->prepare($q2);
    if (!$stmt2) {
        throw new DBException($mysqli->error);
    }
    $stmt2->bind_param("sss", $user, $email, $hashed_password);
    if (!$stmt2->execute()) {
        throw new DBException($stmt2->error);
    }
    return $stmt2->affected_rows;
}
?>