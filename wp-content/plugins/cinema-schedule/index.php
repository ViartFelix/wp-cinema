<?php

/*
Plugin Name: Cinema schedule
Description: Manage, and display cinema schedules
Author: Félix Viart
Version: 0.1.0
*/
global $wpdb;

/** Nom de la table du plugin */
define("PLUGIN_TABLE_NAME", ($wpdb->prefix . "cinema_schedule"));

/** Path du plugin absolu (NON SAFE) */
const PLUGIN_PATH = ABSPATH . "wp-content/plugins/cinema-schedule/";
/** URL du plugin */
define("PLUGIN_URL", plugin_dir_url(__FILE__));

/** Slug du menu */
const MENU_SLUG = "cinema-schedule";

/** Séparateur entre les différents horaires dans la BDD */
const SCHEDULES_SEPARATOR = "|";

require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
require_once __DIR__ . "/page-utils.php";

/**
 * Créer les tables nécessaires au bon fonctionnement du plugin
 * @return void
 */
function createTables(): void
{
    //DB de Wordpress
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    //ID = id unique de l'entrée
    //movie_id = ID du post avec l'horaire
    //schedule = les horaires
    $sql = "CREATE TABLE IF NOT EXISTS ". PLUGIN_TABLE_NAME ." (
        id bigint UNSIGNED NOT NULL AUTO_INCREMENT,
        cine_code text NOT NULL,
        schedule text NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);
}


/**
 * Ajoute une entrée dans le menu pour gérer les horaires
 * @return void
 */
function addSelfToMenu(): void
{
    add_menu_page(
        "Horaires films",
        "Horaires films",
        "manage_options",
        MENU_SLUG,
        'router',
        'dashicons-calendar-alt',
        5
    );
}

/**
 * Prends toutes les entrées de la table
 * @return array|object|stdClass[]
 */
function getAllCodes(): array|object
{
    global $wpdb;

    $sql = "SELECT * FROM " . PLUGIN_TABLE_NAME;
    return $wpdb->get_results($sql);
}

/**
 * Initialisation des scripts
 * @return void
 */
function initScripts(): void
{
    wp_enqueue_script(
        "main-cinema-schedule",
        PLUGIN_URL . 'js/main.js',
        [],
        '0.1.1',
        [
            "strategy" => "defer"
        ]
    );
}

//creation des tables dans BDD
register_activation_hook(__FILE__, 'createTables');
//ajout d'un item dans le menu
add_action('admin_menu', 'addSelfToMenu');
//initialisation des scripts
add_action("admin_enqueue_scripts", "initScripts");