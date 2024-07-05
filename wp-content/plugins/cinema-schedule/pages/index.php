<h1>Horaires</h1>

<form method="post" action="?page=<?= MENU_SLUG ?>&route=do_post">
    <label>
        <input type="text" name="code" required>
    </label>

    <label>
        <input type="text" name="horaires[]">
    </label>

    <button type="submit" class="button-primary">Enregistrer</button>
</form>

<hr>

<script>

</script>