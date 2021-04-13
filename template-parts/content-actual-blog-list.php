<div class="container px-0 px-xl-3 py-4">



    <h2 class="h1 pb-3 px-3 px-lg-0"><?php the_field('aktualne_clanky') ?></h2>


    <div class="line-wrap">
        <div class="row line-inner">

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'post__not_in' => array(isset($displayedPost) ? $displayedPost : null),
            );

            $the_query = new WP_Query($args);

            ?>

            <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <div class="col-xl-3 col-md-6 line-grid">
                        <section class="card-blog">

                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                                $img_url = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'thumbnail');
                                ?>
                                <img src="<?php echo $img_url; ?>" width="600" height="400" alt="<?php the_title(); ?>">
                            <?php endif; ?>

                            <h3 class="h4 card-blog-heading bb-animated"><?php the_title() ?></h3>

                            <p class="card-blog-desc"><strong><?php the_time('j.n.Y') ?></strong> <?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                            <a class="stretched-link" href="<?php the_permalink(); ?>"></a>
                        </section>
                    </div>

                <?php endwhile;
            else : ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </div><!-- / .row -->
    </div><!-- / .line-wrap -->
</div><!-- / .container -->
