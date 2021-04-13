<?php

/* Template Name: Aktuálne výstavy */

get_header() ?>

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

            <h1><?php the_field('aktualne_vystavy', $custom_id) ?></h1>

            <?php

            $args = array(
                'post_type' => 'vystavy',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key'     => 'aktualne',
                        'value'   => 1,
                        'compare' => 'LIKE'
                    )
                )
            );
            $the_query = new WP_Query($args);
            $i = 1;

            if ($the_query->post_count !== 0) {

            ?>
                <div class="accordion accordion-archive" id="accordionArchive">


                    <?php $i = 1; ?>

                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

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

                    <?php wp_reset_postdata(); ?>

                </div><!-- / .accordion-archive -->

            <?php  }  ?>


        </article>



        <aside class="py-4 pt-lg-0 col-lg-4">
            <hr class="d-lg-none">

            <ul class="sidemenu">
                <?php

                if (have_rows('bocne_menu')) :

                    while (have_rows('bocne_menu')) : the_row();

                        $sub_value = get_sub_field('polozka_menu');
                ?>
                        <li><a href="<?php echo $sub_value->guid ?>"><?php echo $sub_value->post_title ?></a></li>

                    <?php endwhile; ?>
                <?php
                else :
                endif;
                ?>
            </ul>
        </aside>
    </div><!-- / .row -->
</div><!-- / .container -->


<?php get_footer() ?>
