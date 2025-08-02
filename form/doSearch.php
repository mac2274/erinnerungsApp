<?php
require_once '../config/lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['searchValue'])) {
        $value = $_POST['searchValue'];
        valueSearch();
    } else {
        echo 'Bitte fülle ein Suchfeld';
    }
}