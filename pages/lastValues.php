<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ErinnerungsApp Reloaded</title>

    <link rel="stylesheet" href="../styles/style.css" type="text/css">

</head>

<body>

    <?php require_once 'parts/header.php'; ?>

    <h1>ErinnerungsApp</h1>

    <h2>Bisher erstellte Erinnerungen</h2>

    <?php require_once '../config/lib.php';
    seeLastFunction();
    $_SESSION['seeLast'] = true;
    ?>

    <a href="makeValue.php" class="button back">zurück</a>

</body>

</html>