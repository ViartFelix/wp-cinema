<?php

//Ici des fonctions qui représentent des pages, avec des actions, etc.

function displayPage(string $pageName): void
{
    echo "<div class='wrap'>";

    $pagePath = ABSPATH . "wp-content/plugins/cinema-schedule/pages/" . $pageName . ".php";
    //si la page existe dans le dossier 'pages'
    if(file_exists($pagePath)) {
        //alors on l'affiche
        include_once($pagePath);
    } else {
        //sinon, afficher une 404
        display404();
    }

    echo "</div>";
}

/**
 * Affiche la page principale du plugin.
 * @return void
 */
function displayMainPage(): void
{
    displayPage('index');
}

function display404(): void
{
    echo "<h1>404</h1>";
}