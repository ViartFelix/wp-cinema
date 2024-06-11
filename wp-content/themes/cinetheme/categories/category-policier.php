<?php

$bg = image('policier.png');
$bgColor = "#5394df";
$color = "#eee";

?>

<style>
    :root {
        --bg: url(<?= $bg ?>);
        --bg-color: <?= $bgColor ?>;
        --color: <?= $color ?>;
    }
</style>