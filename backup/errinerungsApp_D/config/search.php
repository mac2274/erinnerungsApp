<?php
// if (isset($_POST['search_submit'])) {     // aus dem Formular search.php {
//     if (!empty($_POST['search_id'])) {
//         echo 'Du suchst nach einer ID';
//         $searchID = $_POST['search_id'];
//     } elseif (!empty($_POST['search_erin'])) {
//         echo 'Du suchst nach einer Erinnrunh!';
//         $searchErin = $_POST['search_erin'];

//     } else {
//         echo 'Irgendwas läufst schief...';
//     }

if (isset($_POST['search_id']) || isset($_POST['search_erin'])){
    $searchID = $_POST['search_id'];
    $searchErin = $_POST['search_erin'];

    $sql = "SELECT * from erinnerung WHERE id=? OR value LIKE ?";

    $stmt3 = $mysqli->prepare($sql); // 1. prepare()
    $stmt3->bind_param("is", $searchID, $searchErin); // 2. bind_param()
    $stmt3->execute(); // 3. execute()

    $result = $stmt3->get_result();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo "ID: " . htmlspecialchars($row['id']) . "<br>";
            echo "Erinnerung: " . htmlspecialchars($row['value']) . "<br>";
            echo "Erstellt am: " . htmlspecialchars($row['deadline']) . "<br>";
            echo "Beschreibung: " . htmlspecialchars($row['description']) ;
            echo '<hr>';
        }
        require 'pages/parts/last_erins.php';
        
    } else {
        echo 'Keine passende Erinnerung gefunden aus: "' . htmlspecialchars($_POST[('search_erin')]) . '"';
    }
    //$stmt3->close(); 

} else {
    echo ' Bitte fülle ein Suchfeld aus.';
}

?>