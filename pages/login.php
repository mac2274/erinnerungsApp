<?php

session_start(); // Wieso braucht hier kein session_start() stehen? "already active"? 
?>
<html>

<head>
    <link rel="stylesheet" href="../styles/style.css" type="text/css">
    <link rel="stylesheet" href="../styles/design.css" type="text/css">
    <link rel="stylesheet" href="../styles/activities.css" type="text/css">
</head>

<div class="wrapper">
    <h2>Logge dich bitte hier ein</h2>

    <!--<form method="POST" action="../index.php">  so werde ich zu http://localhost:4080/index.php geführt -->
    <form method="POST">
        <div class="col_2">
            <label for="email" name="lbl_li_email">Email</label>
            <input type="email" name="li_email" id="email">
        </div>

        <div class="col_2">
            <label for="pwd" name="lbl_li_pwd">Passwort</label>
            <input type="password" name="li_pwd" id="pwd">
        </div>

        <!-- <div class="col_2">
                <label for="pwd-repeat" name="lbl_pwd-repeat">Passwort</label>
                <input type="password" name="frm_li_pwd-repeat" id="pwd-repeat">
            </div> -->

        <input type="submit" name="li_submit" value="Anmelden">
    </form>
    </div>
    
<!--<a href="../index.php">Zurück zur Startseite</a>  FRAGE: Warum geht der link aus dem Ordner 01_erinnerunsApp raus? -->
</html>


<?php

$email = $_POST['li_email'];
$password = $_POST['li_pwd'];

// SQL-Abfrage für Login-Mechanismus
$sql = "SELECT id, name, password FROM user WHERE email=?";
$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    throw new Exception($mysqli->error);
}
$stmt->bind_param('s', $email);
if (!$stmt->execute()) {
    throw new Exception($stmt->error);
}
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    echo 'Das gesuchte Ergebnis: <br>';
    $loggedUser = $result->fetch_assoc();
    echo 'Name: '.htmlspecialchars($loggedUser['name']).'<br>';
    // print_r($loggedUser);

    // if (password_verify($password, $loggedUser['password'])){
    //     $_SESSION['email'] = $
    // }
}

?>