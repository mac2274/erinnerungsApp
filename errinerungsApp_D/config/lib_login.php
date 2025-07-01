<?php


$email = $_POST['li_email'];
// muss password hier überhauot gehasht werden?
$password = $_POST['li_pwd'];

// SQL-Abfrage für Login-Mechanismus
$sql = "SELECT id, email, name, password FROM user WHERE email=?";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    throw new Exception($mysqli->error);
}

$stmt->bind_param('s', $email);

if (!$stmt->execute()) {
    throw new Exception($stmt->error);
}
$result = $stmt->get_result();

// wenn Ergebnis "===1", dann mache folgendes: 
if ($result->num_rows === 1) {
    // Hole die nächste zeile aus dem Abfrage-Ergebnis $result
    $userfDB = $result->fetch_assoc();


    if (password_verify($password, $userfDB['password'])) {
        $_SESSION['UserEmail'] = $userfDB['email']; // wenn LOGIN erfolgreich, user merken 
        $_SESSION['UserId'] = $userfDB['id'];
        $_SESSION['UserName'] = $userfDB['name'];
        $_SESSION['LoginDone'] = true;

        echo 'Willkommen zurück, ' . htmlspecialchars($userfDB['name']);

        $sqllog = "INSERT INTO user_logins SET u_id=? ;";
        $stmtlog = $mysqli->prepare($sqllog);
        if (!$stmtlog) {
            throw new Exception($mysqli->error);
        }
        $stmtlog->bind_param('i', $_SESSION['UserId']);
        if (!$stmtlog->execute()) {
            throw new Exception($stmtlog->error);
        }
        $result = $stmtlog->get_result();
    } else {
        echo 'Falsches Passwort eingegeben.<br>';
    }
} else {
    echo 'User nicht gefunden!';
}

?>