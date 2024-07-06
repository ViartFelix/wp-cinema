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

<form method="post" action="?page=<?= MENU_SLUG ?>&route=manage_movies" data-el="main-form">
    <div id="cine-schedule-form-contents">
        <?php foreach ($allSchedules as $entry) :
            /** @var $id int L'id de l'entrée dans la BDD */
            $id = $entry->id;
            /** @var $targetSchedules array Les horaires */
            $targetSchedules = explode("|", $entry->schedule);
            ?>

            <div class="row" data-el="single-line" data-type="old" data-id="<?= $id ?>">
                <div class="line-btns">
                    <button type="button" class="button-secondary" onclick="addNewSchedule(<?= $id ?>,'old')">+</button>
                    <button type="button" class="button-secondary" onclick="deleteMovie(<?= $id ?>,'old')">-</button>
                </div>


                <label class="code-input">
                    <input data-el="single-line-code" type="text" name="old[<?= $id ?>][code]" value="<?= $entry->cine_code ?>" placeholder="Code">
                </label>

                <ul class="schedules-input" data-el="all-schedules">
                    <?php foreach ($targetSchedules as $index => $schedule): ?>
                        <li class="single-schedule">
                            <label>
                                <input type="text" placeholder="Horaire" name="old[<?= $id ?>][schedules][]" value="<?= $schedule ?>">
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <button type="submit" class="button-primary">Enregistrer les modifications</button>
        <button type="button" class="button-secondary" onclick="addNewMovie()">Ajouter un film</button>
    </div>
</form>

<template data-template="cp-n">
    <div class="row" data-el="single-line" data-type="new">
        <div class="line-btns">
            <button type="button" data-el="add-schedule-btn" class="button-secondary">+</button>
            <button type="button" data-el="remove-movie-btn" class="button-secondary">-</button>
        </div>

        <label class="code-input">
            <input type="text" data-item="code-input" placeholder="Code">
        </label>

        <ul class="schedules-input" data-el="all-schedules">
            <li class="single-schedule">
                <label>
                    <input type="text" data-item="single-schedule-input" placeholder="Horaire">
                </label>
            </li>
        </ul>
    </div>
</template>

<template data-template="add-schedule">
    <li class="single-schedule">
        <label>
            <input type="text" data-item="single-schedule-input" placeholder="Horaire">
        </label>
    </li>
</template>