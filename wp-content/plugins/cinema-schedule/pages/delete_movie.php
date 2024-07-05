<?php

global $wpdb;

$id = $_GET["id"];

$wpdb->delete(
    PLUGIN_TABLE_NAME,
    ["id" => $id],
);

redirect_homepage();