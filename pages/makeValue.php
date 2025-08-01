<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erinnerungen erstellen</title>

    <link rel="stylesheet" href="../styles/style.css" type="text/css">

</head>

<body>
    <!-- header line -->
    <?php require 'parts/header.php'; ?>

    <h1>Erinnerungs-Helper</h1>

    <?php if (isset($_GET['make'])) {
        require 'parts/valueSubmit.php';
    } ?>

    <form method="POST" action="../form/doMake.php">
        <label for="makeValue">Erinnerung erstellen:
            <input type="text" name="mk_value" id="makeValue" placeholder="neue Erinnerung hier" class="multiLines">
        </label>
        <label for="makeDetails">mehr Details dazu:
            <textarea type="text" name="mk_details" id="makeDetails" placeholder="weitere Infos hier"
                class="multiLines"></textarea>
        </label>
        <label for="status"><input type="hidden" name="status" id="status" value="2"></label>
        <label for="changed"><input type="hidden" name="changed" id="changed"></label>
        <label for="u_id"><input type="hidden" name="u_id" id="u_id" value="1"></label>
        <label for="deadline">Deadline:
            <input type="date" name="mk_deadline" id="deadline" placeholder="dd.mm.yyy">
        </label>
        <input type="submit" value="erstellen" name="mk_submit">
    </form>

    <div id="viewValues">
        <a href="allValues.php" id="seeAll" class="button">Letzten 20 Erinnerungen ansehen</a>
        <a href="searchValue.php" id="searchVAlue" class="button">Erinnerungen suchen</a>
        <a href="change.php" id="changeValue" class="button">Erinnerungen ändern</a>
        <a href="delete.php" id="deleteValue" class="button">Erinnerungen löschen</a>
    </div>
    <input type="submit" id="logoutButton" value="Logout" name="logoutButton" class="button logoutBut">

    <script>
        document.querySelector('#logoutButton').addEventListener('click', logoutFunction);

        function logoutFunction(e) {
            e.preventDefault();

            window.open("../form/doLogout.php", '_self');
        }

    </script>
</body>

</html>