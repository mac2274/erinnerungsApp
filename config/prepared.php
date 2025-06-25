<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // LEFT JOIN:
    // SELECT erinnerung.id, erinnerung.value, user.name, status.value 
    // FROM user 
    // LEFT JOIN erinnerung ON user.id = erinnerung.u_id 
    // RIGHT JOIN status ON erinnerung.status = status.id;

    $sql = "SELECT  * FROM erinnerung WHERE id=?";

    if ($stmt = $mysqli->prepare($sql)) { // - 1.
        $stmt->bind_param('i', $id); //  2.
        $stmt->execute(); // ------------------------ 3.

        if ($stmt->errno) {
            echo 'Abfrage war fehlerhaft.';
            echo $stmt->errno;
        }

        $result = $stmt->get_result();
        // testen: $sql2
        $sql2 = "SELECT erinnerung.id, erinnerung.value, user.name, status.value FROM user LEFT JOIN erinnerung ON user.id = erinnerung.u_id LEFT JOIN status ON erinnerung.status = status.id WHERE status.value AS status;";
        

        while ($row = $result->fetch_assoc()) {
            echo '<hr><b><a href="?id=' . htmlspecialchars($row['id']) . '">#' . $row['id'] . '</a>: ' . htmlspecialchars($row['value']) . '</b> - ' . htmlspecialchars($row['u_id']) . '(' . htmlspecialchars($row['deadline']) . ')<br>';
            echo '<p>' . (htmlspecialchars($row['description'])) . ' - ' . htmlspecialchars($row['status']) . '</p>';
        }
    }
}


// ich möchte statt u_id die Person(name) zeigen
// genau so mit status, hier gerne den value aus der status-tabelle
// geht das, wenn man eig hier aus dem row