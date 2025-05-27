<?php

if(isset($_POST['submit'])){
    if(erin_function($_POST['frm_value'],['frm_deadline'])){
        echo 'Die Erinnerung wurde erfolgreich erstellt!';
    }
}

$query = "SELECT id, value, deadline FROM erinnerung ORDER BY id DESC";


$result = $mysqli->query($query); // wollte das zu prepared Statement umwandeln. Hirnfuck...

while($row = $result->fetch_assoc()){
    echo '<a href="?id='.$row['id'].'">#'.$row['id'].'</a>'. htmlspecialchars($row['value']) .htmlspecialchars($row['deadline']).'<br>';
    echo 'Hui';
}

// $if($result = $mysqli->prepare($query)){
// // brauch man die fehlersuche hier?
// // if(!$query){
// //     throw new EException($mysqli->error);
// // }
//     $result->bind_param('i', $id);
//}
?>

