<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ErinnerungsApp Reloaded</title>

    <link rel="stylesheet" href="../styles/style.css" type="text/css">

</head>

<body>
    <h1>ErinnerungsApp</h1>

    <h2>Suche nach Erinnerungen</h2>
    <form method="POST">
        <div class="col_2 ">
            <label for="search_id">ID-Suche:</label>
            <input type="number" name="searchId" id="search_id">
        </div>

        <div class="col_2">
            <label for="search_erin">Erinnerungssuche:</label>
            <input type="text" name="search_erin" id="search_erin">
        </div>

        <input type="submit" name="search_submit" value="Suchen">
    </form>
    <a href="makeValue.php" class="button back">zurück</a>

</body>

</html>

<?php
require_once '../config/lib.php';

if ($_SERVER['REQUEST_METHOD']){
    if (isset($_POST['searchId'])){
        global $id;
        searchId($id);
    }
}