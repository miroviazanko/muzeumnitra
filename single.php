<?php get_header() ?>

<section class="hero-blog" style="
    <?php if (has_post_thumbnail()) : ?>
        background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>');" <?php else : ?> background: #808080;" <?php endif; ?>>


    <?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>

    <div class="container subhero-container">
        <div class="row">
            <div class="col-lg-8">
                <h1><?php the_title() ?></h1>
                <time datetime="<?php the_time('Y-n-j') ?>"><?php the_time('j.n.Y') ?></time>
            </div>
        </div>
    </div><!-- / .container -->
</section><!-- / .hero-blog -->

<div class="container py-4">
    <div class="row">
        <article class="col-lg-8">

            <?php the_content() ?>

            <?php echo get_template_part("template-parts/content", "gallery") ?>

        </article>

        <aside class="py-4 pt-lg-0 col-lg-4">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'blog-menu',
                    'menu_class' => 'sidemenu',
                    'menu_id' => '3',
                    'container' => '',
                )
            );
            ?>
        </aside>
    </div><!-- / .row -->

    <div class="mt-5 mb-3">
        <a class="h3 text-dark text-decoration-none" href="<?php echo home_url('/Blogy') ?>"><?php _e('Späť na blog','mnsk') ?></a>
    </div>

</div><!-- / .container -->



<?php if ('post' === get_post_type()) : ?>
    <?php
    $displayedPost = $post->ID;
    ?>
    <?php include(locate_template("/template-parts/content-actual-blog-list.php", false, false));  ?>
<?php endif; ?>

<?php get_footer();
