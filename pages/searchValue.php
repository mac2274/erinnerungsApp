<?php
require_once '../config/lib.php';
?>


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
    <form method="POST" action="">

        <div class="col_2">
            <label for="search_erin">Suchbegriffeingabe:</label>
            <input type="text" name="searchValue" id="search_erin">
        </div>

        <input type="submit" name="search_submit" value="Suchen">
    </form>

    <?php
    require_once '../form/doSearch.php';
    //showDetails();
    ?>

    <a href="makeValue.php" class="button back">zurück</a>

</body>

</html>