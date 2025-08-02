<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ändere eine Erinnerung</title>

        <link rel="stylesheet" href="../styles/style.css" type="text/css">

</head>

<body>
        <h1>ErinnerungsApp</h1>

        <h2>Änderung einer Erinnerung</h2>

        <p>Suche die entsprechende Erinnerung:</p>
        <?php require 'cdoChange.php' ?>
        <a href="makeValue.php" class="button back">zurück</a>


        <form method="GET" action="">

                <label for="changeValue">
                        <input type="text" name="changeValue" id="changeValue">
                </label>

                <input type="submit" value="Erinnerung ändern" name="changeSubmit">
        </form>
        <input type="submit" id="logoutButton" value="Logout" name="logoutButton" class="button logoutBut">

</body>

</html>