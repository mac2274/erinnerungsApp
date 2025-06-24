<form method="POST">
    <input type="button" name="last_ernis" value="Letzen Erinnerungen sehen" id="showLastButton" class="fit">
</form>

<div id="lasts_erins">
    <?php require 'config/query.php' ?>
</div>

<script>
    let showLastErin = document.querySelector('#showLastButton');
    showLastErin.addEventListener('click', showLastsErin);

    function showLastsErin() {
        document.querySelector('#lasts_erins').style.display = "block";
        showLastButton.style.display = "none";
    }

</script>