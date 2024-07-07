<h1>Horaires</h1>

<?php
$allSchedules = getAllCodes();
?>

<form id="main-schedule-form" method="post" action="?page=<?= MENU_SLUG ?>&route=manage_movies" data-el="main-form">
    <div id="cine-schedule-form-contents">
        <?php foreach ($allSchedules as $entry) :
            /** @var $id int L'id de l'entrée dans la BDD */
            $id = $entry->id;
            /** @var $targetSchedules array Les horaires */
            $targetSchedules = explode("|", $entry->schedule);
            ?>

            <div class="single-entry" data-el="single-line" data-type="old" data-id="<?= $id ?>">
                <div class="entry-container">
                    <div class="line-btns">
                        <button type="button" class="button-secondary" onclick="addNewSchedule(<?= $id ?>,'old')">
                            <span class="dashicons dashicons-plus"></span>
                            <span class="dashicons dashicons-calendar-alt"></span>
                        </button>
                        <button type="button" class="button-secondary" onclick="deleteMovie(<?= $id ?>,'old')">
                            <span class="dashicons dashicons-trash"></span>
                        </button>
                    </div>

                    <label class="code-input">
                    <span class="target-label">
                        Code
                    </span>
                        <input data-el="single-line-code" type="text" name="old[<?= $id ?>][code]" value="<?= $entry->cine_code ?>">
                    </label>

                    <hr>

                    <div class="schedules-input" data-el="all-schedules">
                        <?php foreach ($targetSchedules as $index => $schedule): ?>
                            <label class="single-schedule">
                                <input type="text" placeholder="Horaire" name="old[<?= $id ?>][schedules][]" value="<?= $schedule ?>">
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div id="schedules-actions">
        <button type="submit" class="button-primary">
            <span class="dashicons dashicons-saved"></span>
            Enregistrer les modifications
        </button>

        <button type="button" class="button-secondary" onclick="addNewMovie()">
            <span class="dashicons dashicons-plus"></span>
            Ajouter un film
        </button>
    </div>
</form>

<template data-template="cp-n">
    <div class="single-entry" data-el="single-line" data-type="new">
        <div class="entry-container">
            <div class="line-btns">
                <button type="button" data-el="add-schedule-btn" class="button-secondary">
                    <span class="dashicons dashicons-plus"></span>
                    <span class="dashicons dashicons-calendar-alt"></span>
                </button>

                <button type="button" data-el="remove-movie-btn" class="button-secondary">
                    <span class="dashicons dashicons-trash"></span>
                </button>
            </div>

            <label class="code-input">
            <span class="target-label">
                Code
            </span>
                <input type="text" data-item="code-input">
            </label>

            <hr>

            <div class="schedules-input" data-el="all-schedules">
                <label class="single-schedule">
                    <input type="text" data-item="single-schedule-input" placeholder="Horaire">
                </label>
            </div>
        </div>
    </div>
</template>

<template data-template="add-schedule">
    <label class="single-schedule">
        <input type="text" data-item="single-schedule-input" placeholder="Horaire">
    </label>
</template>