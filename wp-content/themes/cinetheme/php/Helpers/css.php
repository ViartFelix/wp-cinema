<?php

/**
 * Prends l'array donné pour les mettre en variables css globales. <br>
 * L'array doit être sous forme de clef-valeur
 * @param array $css
 * @return void
 */
function toGlobalCss(array $css): void
{
    echo "<style>";
    echo ":root {";
    foreach ($css as $property => $value) {
        $withDashes = preg_replace("/(?<=[a-zA-Z])(?=[A-Z])/", "-", $property);
        $fullUnderscore = strtolower($withDashes);

        echo "--" . $fullUnderscore . ": " . $value . ";";
    }
    echo "}";
    echo "</style>";
}

/**
 * Retourne les classes css à appliquer sur un article dans la vue des articles (single-article)
 * @param WP_Query $post Le poste dans la boucle
 * @param string $base_class La classe de base appliquée dans tous les cas
 * @return string
 */
function getSingleArticleClasses(WP_Query $post, string $base_class = "single-article"): string
{

    $return = [$base_class];

    try {
        if(has_post_thumbnail( $post->ID )) {
            $return[] = "has-thumbnail";
        }
    } catch (Exception $e) {
        $return = [$base_class];
    } finally {
        return implode(" ", $return);
    }
}