<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
$allCategories = get_the_category();
$categoryMain = $allCategories[0];
loadBySlug($categoryMain->slug);

$strCategories = implode(", ",array_map(function (WP_Term $category) {
    return $category->name;
}, $allCategories));

$author = get_the_author();
$date = get_the_date("d/m/Y");

do_shortcode('schedule');

?>

<section id="post-banner" style="--bg-img-banner: url(<?= get_the_post_thumbnail_url(null, 'full') ?>)">
    <div class="container fcc">
        <div class="text-contents">
            <h1 class="black title"><?= the_title('','',false) ?></h1>
        </div>
    </div>
</section>

<section id="pre-content">
    <div class="container">

        <table id="table-infos">
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Catégories</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Par <?= $author ?></td>
                    <td>Le <?= $date ?></td>
                    <td><?= $strCategories ?></td>
                </tr>
            </tbody>
        </table>

        <h2 class="post-excerpt">
            <?= get_the_excerpt() ?>
        </h2>
    </div>
</section>

<section id="content">
    <div class="container">
        <?php the_content(); ?>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer() ?>