<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM erinnerung WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();

        //echo 'good day 2';

        if ($stmt->errno) {
            echo 'Abfrage war fehlerhaft.';
            echo $stmt->errno;
        }

        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo '<hr><b><a href="?id='.htmlspecialchars($row['id']).'">#' . $row['id'].'</a>: '.htmlspecialchars($row['value']).'</b> -'.htmlspecialchars($row['u_id']). '('.htmlspecialchars($row['deadline']).')<br>';
            echo '<p>'.(htmlspecialchars($row['description'])).'-'.htmlspecialchars($row['status']).'</p>';
        }
    }
}


// ich möchte statt u_id die Person(name) zeigen
// genau so mit status, hier gerne den value aus der status-tabelle
// geht das, wenn man eig hier aus dem row