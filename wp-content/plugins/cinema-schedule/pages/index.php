<h1>Horaires</h1>

<?php
$allSchedules = getAllCodes();
?>

<style>
    .row {
        display: flex;
        margin: 4rem 0;
    }

    .btn-actions  {
        margin-right: 2rem;
    }
</style>

<?php foreach ($allSchedules as $index => $movie):
    $id = $movie->id;
    $targetSchedules = explode("|", $movie->schedule);
?>
    <form method="post" action="?page=<?= MENU_SLUG ?>&route=edit_movie">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="row">
            <div class="btn-actions">
                <button type="button" class="button-primary">+</button>
                <a href="?page=<?= MENU_SLUG ?>&route=delete_movie&id=<?= $id ?>" class="button-primary">-</a>
            </div>

            <label>
                Code
                <input type="text" name="code" required value="<?= $movie->cine_code ?>">
            </label>

            <?php foreach ($targetSchedules as $j => $schedule) : ?>
                <label>
                    Horaire
                    <input type="text" name="horaires[]" value="<?= $schedule ?>">
                </label>
            <?php endforeach; ?>

            <button type="submit" class="button-primary">OK</button>
        </div>


    </form>
<?php endforeach; ?>

    <div class="row">
        <button type="button" class="button-primary">Ajouter un film</button>
    </div>

    <hr>


<script>
    window.removeLine = (id) => {

        alert("lkqzdklqdzkldz")
    }
</script>