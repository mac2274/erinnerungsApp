<form method="POST">
    <input type="button" name="last_ernis" value="Letzen Erinnerungen sehen" id="lastsButton" class="fit">
</form>

<div id="lasts_ergebnisse"></div>
<script>
    let lastsButton = document.querySelector('#lastsButton');
    lastsButton.addEventListener('click', showLasts);

    function showLasts() {
        fetch('././config/query.php')
            .then(response => response.text())
            .then(data => document.querySelector('#lasts_ergebnisse').innerHTML = data)
            
    }

</script>