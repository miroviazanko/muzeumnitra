<?php get_header() ?>

<section class="hero-blog" style="<?php if (has_post_thumbnail()) : ?>
            background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>');" <?php else : ?> background: #4e4e4e;" <?php endif; ?>>
    <?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>
    <div class="container subhero-container">
        <div class="row">
            <div class="col-lg-8">
                <h1><?php the_title() ?></h1>
            </div>
        </div>
    </div><!-- / .container -->
</section><!-- / .hero-blog -->

<div class="container pt-4">
    <div class="row">
        <article class="col-lg-8 pb-5">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>

                <?php endwhile;
            else : ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

            <?php echo get_template_part("template-parts/content", "gallery") ?>

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


    </div>
</div>

<?php get_footer();
