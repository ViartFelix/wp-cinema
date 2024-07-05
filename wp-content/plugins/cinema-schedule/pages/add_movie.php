<?php

global $wpdb;
//prise code & horaires du post
$code = $_POST["code"];
$schedules = $_POST["schedules"];

//check si des données existent en base avec le code
$selectCodes = "SELECT * FROM " . PLUGIN_TABLE_NAME . " WHERE cine_code = '$code'";
$res = $wpdb->get_results($selectCodes);
//mise en string des horaires
$allSchedules = implode(SCHEDULES_SEPARATOR, $schedules);

//si une entrée existe
if(!empty($res)){
    //alors updater l'entrée
    $id = $res[0]->id;

    $wpdb->update(
        PLUGIN_TABLE_NAME,
        [
            "schedule" => $allSchedules,
        ],
        ["id" => $id]
    );
} else {
    //sinon, on ajoute une entrée
    $wpdb->insert(
        PLUGIN_TABLE_NAME,
        [
            "cine_code" => $code,
            "schedule" => $allSchedules,
        ]
    );
}


//vérification de la requête post pour éviter qu'on puisse direct appeler le fichier
redirect_homepage();

?>