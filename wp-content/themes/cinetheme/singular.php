<?php get_header(); ?>

<?php
$category = get_the_category()[0];
loadBySlug($category->slug);
?>

<section class="post-banner" style="--bg-img-banner: url(<?= get_the_post_thumbnail_url(null, 'full') ?>)">
    <div class="container fcc">
        <h1 class="black title"><?= the_title('','',false) ?></h1>
    </div>
</section>

<section class="pre-content">
    <div class="container">
        <h2 class="post-exerpt">
            <?= get_the_excerpt() ?>
        </h2>
    </div>
</section>

<section class="post-content">
    <div class="container">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer() ?>