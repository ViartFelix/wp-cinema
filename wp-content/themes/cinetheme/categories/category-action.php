<?php

$bg = image('action.png');
$bgColor = "#d92630";
$color = "#eee";

?>

<style>
    :root {
        --bg: url(<?= $bg ?>);
        --bg-color: <?= $bgColor ?>;
        --color: <?= $color ?>;
    }
</style>