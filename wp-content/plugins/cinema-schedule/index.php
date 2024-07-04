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
const PLUGIN_PATH = ABSPATH . "wp-content/plugins/cinema-schedule/";

require_once __DIR__ . "/page-utils.php";
require_once __DIR__ . "/db-utils.php";
require_once __DIR__ . "/menu-utils.php";

//creation des tables dans BDD
register_activation_hook(__FILE__, 'createTables');
//ajout d'un item dans le menu
add_action('admin_menu', 'addSelfToMenu');