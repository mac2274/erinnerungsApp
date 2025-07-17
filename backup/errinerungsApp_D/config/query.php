<?php

$sql = "SELECT  * FROM erinnerung WHERE u_id=? LIMIT 10";

if ($stmt = $mysqli->prepare($sql)) { // - 1.
    $stmt->bind_param('i', $_SESSION['UserId']); //  2.
    $stmt->execute(); // ------------------------ 3.

    if ($stmt->errno) {
        echo 'Abfrage war fehlerhaft.';
        echo $stmt->errno;
    }

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<hr><b><a href="?id=' . htmlspecialchars($row['id']) . '">#' . $row['id'] . '</a>: ' . htmlspecialchars($row['value']) . '</b> - ' . htmlspecialchars($row['u_id']) . '(' . htmlspecialchars($row['deadline']) . ')<br>';
        echo '<p>' . (htmlspecialchars($row['description'])) . ' - ' . htmlspecialchars($row['status']) . '</p>';
    }
}

?>