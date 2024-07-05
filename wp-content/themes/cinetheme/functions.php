<?php

require get_template_directory() . '/php/Init.php';

use php\Init;

$init = new Init();
$init->helpersPhp();


/**
 * Initialise les styles et scripts.
 * @return void
 */
function initAssets(): void
{
    global $init;

    $init->scripts([
        DIST_DIR . 'main.bundle.js',
    ]);

    $init->styles([
        DIST_DIR . 'index.bundle.css',
    ]);
}


function initThemeSupports(): void
{
    global $init;

    $init->themeSupports([
        "title-tag",
        "post-thumbnails",
        "automatic-feed-links",
        "custom-logo"
    ]);
}

add_action('init', 'initAssets');
add_action('after_setup_theme', 'initThemeSupports');

$init->shortCodes();

//pas de ul ni de li dans les menus.
//add_filter('wp_nav_menu', 'removeUls', 10, 2);