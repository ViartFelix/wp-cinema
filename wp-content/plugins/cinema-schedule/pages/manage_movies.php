<?php

global $wpdb;

/** @var $rawIDs string[] Tous les IDs des horaires dans la BDD */
$rawIDs = $wpdb->get_col(
    "SELECT id FROM " . PLUGIN_TABLE_NAME
);
/** @var $allIDs int[] Tous les IDs des horaires dans la BDD */
$allIDs = array_map(function ($val) {
    return (int) $val;
}, $rawIDs);


if(!empty($_POST["old"]))
{
    //Entrées en base présentes dans le formulaire
    $editedIDs = [];
    //itérations dans le formulaire
    foreach ($_POST["old"] as $id => $caracts) {
        editOldItem($id, $caracts);
        $editedIDs[] = $id;
    }
    //IDs à supprimer
    $toDelete = array_diff($allIDs, $editedIDs);
    deleteOldItems($toDelete);
} else {
    //si tous les films on été supprimés, alors on supprime toutes les entrées en BDD
    deleteOldItems($allIDs);
}

if(!empty($_POST["new"]))
{
    foreach ($_POST["new"] as $newKey => $caracts) {
        addNewItem($caracts);
    }
}

redirect_homepage();

/**
 * Ajoute un item dans la BDD
 * @param array $car Caractéristiques de la ressource
 * @return void
 */
function addNewItem(array $car): void
{
    global $wpdb;

    if(!empty($car["code"])) {
        $wpdb->insert(
            PLUGIN_TABLE_NAME,
            [
                "cine_code" => $car["code"],
                "schedule" => convertSchedules($car["schedules"])
            ]
        );
    }
}

/**
 * Edite un item dans la BDD
 * @param int $id ID de la ressource à éditer
 * @param array $car Caractéristiques de la ressource
 * @return void
 */
function editOldItem(int $id, array $car): void
{
    global $wpdb;

    if(!empty($car["code"])) {
        $wpdb->update(
            PLUGIN_TABLE_NAME,
            [
                "cine_code" => $car["code"],
                "schedule" => convertSchedules($car["schedules"]),
            ],
            ["id" => $id],
        );
    }
}

/**
 * Supprime les données d'un item avec son id
 * @param array $toDeleteIDs
 * @return void
 */
function deleteOldItems(array $toDeleteIDs): void
{
    global $wpdb;

    foreach ($toDeleteIDs as $id) {
        $wpdb->delete(
            PLUGIN_TABLE_NAME,
            ["id" => $id],
        );
    }
}

/**
 * Convertis les horaires données pour les metres dans la BDD
 * @param array $allSchedules Tous les horaires
 * @return string
 */
function convertSchedules(array $allSchedules): string
{
    $filteredSchedules = array_filter($allSchedules, function ($val) {
        return !empty($val);
    });

    return implode(SCHEDULES_SEPARATOR, $filteredSchedules);
}

