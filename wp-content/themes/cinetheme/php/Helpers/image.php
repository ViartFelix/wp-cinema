<?php


/**
 * Donne le lien complet d'une image dans le thème
 * @param string $src Source à partir du dossier /assets/img/ du thème
 * @return string Le lien complet
 */
function image(string $src): string
{
    return IMG_DIR . trim_slash($src);
}

/**
 * Donne le lien complet d'un asset dans le thème
 * @param string $src Source à partir du dossier /assets/ du thème
 * @return string Le lien complet
 */
function asset(string $src): string
{
    return ASSET_DIR . trim_slash($src);
}

/**
 * Vas retourner un string sans slash au début
 * @param string $trim Le path du fichier à trimmer
 * @return string Le path du fichier trimmé
 */
function trim_slash(string $trim): string
{
    $trim = trim($trim);

    //si le string commence par un slash, alors on l'enlève
    if (str_starts_with($trim, '/')) {
        //taille du string
        $lenStr = strlen($trim);
        $trim = substr($trim, 1, $lenStr);
    }

    return $trim;
}


/**
 * Supprime les \<ul> et \<li> d'un string
 * @param string $nav_menu
 * @param $args
 * @return string
 */
function removeUls(string $nav_menu, $args): string
{
    $nav_menu = preg_replace('/<ul[^>]*>/', '', $nav_menu);
    $nav_menu = preg_replace('/<\/ul>/', '', $nav_menu);
    $nav_menu = preg_replace('/<li[^>]*>/', '', $nav_menu);
    $nav_menu = preg_replace('/<\/li>/', '', $nav_menu);

    // Apply classes to <a> tags
    $nav_menu = preg_replace('/(<a[^>]+)>/', '$1 class="item">', $nav_menu);

    return '<nav class="main-nav">' . $nav_menu . '</nav>';
}