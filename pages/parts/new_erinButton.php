<form method="POST" > 
    <input type="button" name="newErin" value="Neue Erinnerung erstellen" id="newErinButton" class="fit">
</form>

<div id="new_erin">
    <?php require 'pages/mk_value.php';
    ?>
</div>

<script>

    let newErinButton = document.querySelector('#newErinButton');
    newErinButton.addEventListener('click', makeNewErin);
    
    function makeNewErin() {
        document.querySelector('#new_erin').style.display = "block";
        newErinButton.style.display = 'none';
        document.querySelector('#justMade').style.display = "block";
    }
</script>