<?php

global $wpdb;

//infos dans le formulaire
$code = $_POST["code"];
$schedules = $_POST["horaires"];
$id = $_POST["id"] ?? $_GET["id"];
//tous les horaires en string
$allSchedules = implode(SCHEDULES_SEPARATOR, $schedules);

$wpdb->update(
    PLUGIN_TABLE_NAME,
    [
        "cine_code" => $code,
        "schedule" => $allSchedules,
    ],
    ["id" => $id]
);

redirect_homepage();
