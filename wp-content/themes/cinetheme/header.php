<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title(); ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
<?php wp_body_open(); ?>

<header style="margin-top: 3rem">
    <div class="nav">
        <?php
        wp_nav_menu([
            'menu' => 'header-menu',
        ]);
        ?>
    </div>

    <div class="categories">
        <?php
        wp_nav_menu([
            'menu' => 'categories-menu',
        ]);
        ?>
    </div>
</header>

<main class="theme-open">

