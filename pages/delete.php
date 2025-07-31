<?php
require '../config/lib.php';
$message = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erinnerungen löschen</title>

    <link rel="stylesheet" href="../styles/style.css" type="text/css">

</head>

<body>

    <h1>Erinnerungs-Helper</h1>

    <form method="GET" action="">
        <!-- <label for="deleteId">Löschen anhand der ID:</label>
        <input type="text" name="deleteId" id="deleteId" class="width80"> -->

        <label for="deleteValue">Löschen anhand der Beschreibung:</label>
        <input type="text" name="deleteValue" id="deleteValue" class="width80">

        <input type="submit" value="Erinnerung suchen" name="deleteSubmit">
    </form>

    <?php 
    // eine GET-Abfrage wird gesetzt UND das input deleteValue ist aussgefüllt UND GET[delete] noch nicht bestätigt:
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deleteValue']) && !isset($_GET['delete'])) {
        $valueDelete = trim($_GET['deleteValue']);

        $message = 'Du möchtest diese Erinnerung "' . $_GET['deleteValue'] . '" löschen?
            <div class="padding-top-5">
                <a href="?delete=true&deleteValue=' . $_GET['deleteValue'] . '" class="button">Ja, löschen.</a>
                <a href="delete.php" class="button">Nicht löschen.</a>
            </div>';
    }

    // wenn GET[delete] bestätigt wurde UND delete=1 UND GET[deleteValue] einen Wert hat:
    if (isset($_GET['delete']) && $_GET['delete'] === 'true' && isset($_GET['deleteValue'])) {
        deleteValueFunction();
        $message = 'Die Erinnerung "' . $_GET['deleteValue'] . '" wurde gelöscht.';
    }
    ?>

    
    <?php // Die $message wird nachdem löschen mit einem echo ausgegeben 
    if (!empty($message)) {
        echo $message;
    } ?>

    <a href="makeValue.php" class="button back">zurück</a>

</body>

</html>