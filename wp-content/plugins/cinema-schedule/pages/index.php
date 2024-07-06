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

<form method="post" action="?page=<?= MENU_SLUG ?>&route=test_movie" data-el="main-form">
    <?php foreach ($allSchedules as $entry) :
        /** @var $id int L'id de l'entrée dans la BDD */
        $id = $entry->id;
        /** @var $targetSchedules array Les horaires */
        $targetSchedules = explode("|", $entry->schedule);
        ?>

        <div class="row" data-el="single-line" data-type="old" data-id="<?= $id ?>">
            <label class="code-input">
                <input type="text" name="old[<?= $id ?>][code]" value="<?= $entry->cine_code ?>" placeholder="Code">
            </label>

            <ul class="schedules-input">
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

    <button type="submit" class="button-primary">Enregistrer les modifications</button>
</form>

<template data-template="cp-n">
    <div class="row" data-el="single-line" data-type="new">
        <label class="code-input">
            <input type="text" data-item="code-input" placeholder="Code">
        </label>

        <ul class="schedules-input" data-item="schedule-input">
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

<script>
    /** Dernier ID des nouveaux éléments */
    window.lastNewId = 0;
    /** Template de copie d'un élément */
    const template = document.querySelector("[data-template='cp-n']");

    function addNewMovie() {
        //clone
        const clone = template.content.cloneNode(true).querySelector("div")
        console.log(clone)
    }

    addNewMovie()

    /*
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

     */
</script>