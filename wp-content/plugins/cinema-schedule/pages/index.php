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

<div class="all-horaires">
    <?php foreach ($allSchedules as $index => $movie):
        $id = $movie->id;
        $targetSchedules = explode("|", $movie->schedule);
        ?>
        <form method="post" action="?page=<?= MENU_SLUG ?>&route=edit_movie" data-id="<?= $id ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="row">
                <div class="btn-actions">
                    <button type="button" class="button-primary" onclick="addSchedule(<?= $id ?>)">+</button>
                    <a href="?page=<?= MENU_SLUG ?>&route=delete_movie&id=<?= $id ?>" class="button-primary">-</a>
                </div>

                <label>
                    Code
                    <input type="text" name="code" required value="<?= $movie->cine_code ?>">
                </label>

                <div class="all-sch">
                    <?php foreach ($targetSchedules as $j => $schedule) : ?>
                        <label>
                            Horaire
                            <input type="text" name="horaires[]" value="<?= $schedule ?>">
                        </label>
                    <?php endforeach; ?>
                </div>

                <button type="submit" class="button-primary">OK</button>
            </div>
        </form>
    <?php endforeach; ?>
</div>

<hr>

<form action="?page=<?= MENU_SLUG ?>&route=add_movie" data-el="">

</form>

<div class="row" id="to-delete">
    <button type="button" class="button-primary" onclick="addLine()">Ajouter un film</button>
</div>

<template data-template="copy-new">
    <div data-id="">
        <div class="row">
            <div class="btn-actions">
                <button type="button" class="button-primary" onclick="addSchedule(-999)">+</button>
            </div>

            <label>
                Code
                <input type="text" name="code" required>
            </label>

            <button type="submit" class="button-primary">Ajouter</button>
        </div>
    </div>
</template>

<template data-template="add-schedule">
    <label>
        Horaire
        <input type="text" name="horaires[]">
    </label>
</template>

<script>
    const template = document.querySelector("[data-template='copy-new']");
    const hr = document.querySelector("[data-template='add-schedule']");
    const container = document.querySelector('.all-horaires')

    window.removeLine = (id) => {

    }

    window.addLine = () => {
        const clone = document.importNode(template.content, true);
        container.appendChild(clone);

        document.getElementById("to-delete").remove()
    }

    window.addSchedule = () => {
        const clone = document.importNode(hr.content, true);
        container.appendChild(clone);
    }
</script>