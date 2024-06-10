<?php

//Path absolu du dossier des assets et de dist
/** @var string Racine du dossier assets */
define("ASSET_DIR", get_template_directory_uri() . "/assets/");

/** @var string Dossier dist (build) de webpack */
const DIST_DIR = ASSET_DIR . "dist/";

/** @var string Dossier des images */
const IMG_DIR = ASSET_DIR . "img/";

/** @var string Dossier des fonts */
const FONT_DIR = ASSET_DIR . "fonts/";

