<?php

$bg = image('documentary.png');
$bgColor = "#111";
$color = "#eee";

?>

<style>
    :root {
        --bg: url(<?= $bg ?>);
        --bg-color: <?= $bgColor ?>;
        --color: <?= $color ?>;
    }
</style>