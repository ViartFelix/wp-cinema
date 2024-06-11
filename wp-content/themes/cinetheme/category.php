<?php get_header(); ?>

<div class="page-category">
<?php
//prise de la catégorie actuelle
$category = get_term(get_query_var( 'cat' ));

//prise des articles de la catégorie pour les afficher
$query = new WP_Query([
    "category_name" => $category->slug,
    'posts_per_page' => -1,
]);
?>

<!--conteneur du contenu du thème-->
<section id="theme-container">
    <?php loadBySlug($category->slug); ?>
</section>

<?php
//Si des articles sont trouvés
if ($query->have_posts()) {
    //affichage
    while ($query->have_posts()): $query->the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_excerpt(); ?></div>

    <?php endwhile;
    wp_reset_postdata();
} else {
    // No posts found
    echo 'No posts found.';
}
?>
</div>

<?php
get_footer();
?>