<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title(); ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body <?php body_class() ?>>
<?php wp_body_open(); ?>

<header id="main-header">
    <div class="header-container">
        <div class="nav">
            <?php
                wp_nav_menu([
                    'menu' => 'header-menu',
                    "container_class" => "container",
                ]);
            ?>
        </div>

        <div class="categories">
            <?php
                wp_nav_menu([
                    'menu' => 'categories-menu',
                    "container_class" => "container",
                ]);
            ?>
        </div>
    </div>

</header>

<main class="theme-open">

