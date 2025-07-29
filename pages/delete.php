<?php 
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    require 'parts/doDelete.php';
} 
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

    <form method="POST">
        <label for="deleteId">Löschen anhand der ID:</label>
        <input type="text" name="deleteId" id="deleteId" class="width80">

        <label for="deleteValue">Löschen anhand der Beschreibung:</label>
        <input type="text" name="deleteValue" id="deleteValue" class="width80">

        <input type="submit" value="Erinnerung löschen" name="deleteeSubmit">
    </form>

    <?php if (!empty($message)){
        echo '<p>' .$message. '</p>';
    } ?>

    <a href="makeValue.php" class="button back">zurück</a>

</body>

</html>