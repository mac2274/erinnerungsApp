<?php
if (isset($_POST['search_id']) || isset($_POST['search_erin'])) { // aus dem Formular search.php
    $searchID = $_POST['search_id'];
    $searchErin = $_POST['search_erin'];

    $sql = "SELECT * from erinnerung WHERE id=? OR value=?";

    $stmt3 = $mysqli->prepare($sql); // 1. prepare()
    $stmt3->bind_param("is", $searchID, $searchErin); // 2. bind_param()
    $stmt3->execute(); // 3. execute()

    $result = $stmt3->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Erinnerung gefunden:</h3>";

        while ($row = $result->fetch_assoc()) {
            
            echo "ID: " . htmlspecialchars($row['id']) . "<br>";
            echo "Erinnerung: " . htmlspecialchars($row['value']) . "<br>";
            echo "Erstellt am: " . htmlspecialchars($row['deadline']) . "<br>";
            echo "Beschreibung: " . htmlspecialchars($row['description']) . "<br>";
            echo '<hr>';
        }
    } else {
        echo 'Keine passende Erinnerung gefunden aus: "' .htmlspecialchars($_POST[('search_erin')] OR $_POST['search_id']).'"';
    }
    //$stmt3->close(); 
}
?>