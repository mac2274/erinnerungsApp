<?php 
//prepared-Statement 

class DBException extends Exception{
}

function erin_function($value, $description, $status, $chenged, $u_id, $date){

    global $mysqli;
    $q = "INSERT INTO erinnerung SET value=?, description=?, status=?, changed=?, u_id=?, deadline=? ;";
    $stmt = $mysqli->prepare($q);
    if (!$stmt){
        throw new DBException($mysqli->error);
    }
    $stmt->bind_param('ssisis', $value, $description, $status, $chenged, $u_id, $date); 
    if(!$stmt->execute()){
        throw new DBException($stmt->error);
    }
    return $stmt->affected_rows;
}
?>
