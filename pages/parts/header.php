<p class="loggedIn">
    <?php 
    session_start();

        if (isset($_SESSION['loginDone']) == 1){
            echo 'Willkommen zurück, '.$_SESSION['name'].'!';
        } else {
            echo 'Du bist noch nicht eingeloggt.';
        }
    ?>
</p> 