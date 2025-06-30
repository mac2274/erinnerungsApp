<form method="POST" > 
    <input type="button" name="nwe_erni" value="Neue Erinnerung erstellen" id="newErinButton" class="fit">
</form>

<div id="newErin"></div>
    <?php require 'pages/mk_value.php'?>
</div>

<script>

    let makeNewErin = document.querySelector('#newErinButton').addEventListener('click', makeNewErin);
    function makeNewErin() {
        document.querySelector('#newErin').style.display = "inline";
        makeNewErin.style.display = 'none';
    }
</script>