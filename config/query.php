<?php
// wollte das zu prepared Statement umwandeln. Hirnfuck...

// if(isset($_POST['mk_submit'])){
//     if(erin_function($_POST['mk_value'], $_POST['mk_description'], $_POST['mk_deadline'])){
//         echo 'Die Erinnerung wurde erfolgreich erstellt!';
//     }
// }

$query = "SELECT id, value, deadline, description FROM erinnerung ORDER BY id DESC LIMIT 10";

$result = $mysqli->query($query);  // -> Liste von Erinnerungen!!!
while($row = $result->fetch_assoc()){     // als Array ausgegeben
    echo '<b><a href="?id='.$row['id'].'">#'.$row['id'].':</a></b> '. htmlspecialchars($row['value']) .' ('.htmlspecialchars($row['deadline']).')<br>';
}


?>

