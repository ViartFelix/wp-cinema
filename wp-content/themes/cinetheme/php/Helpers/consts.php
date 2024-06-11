<?php
/** Path du thème actuel (NON SAFE) */
define("THEME_DIR", get_template_directory());
/** Url du thème */
define("THEME_URL", get_template_directory_uri());

//Path absolu du dossier des assets et de dist
/** @var string Racine du dossier assets */
const ASSET_DIR = THEME_URL . "/assets/";

/** @var string Dossier dist (build) de webpack */
const DIST_DIR = ASSET_DIR . "dist/";

/** @var string Dossier des images */
const IMG_DIR = ASSET_DIR . "img/";

/** @var string Dossier des fonts */
const FONT_DIR = ASSET_DIR . "fonts/";
