<?php get_header() ?>

<?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>

<div class="container py-4">

    <?php

    $mnsk_languages = apply_filters('wpml_active_languages', null, 'orderby=id&order=desc');

    if (!empty($mnsk_languages)) {

        foreach ($mnsk_languages as $l) {
            if ($l['tag'] === 'en' && $l['active']) {
                $custom_id = 332;
            } else if ($l['tag'] === 'sk' && $l['active']) {
                $custom_id = 17;
            }
        }
    }
    ?>

    <h2 class="h1 mb-3"><?php the_field('aktualne_clanky', $custom_id) ?></h2>

    <div class="row">



        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="col-xl-3 col-md-6 line-grid">
                    <section class="card-blog">


                        <?php if (has_post_thumbnail()) : ?>
                            <?php
                            $img_url = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'thumbnail');
                            ?>
                            <img src="<?php echo $img_url; ?>" width="600" height="400" alt="<?php the_title(); ?>">
                        <?php endif; ?>

                        <h3 class="h4 card-blog-heading bb-animated"><?php the_title() ?></h3>

                        <p class="card-blog-desc"><strong><?php the_time('j.n.Y') ?></strong> <?php echo wp_trim_words(get_the_excerpt(), 20); ?> </p>

                        <a class="stretched-link" href="<?php the_permalink(); ?>"></a>
                    </section>
                </div>


            <?php endwhile; ?>


            <div class="d-flex justify-content-center">

                <?php numeric_posts_nav(); ?>

            </div>
    </div><!-- / .container -->


<?php else : ?>

    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>


</div>
</div>








<?php get_footer() ?>
