<?php get_header(); ?>

<section class="hero-banner fcc" style="background-image: url(<?= image('bg-hero.webp') ?>)">
    <div class="container banner-content">
        <div class="hero-texts">
            <h1 class="title black"><?= get_bloginfo('name') ?></h1>
            <h2 class="title black"><i><?= get_bloginfo('description') ?></i></h2>
        </div>

        <img
            class="site-logo"
            src="<?= image('site-default.png') ?>"
            alt="<?= get_bloginfo('name') ?> logo"
        />
    </div>
</section>

<section class="last-articles">
    <?php
        $lastArticles = wp_get_recent_posts();
    ?>
    <h3 class="last-articles-title black title">Nos derniers articles</h3>

    <div class="last-articles-grid">

    </div>
</section>

<?php the_content(); ?>

<?php get_footer() ?>
