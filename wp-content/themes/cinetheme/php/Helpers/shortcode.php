<?php

/**
 * Handler de pour le shortcode "schedules"
 * @param $atts
 * @return void
 */
function displaySchedules( $atts )
{
    $atts = shortcode_atts( array(
        "name" => ""
    ), $atts, 'schedule' );

    return "bonsoir";
}

function hasShortCodes(): bool
{

    return false;
}