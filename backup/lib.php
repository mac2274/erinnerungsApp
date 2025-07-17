<?php 
//prepared-Statement 

class DBException extends Exception{
}

function erin_function($value, $description, $status, $chenged, $u_id, $date){

    global $mysqli;
    $q = "INSERT INTO erinnerung SET value=?, description=?, status=?, changed=?, u_id=?, deadline=? ;";
    $stmt = $mysqli->prepare($q); // ------------------------------------------------------------------ 1. prepare() 
    if (!$stmt){
        throw new DBException($mysqli->error);
    }
    $stmt->bind_param('ssisis', $value, $description, $status, $chenged, $u_id, $date); // 2. bind_param()
    if(!$stmt->execute()){ // -------------------------------------------------------------------------------- 3. execute()
        throw new DBException($stmt->error);
    }
    return $stmt->affected_rows;
}
?>
