<form method="POST">
    <input type="button" name="last_ernis" value="Letzen 10 Erinnerungen ansehen" id="lastsErinButton" class="fit">
</form>

<div id="lasts_erins">
    <?php require 'config/query.php' ?>
</div>

<script>
    let showLastErin = document.querySelector('#lastsErinButton');
    showLastErin.addEventListener('click', showLastsErin);

    function showLastsErin() {
        document.querySelector('#lasts_erins').style.display = "inline";
        showLastButton.style.display = "none";
    }

</script>