<form method="GET">
    <input type="button" name="back" value="ZURÜCK" id="backButton" class="fit">
</form>

<div id="show_index">
    <?php  // back-Button ?>
</div>

<script>
    let backButton = document.querySelector('#backButton');
    backButton.addEventListener('click', backToIndex);

    function backToIndex() {
        backButton.style.display = "none";
        document.querySelector('#show_index').style.display ="block";
    }

</script>