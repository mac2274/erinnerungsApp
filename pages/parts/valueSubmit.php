<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mk_submit'])) {
    if (isset($_SESSION['valueMade']) === 1) {
        echo 'Du hast eine Erinnerung erstellt!';
    }
} else {
    echo '<p> Erstelle deine Erinnerungen hier, damit die ErinnerungsApp dir in deinem Alltag immer helfen kann.</p>';
}