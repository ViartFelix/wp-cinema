<?php get_header(); ?>

<?php
//prise de la catégorie actuelle
$category = get_term(get_query_var( 'cat' ));

//prise des articles de la catégorie pour les afficher
$query = new WP_Query([
    "category_name" => $category->slug,
    'posts_per_page' => -1,
]);
//classe du conteneur des articles
$articlesClass = $query->have_posts() ? "have-posts" : "no-posts";
//nombre d'articles
$articlesNum = $query->have_posts() ? sizeof($query->get_posts()) : 0;
//si la page a plus d'un article
$strPluralArticles = $articlesNum > 1 ? "s" : "";

?>

<section class="hero-banner">
    <div class="container fcc">
        <div class="banner-contents">
            <h1 class="title">Catégorie <?= lcfirst($category->name) ?></h1>
            <!--<h2>Tous nos articles</h2>-->
        </div>
    </div>
</section>

<div class="page-category main-container">
    <div class="container">
        <section class="all-articles <?= $articlesClass ?>">
            <?php //Si des articles sont trouvés
            if ($query->have_posts()): ?>

                <h3 class="all-articles-title"><?= $articlesNum ?> article<?= $strPluralArticles ?> disponible<?= $strPluralArticles ?></h3>

                <ul class="all-articles-grid">
                    <?php while ($query->have_posts()): $query->the_post(); ?>

                        <article class="<?= getSingleArticleClasses($query) ?>">
                            <?php
                                $hasImage = has_post_thumbnail( $query->ID );
                                $thumbnail = $hasImage
                                    ? get_the_post_thumbnail_url($query->ID)
                                    : "";

                                $author = get_the_author();
                                $date = get_the_date("d/m/Y");
                            ?>

                            <a class="single-article-href" href="<?php the_permalink(); ?>">
                                <?php if ($hasImage && $thumbnail): ?>
                                    <figure class="thumbnail-container" style="--article-bg: url(<?= $thumbnail ?>)">
                                        <img src="<?= $thumbnail ?>" alt="Thumbnail of <?php the_title() ?>"/>
                                    </figure>
                                <?php endif; ?>

                                <div class="single-article-texts">
                                    <div class="single-article-title">
                                        <h3><?php the_title(); ?></h3>
                                        <i><?php the_excerpt(); ?></i>
                                    </div>

                                    <hr />

                                    <p class="article-author-date">
                                        Par <?= $author ?> le <?= $date ?>
                                    </p>
                                </div>
                            </a>

                        </article>

                    <?php endwhile; ?>
                </ul>

                <?php wp_reset_postdata(); ?>

            <?php else: ?>
                <!-- No posts ? -->
                <h3>Aucun article n'a été trouvé sur cette catégorie.</h3>
            <?php endif; ?>
        </section>
    </div>
    <!--conteneur du contenu du thème-->
    <section id="theme-container">
        <?php loadBySlug($category->slug); ?>
    </section>
</div>

<?php
get_footer();
?>