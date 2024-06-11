<?php

$bg = image('western.png');
$bgColor = "#c87d55";
$color = "#111";

?>

<style>
    :root {
        --bg: url(<?= $bg ?>);
        --bg-color: <?= $bgColor ?>;
        --color: <?= $color ?>;
    }
</style>