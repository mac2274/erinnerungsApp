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
            echo '<hr><b><a href="?id=' . $row['id'].'">#' . $row['id'].'</a>: '.htmlspecialchars($row['value']).'</b>('.$row['deadline'].')<br>';
            echo '<p>'.($row['desciption']).'</p>';
        }
    }
}
