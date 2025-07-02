<form method="POST">
    <input type="button" name="lasts_ernis" value="Letzen 10 Erinnerungen ansehen" id="lastsErinButton" class="fit">
</form>

<div id="last_erins">
    <?php require 'config/query.php' ?>
</div>

<script>
    let lastErinButton = document.querySelector('#lastsErinButton');
    lastErinButton.addEventListener('click', showLastsErin);

    function showLastsErin() {
        document.querySelector('#last_erins').style.display = "inline";
        lastErinButton.style.display = "none";
        document.querySelector('#justMade').style.display = "block"; 
    }

</script>