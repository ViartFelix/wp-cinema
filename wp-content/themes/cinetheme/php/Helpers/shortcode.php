<?php

/**
 * Redone les horaires du shortcode en tant que liste
 * @param $atts
 * @return string
 */
function displaySchedules( $atts ): string
{
    global $wpdb;

    //prise du shortcode du theme
    $atts = shortcode_atts(array("film" => ""), $atts, 'schedule');

    //code du film "clean"
    $code = sanitize_text_field($atts["film"]);

    if(hasShortCodes())
    {
        //prise horaires via le code
        $q = "SELECT * FROM " . PLUGIN_TABLE_NAME . " WHERE cine_code = '" . $code . "'";
        $res = $wpdb->get_results($q)[0];
        $arraySchedules = explode("|",$res->schedule);

        //retour des horaires entant qu'array
        return schedulesToHtml($arraySchedules);
    }

    return "";
}

/**
 * Regarde si le post actuel a le shortcode du plugin
 * @return bool
 */
function hasShortCodes(): bool
{
    global $post;

    return has_shortcode( ($post?->post_content ?? "no"), 'schedule' );
}

/**
 * Convertit
 * @param array $schedules
 * @return string
 */
function schedulesToHtml(array $schedules): string
{
    $final = "<section id='schedules-list'>";
    if(!empty($schedules)) {
        $final .= "
        <h3 class='shortcode-title'>Horaires</h3>
        <ul class='schedules-list'>";

        foreach ($schedules as $schedule) {
            $final .= "<li class='single-schedule'>" . $schedule . "</li>";
        }

        $final .= "</ul>";
    } else {
        $final .= "<h3 class='shortcode-title'>Aucun horaire.</h3>";
    }

    $final .= "</section>";

    return $final;
}