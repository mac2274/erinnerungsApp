<?php
require_once '../config/lib.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['deleteId'])) {
        global $Id;
        $message = 'Bist du sicher, dass du die Erinnerung #' . $Id . ' löschen möchtest ?
                <form method="GET">
                    <input type="button" class="button" value="Ja, löschen" name="doDelete" id="deleteButton">
                    <input type="button" class="button" name="noDelete" value="Nicht löschen!" id="noDButton">
                </form>';
        if (isset($s['doDelete'])) {
            global $Id;
            deleteValue();
            $message = 'Du hast die Erinnerung #' . htmlspecialchars($Id) . ' gelöscht.';
        } elseif (isset($_POST['noDelete'])) {
            global $Id;
            $message = 'Die Erinnerung mit der ID #' . $Id . 'wurde nicht gelöscht.';
        }
    } elseif (!empty($_POST['deleteValue'])) {
        global $Value;
        deleteValue();
        $message = 'Du hast die Erinnerung "' . htmlspecialchars($Value) . '" gelöscht.';
    } else {
        $message = 'Es ist ein Fehler beim Löschen aufgetreten.';
    }
}

?>
