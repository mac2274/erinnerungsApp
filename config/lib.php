<?php 
//prepared-Statement 

class DBException extends Exception{
}
function erin_function($value, $date){

    global $mysqli;
    $q = "INSERT INTO erinnerung SET value = ?, deadline = ?;";
    $stmt = $mysqli->prepare($q);
    if (!$stmt){
        throw new DBException($mysqli->error);
    }
    $stmt->bind_param('si', $value, $date); 
    if(!$stmt->execute()){
        throw new DBException($stmt->error);
    }
    return $stmt->affected_rows;
}
?>
