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

        <h2>Erinnerungen ändern</h2>
        <form method="POST" action="">

                <div class="col_2">
                        <label for="search_erin">Erinnerung/en suchen:</label>
                        <input type="text" name="searchValue" id="search_erin">
                </div>

                <input type="submit" name="search_submit" value="Suchen">
        </form>

        <?php
        require_once '../form/doSearch.php';
        showDetails();
        ?>

        <?php
        if (isset($_GET['value'])) {
                $placeholderValue = $_GET['value'] ?>

                <form method="GET" action="">
                        <h3>Änderung/en hier :</h3>
                        <p>Erinnerung: <strong>"<?php echo $placeholderValue ?>" </strong></p>
                        <label for="newValue">Titel der Erinnerung ändern
                                <input type="text" name="newValue" id="newValue" placeholder="<?php echo $placeholderValue ?>">
                        </label>
                        <label for="newDescription">Beschreibunng dazu ändern
                                <input type="text" name="newDescription" id="newDescription">
                        </label>

                        <input type="submit" name="newValueSubmit" value="Änderung durchführen">
                </form>

        <?php }

        changeValue(); ?>

        <a href="makeValue.php" class="button back">zurück</a>

</body>

</html>