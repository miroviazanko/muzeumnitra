<?php

$args = array(
    'post_type' => 'zbierky',
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

    <div class="bg-secondary py-4">
        <div class="container px-0 px-xl-3">

            <h2 class="h1 px-3 pb-3 px-lg-0"><?php _e("Zbierky", "mnsk"); ?></h2>

            <div class="line-wrap">
                <div class="row line-inner">

                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <div class="col-xl col-lg-4 line-grid">
                                <style>
                                    .card-b<?php echo $i ?>:hover .card-img:before {
                                        background: <?php the_field('farba_pozadia_zbierky') ?>;
                                    }
                                </style>

                                <section class="card-b card-b<?php echo $i ?>">
                                    <div class="card-b-top">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php $img_url = get_the_post_thumbnail_url(null, 'rectangle_portrait_size'); ?>
                                            <figure class="card-img">
                                                <img src="<?php echo $img_url; ?>" width="440" height="820" alt="<?php the_title(); ?>">
                                            </figure>
                                        <?php endif ?>

                                        <h2 class="card-b-heading">
                                            <span class="bb-animated"><?php the_title(); ?></span>
                                        </h2>
                                    </div>

                                    <a class="stretched-link" href="<?php the_permalink(); ?>"></a>
                                </section>
                            </div>

                            <?php $i++; ?>
                        <?php endwhile;
                    else : ?>
                        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>

                </div><!-- / .row -->
            </div><!-- / .line-wrap -->
        </div><!-- / .container -->
    </div>

<?php }
