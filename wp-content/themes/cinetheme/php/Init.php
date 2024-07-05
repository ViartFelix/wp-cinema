<?php

namespace php;

class Init
{
    public function __construct()
    {
        $this->wp();
    }

    private function wp()
    {
        // Ajouter la prise en charge des images mises en avant
        add_theme_support('post-thumbnails');
        // Ajouter automatiquement le titre du site dans l'en-tête du site
        add_theme_support('title-tag');
    }

    /**
     * Initialise les scripts
     * @param array $scripts
     * @return void
     */
    public function scripts(array $scripts): void
    {
        foreach ($scripts as $script) {
            wp_enqueue_script(
                md5($script),
                $script
            );
        }
    }

    /**
     * Initialise les styles
     * @param array $styles
     * @return void
     */
    public function styles(array $styles): void
    {
        foreach ($styles as $style) {
            wp_enqueue_style(
                md5($style),
                $style
            );
        }
    }

    /**
     * Inclue les helpers PHP
     * @param string|null $path Chemin du dossier contenant les ficheirs à charger
     * @return void
     */
    public function helpersPhp(?string $path = null): void
    {
        $folder = $path ?? get_template_directory() . '/php/Helpers';
        //prise de tous les fichiers dans le dossier helpers
        $fileAll = scandir($folder);
        //enlever . & ..
        $files = array_diff($fileAll, array('..', '.'));

        foreach ($files as $file) {
            include $folder."/".$file;
        }
    }

    /**
     * Register les supports de thème
     * @param array $supports
     * @return void
     */
    public function themeSupports(array $supports = []): void
    {
        foreach ($supports as $support) {
            add_theme_support($support);
        }
    }

    /**
     * Register les shortcodes
     * @return void
     */
    public function shortCodes()
    {
        add_shortcode("schedule", 'displaySchedules');
    }
}