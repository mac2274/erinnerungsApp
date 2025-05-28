<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM erinnerung WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if (!$stmt->errno) {
            echo 'Abfrage war fehlerhaft.';
        }
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo '<i><a href="?id=' . $row['id'].'"></a></i>'.$row['id'].'<br>';
        }
    }
}
