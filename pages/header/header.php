<p class="loggedIn">
    Willkommen zurück, <?php 
        if (isset($_SESSION['loginDone'])){
            echo $_SESSION['name'];
        } else {
            echo 'Du bist noch nicht eingeloggt.';
        }
    ?>
</p> 