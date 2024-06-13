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
    <?php $lastArticles = wp_get_recent_posts([], OBJECT); ?>
    <div class="container">
        <h3 class="last-articles-title black title">Nos derniers articles</h3>

        <ul class="last-articles-grid">
            <?php if($lastArticles): ?>
                <?php foreach ($lastArticles as $article): ?>

                    <?php
                    $hasImage = has_post_thumbnail( $article->ID );
                    $thumbnail = $hasImage
                        ? get_the_post_thumbnail_url($article->ID)
                        : "";

                    $title = $article->post_title;
                    $excerpt = $article->post_excerpt;

                    $href = $article->guid;

                    $author = get_the_author_meta( 'display_name', (int)$article->post_author );
                    $rawDate = $article->post_date;
                    $date = str_replace("-","/",(new \DateTimeImmutable($rawDate))->format('d-m-Y'));
                    ?>

                    <article class="single-article <?= $hasImage ? 'has-thumbnail' : 'no-thumbnail' ?>">
                        <a class="single-article-href" href="<?= $href ?>">
                            <?php if ($hasImage && $thumbnail): ?>
                                <figure class="thumbnail-container" style="--article-bg: url(<?= $thumbnail ?>)">
                                    <img src="<?= $thumbnail ?>" alt="Thumbnail of <?= $title ?>"/>
                                </figure>
                            <?php endif; ?>

                            <div class="single-article-texts">
                                <div class="single-article-title">
                                    <h3><?= $title ?></h3>
                                    <i><?= $excerpt ?></i>
                                </div>

                                <hr />

                                <p class="article-author-date">
                                    Par <?= $author ?> le <?= $date ?>
                                </p>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</section>

<?php the_content(); ?>

<?php get_footer() ?>
