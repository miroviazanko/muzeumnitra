<?php get_header() ?>

<?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>

<div class="container pt-4 pb-5">
    <div class="row">


        <article class="col-lg-8">

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

            <h1><?php _e('Výstavy', 'mnsk') ?></h1>

            <div class="accordion accordion-archive" id="accordionArchive">


                <?php $i=1; ?>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="aa<?php echo $i ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc<?php echo $i ?>" aria-expanded="false" aria-controls="acc<?php echo $i ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php
                                        $img_url = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'square_size');
                                        ?>

                                        <figure class="accordion-img">
                                            <img class="rounded-circle" src="<?php echo $img_url; ?>" width="320" height="320" alt="<?php the_title() ?>">
                                        </figure>

                                    <?php endif ?>

                                    <div class="accordion-meta">
                                        <span class="h2 mb-1"><?php the_title() ?></span>
                                        <strong class="meta-desc"><?php the_field('datum_vystavy') ?> | <?php the_field('miesto_vystavy') ?></strong>
                                    </div>
                                </button>
                            </h2><!-- / .accordion-header -->

                            <div id="acc<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="aa<?php echo $i ?>" data-bs-parent="#accordionArchive">
                                <div class="accordion-body">
                                    <p><?php the_field('popis_vystavy') ?></p>

                                    <a href="<?php the_permalink(); ?>" class="btn btn-dark btn-long"><?php _e('Detail výstavy', 'mnsk') ?></a>
                                </div><!-- / .accordion-body -->
                            </div><!-- / .accordion-collapse -->
                        </div><!-- / .accordion-item -->

                        <?php $i++; ?>
                    <?php endwhile; ?>



                <?php else : ?>

                    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

                <?php endif; ?>
            </div><!-- / .accordion-archive -->

            <div class="d-flex justify-content-center pt-3">

                <?php numeric_posts_nav(); ?>

            </div>

        </article>



        <aside class="pt-4 pt-lg-0 col-lg-4">
            <hr class="d-lg-none">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'vystavy-menu',
                    'menu_class' => 'sidemenu',
                    'menu_id' => '9',
                    'container' => '',
                )
            );
            ?>
        </aside>
    </div><!-- / .row -->
</div><!-- / .container -->


<?php get_footer() ?>
