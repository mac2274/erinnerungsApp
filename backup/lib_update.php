<?php
function update_function($value, $description, $status, $chenged, $u_id, $date){

    global $mysqli;
    $q = "UPDATE erinnerung SET description=?, status=?, changed=?, u_id=?, deadline=? WHERE value=?;";
    $stmt = $mysqli->prepare($q); // ------------------------------------------------------------------ 1. prepare() 
    if (!$stmt){
        throw new DBException($mysqli->error);
    }
    $stmt->bind_param('sisiss', $value, $description, $status, $chenged, $u_id, $date); // 2. bind_param()
    if(!$stmt->execute()){ // -------------------------------------------------------------------------------- 3. execute()
        throw new DBException($stmt->error);
    }
    return $stmt->affected_rows;
}