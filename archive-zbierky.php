<?php get_header() ?>

<?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>

<div class="container pt-4 pb-5">
    <div class="row">


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

        <h1 class="mb-4"><?php the_field('zbierky', $custom_id) ?></h1>

        <div class="line-wrap">
            <div class="row line-inner">

                <?php $i=1; ?>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-xxl col-xl-4 col-md-6 line-grid">
                            <style>
                                .card-b<?php echo $i ?>:hover .card-img:before {
                                    background: <?php the_field('farba_pozadia_zbierky') ?>;
                                }
                            </style>

                            <section class="card-b card-b<?php echo $i ?>">
                                <div class="card-b-top">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php
                                        $img_url = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'rectangle_portrait_size');
                                        ?>
                                        <figure class="card-img">
                                            <img src="<?php echo $img_url ?>" width="400" height="820" alt="<?php the_title() ?>">
                                        </figure>
                                    <?php endif; ?>

                                    <h2 class="card-b-heading">
                                        <span class="bb-animated"><?php the_title() ?></span>
                                    </h2>
                                </div>

                                <a class="stretched-link" href="<?php the_permalink(); ?>"></a>
                            </section>
                        </div>
                        <?php $i++; ?>
                    <?php endwhile; ?>

                <?php else : ?>

                    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

                <?php endif; ?>

            </div><!-- / .row -->
        </div><!-- / .line-wrap -->

        <div class="d-flex justify-content-center pt-4">

            <?php numeric_posts_nav(); ?>

        </div>

    </div><!-- / .row -->
</div><!-- / .container -->



<?php get_footer() ?>
