<?php

session_start();
session_destroy();

echo 'Du hast dich erfolgreich ausgeloggt.';

header("Location: ../index.html");
?>

