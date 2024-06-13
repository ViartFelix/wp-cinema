<?php

/**
 * Prends l'array donné pour les mettre en variables css globales. <br>
 * L'array doit être sous forme de clef-valeur
 * @param array $css
 * @return void
 */
function toGlobalCss(array $css): void
{
    echo "<style>";
    echo ":root {";
    foreach ($css as $property => $value) {
        $withDashes = preg_replace("/(?<=[a-zA-Z])(?=[A-Z])/", "-", $property);
        $fullUnderscore = strtolower($withDashes);

        echo "--" . $fullUnderscore . ": " . $value . ";";
    }
    echo "}";
    echo "</style>";
}