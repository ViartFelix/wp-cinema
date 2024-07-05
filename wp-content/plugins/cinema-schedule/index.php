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
 * Fonction qui vas décider de quelle page inclure ou non en fonction de la route
 * @return void
 */
function router(): void
{
    if(isset($_GET["route"]))
    {
        switch ($_GET["route"]) {
            case "do_post":
                displayPage('do_post');
                break;
            default:
                display404();
        }
    } else {
        displayMainPage();
    }
}

/**
 * Prends toutes les entrées
 * @return void
 */
function getAllCodes()
{

}

//creation des tables dans BDD
register_activation_hook(__FILE__, 'createTables');
//ajout d'un item dans le menu
add_action('admin_menu', 'addSelfToMenu');