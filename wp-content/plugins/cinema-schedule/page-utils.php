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

/**
 * Fonction qui vas décider de quelle page inclure ou non en fonction de la route
 * @return void
 */
function router(): void
{
    if(isset($_GET["route"]))
    {
        switch ($_GET["route"]) {
            case "edit_movie":
                displayPage('edit_movie');
                break;
            case "add_movie":
                displayPage("add_movie");
                break;
            case "delete_movie":
                displayPage('delete_movie');
                break;
            case "test_movie":
                displayPage('test_movie');
                break;
            default:
                display404();
        }
    } else {
        displayMainPage();
    }
}

function redirect_homepage() {
    //modification de l'url
    $plugin_file_url = plugins_url('index.php', __FILE__);
    wp_redirect($plugin_file_url);
    echo "<script>window.location.href='/wp-admin/admin.php?page=cinema-schedule'</script>";
    exit;
}
