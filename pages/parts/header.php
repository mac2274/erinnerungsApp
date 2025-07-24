<p class="loggedIn">
    <?php 

        if (isset($_SESSION['loginDone']) == 1){
            echo 'Willkommen zurück, '.$_SESSION['name'].'!';

            // if (isset($_GET['make'])){
            //     require 'valueSubmit.php';
            // }
        } else {
            echo 'Du bist noch nicht eingeloggt.';
        }
    ?>
</p> 