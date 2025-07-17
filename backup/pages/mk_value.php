<div class="wrapper">
    <h2>Erstelle eine neue Erinnerung</h2>

    <form method="POST">
        <div class="col_2">
            <label for="mk_value" name="lbl_mk_value">Hier eine neue Erinnerung erstellen</label>
            <input type="text" id="mk_value" name="mk_value" required>
        </div>

        <div class="col_2">
            <label for="mk_description">Detaillierte Beschreibung</label>
            <textarea name="mk_description" id="mk_description" class="showcase"></textarea>
        </div>

        <div class="col_2">
            <input type="hidden" name="status" value="2">
            <input type="hidden" name="changed">
            <input type="hidden" name="u_id" value="1">
        </div>

        <div class="col_2 deadline_col">
            <div class="col_50">
                <label for="mk_deadline" name="lbl_mk_deadline">Frist</label>
                <input type="date" name="mk_deadline" id="mk_deadline" required>
            </div>
            <div class="col_50">
                <input type="submit" name="mk_submit" value="Erstellen">
            </div>
        </div>
    </form>
</div>

