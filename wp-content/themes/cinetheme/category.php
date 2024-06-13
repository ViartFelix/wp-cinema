<?php get_header(); ?>

<?php
//prise de la catégorie actuelle
$category = get_term(get_query_var( 'cat' ));
?>

<section class="hero-banner">
    <div class="container fcc">
        <div class="banner-contents">
            <h1 class="title">Catégorie <?= lcfirst($category->name) ?></h1>
            <h2>Tous nos articles</h2>
        </div>
    </div>

</section>

<div class="page-category main-container">
    <?php
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
    if ($query->have_posts()): ?>

        <?php while ($query->have_posts()):
            $query->the_post(); ?>
            <article class="single-article">
                <div class="article-container">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div><?php the_excerpt(); ?></div>
                </div>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    <?php
    else:
        // No posts found
        echo '<p>Aucun article trouvé sur ce thème.</p>';
    endif;
    ?>
</div>

<?php
get_footer();
?>