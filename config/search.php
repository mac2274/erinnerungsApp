<?php
if (isset($_POST['search_id']) || isset($_POST['search_erin'])) { // aus dem Formular search.php
    $searchID = $_POST['search_id'];

    $sql = "SELECT * from erinnerung WHERE id=?";

    $stmt3 = $mysqli->prepare($sql);
    $stmt3->bind_param("i", $searchID);
    $stmt3->execute();

    $result = $stmt3->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>Erinnerung gefunden:</h3>";
        echo "ID: " . htmlspecialchars($row['id']) . "<br>";
        echo "Inhalt: " . htmlspecialchars($row['value']) . "<br>";
        echo "Fällig am: " . htmlspecialchars($row['deadline']) . "<br>";
        echo "Beschreibung: " . htmlspecialchars($row['description']) . "<br>";
    } else {
        echo '0 results';
    }
    //$stmt3->close(); 
}
?>