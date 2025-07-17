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

        // inserting user login time:
        $sql2 = "INSERT INTO user_logins SET user_id=? ";
        $stmt2 = $mysqli->prepare($sql2);
        if (!$stmt2) {
            throw new Exception($mysqli->error);
        }
        $stmt2->bind_param('i', $_SESSION['UserId']);
        if (!$stmt2->execute()) {
            throw new Exception($stmt2->error);
        }
        $resultlog = $stmt2->get_result();
        // -------- Log times added 
    } else {
        echo '<p class="alert padding-top-5">Falsches Passwort eingegeben.</p><br>';
        require '../pages/login.php';
    }
} else {
    echo 'User nicht gefunden!';
}

exit;
?>