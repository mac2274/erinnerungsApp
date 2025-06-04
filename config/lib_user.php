<?php

function user_function($user, $password){
    global $mysqli;
    $q2 = "INSERT INTO user SET id=?, name=?, password=?, register-date=?;";
    $stmt2 = $mysqli->prepare($q2);
    if (!$stmt2) {
        throw new DBException($mysqli->error);
    }
    $stmt2->bind_param("is", $user, $password);
    if (!$stmt2) {
        throw new DBException($stmt2->error);
    }
    return $stmt2->affected_rows;
}
?>