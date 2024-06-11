<?php

$bg = image('comedy.png');
$bgColor = "#f9c721";
$color = "#111";

?>

<style>
    :root {
        --bg: url(<?= $bg ?>);
        --bg-color: <?= $bgColor ?>;
        --color: <?= $color ?>;
    }
</style>