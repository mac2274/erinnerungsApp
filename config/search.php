<?php
if (isset($_POST['search_id']) || isset($_POST['search_erin'])) { // aus dem Formular search.php
    $searchID = $_POST['search_id'];
    $searchErin = $_POST['search_erin'];

    $sql = "SELECT * from erinnerung WHERE id=? OR value=?";

    $stmt3 = $mysqli->prepare($sql);
    $stmt3->bind_param("is", $searchID, $searchErin);
    $stmt3->execute();

    $result = $stmt3->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Erinnerung gefunden:</h3>";

        while ($row = $result->fetch_assoc()) {
            
            echo "ID: " . htmlspecialchars($row['id']) . "<br>";
            echo "Inhalt: " . htmlspecialchars($row['value']) . "<br>";
            echo "Fällig am: " . htmlspecialchars($row['deadline']) . "<br>";
            echo "Beschreibung: " . htmlspecialchars($row['description']) . "<br>";
            echo '<hr>';
        }
    } else {
        echo 'Keine passende Erinnerung gefunden aus: "' .htmlspecialchars($_POST[('search_erin')]).'"';
    }
    //$stmt3->close(); 
}
?>