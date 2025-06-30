<form method="POST" > 
    <input type="button" name="new_erin" value="Neue Erinnerung erstellen" id="newErinButton" class="fit">
</form>

<div id="new_erin"></div>
    <?php require 'pages/mk_value.php'?>
</div>

<script>

    let newErinButton = document.querySelector('#newErinButton');
    newErinButton.addEventListener('click', makeNewErin);
    function makeNewErin() {
        document.querySelector('#new_erin').style.display = "inline";
        newErinButton.style.display = 'none';
    }
</script>