<?php
require_once '../config/lib.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['deleteId'])) {
        $Id = $_POST['deleteId'];
        $message = 'Bist du sicher, dass du die Erinnerung #' . $Id . ' löschen möchtest?
           
                <div>
                    <a href="parts/deleted.php?delete=true&id='.$Id.'" class="button">Ja, löschen.</a>
                    <a href="" class="button">Nicht löschen.</a>
                </div>';

    } elseif (!empty($_POST['deleteValue'])) {
        global $Value;
        deleteValue();
        $message = 'Du hast die Erinnerung "' . htmlspecialchars($Value) . '" gelöscht.';
    } else {
        $message = 'Es ist ein Fehler beim Löschen aufgetreten.';
    }
}

?>

<script>

</script>