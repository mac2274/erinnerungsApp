<?php
session_start();

require_once 'config.db.php';


function regUser($regName, $regEmail, $hashedPwd)
{
    global $mysqli;
    // variables
    $regName = $_POST['reg_name'];
    $regEmail = $_POST['reg_email'];
    $hashedPwd = password_hash($_POST['reg_pwd'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, password) VALUE (?,?,?)";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('sss', $regName, $regEmail, $hashedPwd);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    // Session setzen
    $_SESSION['name'] = $regName;

    return $stmt->affected_rows;
}

function loginUser($loginEmail)
{
    global $mysqli;
    // variable
    $loginEmail = $_POST['login_email'];
    $loginPwd = $_POST['login_pwd'];

    $sql = "SELECT name, email, password FROM user WHERE email=?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('s', $loginEmail);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $getRow = $result->fetch_assoc();

        if (password_verify($loginPwd, $getRow['password'])) {
            $_SESSION['name'] = $getRow['name'];
            $_SESSION['email'] = $getRow['email'];
            $_SESSION['loginDone'] = true;
        }
    }
}

function makeErinnerung($mkValue, $mkDetails, $status, $changed, $u_id, $mkDeadline)
{
    global $mysqli;

    $mkValue = $_POST['mk_value'];
    $mkDetails = $_POST['mk_details'];
    $mkDeadline = $_POST['mk_deadline'];

    $sql = "INSERT INTO erinnerung SET value=?, description=?, status=?, changed=?, u_id=?, deadline=? ";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('ssisis', $mkValue, $mkDetails, $status, $changed, $u_id, $mkDeadline);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    return $stmt->affected_rows;
}

function showValue()
{
    global $mysqli;

    $sql = "SELECT id, value, description FROM erinnerung ORDER BY id DESC LIMIT 1";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->execute();

    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo '<p class="showValueAfter"><b>Erinnerung: ID: </b>' . $row['id'] . ': ' . $row['value'] . '( ' . $row['description'] . ')</p>';
    }

}
function seeAllFunction()
{
    global $mysqli;

    $sql = "SELECT * FROM erinnerung ORDER BY id DESC LIMIT 20";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->execute();

    $result = $stmt->get_result();

    echo '<h3>Erinnerungen:</h3>';
    while ($row = $result->fetch_assoc()) {
        echo '<p><b>ID: ' . $row['id'] . '</b><br><b>value:</b> ' . $row['value'] . ' (' . $row['description'] . ') <br>
        status: '.$row['status']. ' changed: '.$row['changed']. '<br>deadline: '.$row['deadline'].'</p>';
    }
}

function searchId($id) {
    global $mysqli;

    $id = $_POST['searchId'];

    $sql = "SELECT * FROM erinnerung WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    $result = $stmt->get_result();

    echo '<h3>Gesuchte ID:</h3>';
    while ($row = $result->fetch_assoc()){
        echo    'ID: '.$row['id'].
                '<br>Value: <b>'.$row['value'].'</b>'.
                '<br>Description: '.$row['description'].
                '<br>Status: '.$row['status'].
                '<br>Changed: '.$row['changed'].
                '<br>Deadline: '.$row['deadline'];
    }
}

function valueSearch($value){
    global $mysqli;

    $value = $_POST['searchValue'];
    $sql = "SELECT * FROM erinnerung WHERE value=?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('s', $value);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        echo $row['id'];
    }
}