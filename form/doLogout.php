<?php

session_start();
session_destroy();

echo 'Du hast dich erfolgreich ausgeloggt.';

header("Location: http://localhost:4080/01_erinnerungsApp/index.html");
?>

