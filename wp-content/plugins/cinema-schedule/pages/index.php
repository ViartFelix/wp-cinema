<?php require_once PLUGIN_PATH . "db-utils.php" ?>


<h1>Horaires</h1>

<form method="post">
    <label>
        <select name="movie_select">
            <?php foreach (getAllMovies() as $index => $movie) : ?>
                <option value="<?= $movie->ID ?>"><?= $movie->post_title ?></option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>
        <input type="text" name="horaire[]">
    </label>
</form>

<hr>



<ul>
    <li>Task</li>
</ul>

