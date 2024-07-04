<?php

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
        "cinema-schedule",
        'displayMainPage',
        'dashicons-calendar-alt',
        5
    );
}