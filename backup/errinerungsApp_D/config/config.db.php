<?php
// Verbiindung zur Datenbank aufbauen:
// wird am anfang der index geladen UND DAHER IMMER verfügbar

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli('db', 'root', 'test', 'errinerungsDB');

if($mysqli->connect_errno){
    throw new RuntimeException('mysqli-Verbindungsfehler: '. $mysqli->connect_error);
//} else{
    //Fehlerbehandlung hier
}

?>