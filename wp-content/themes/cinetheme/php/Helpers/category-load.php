<?php

/**
 * Charge un fichier dans le dossier `` categories/ `` via le nom donné
 * @param string $slug
 * @return void
 */
function loadBySlug(?string $slug): void
{
    if(isset($slug)) {
        $path = THEME_DIR . "/categories/category-" . $slug . ".php";

        //si le fichier existe
        if(file_exists($path)) {
            include $path;
        }
    }
}