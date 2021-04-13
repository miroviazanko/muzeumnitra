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

if ( $the_query->post_count !== 0 ) {

?>

        <div class="bg-dark py-3 overflow-hidden">
            <div class="container">
                <div class="row">

                    <h2 class="h1 pb-3"><?php the_field('aktualne_vystavy') ?></h2>

                    <div class="glide px-0">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">



                                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>



                                        <li class="glide__slide">
                                            <style>
                                                .card-a<?php echo $i ?>:hover .card-top {
                                                    background: <?php the_field('farba_pozadia_vystavy') ?>;
                                                }
                                            </style>

                                            <section class="card-a card-a<?php echo $i ?>">
                                                <div class="card-top">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php $img_url = get_the_post_thumbnail_url(null, 'square_size'); ?>
                                                        <figure class="card-img">
                                                            <img src="<?php echo $img_url; ?>" width="320" height="320" alt="<?php the_title(); ?>">
                                                        </figure>
                                                    <?php endif; ?>
                                                    <h2 class="card-heading bb-animated"><?php the_title(); ?></h2>
                                                </div>

                                                <div class="card-bottom">
                                                    <?php the_field('dlzka_vystavy') ?> | <?php the_field('miesto_vystavy') ?>
                                                </div>

                                                <a class="stretched-link" href="<?php the_permalink(); ?>"></a>
                                            </section>
                                        </li>
                                        <?php $i++; ?>
                                    <?php endwhile;
                                else : ?>
                                    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                                <?php endif; ?>

                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>



                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/arr-white-left-short.svg" width="10" height="20" alt="<?php _e('šípka vľavo', 'mnsk') ?>">
                            </button>

                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/arr-white-right-short.svg" width="10" height="20" alt="<?php _e('šípka vpravo', 'mnsk') ?>">
                            </button>
                        </div><!-- / .glide__arrows -->
                    </div><!-- / .glide -->
                </div><!-- / .row -->
            </div><!-- / .container -->
        </div><!-- / .bg-dark -->

<?php }
