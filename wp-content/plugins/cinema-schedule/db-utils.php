<?php

require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

/**
 * Créer les tables nécessaires au bon fonctionnement du plugin
 * @return void
 */
function createTables(): void
{
    //DB de Wordpress
    global $wpdb;

    //table avec tous les liens
    $prefix = $wpdb->prefix;
    $mainTable = $prefix . PLUGIN_TABLE_NAME;
    $charset_collate = $wpdb->get_charset_collate();

    //ID = id unique de l'entrée
    //movie_id = ID du post avec l'horaire
    //schedule = l'horaire lui-même
    $sql = "CREATE TABLE IF NOT EXISTS $mainTable (
        id bigint UNSIGNED NOT NULL AUTO_INCREMENT,
        movie_id bigint UNSIGNED NOT NULL,
        schedule text NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (movie_id) REFERENCES " . $prefix . "posts (id)
    ) $charset_collate;";

    dbDelta($sql);
}