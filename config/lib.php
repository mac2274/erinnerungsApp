<?php 
//prepared-Statement 

class DBException extends Exception{
}

function erin_function($value, $description, $date){

    global $mysqli;
    $q = "INSERT INTO erinnerung SET value = ?, description=?, deadline = ?;";
    $stmt = $mysqli->prepare($q);
    if (!$stmt){
        throw new DBException($mysqli->error);
    }
    $stmt->bind_param('ssi', $value, $description, $date); 
    if(!$stmt->execute()){
        throw new DBException($stmt->error);
    }
    return $stmt->affected_rows;
}
?>
