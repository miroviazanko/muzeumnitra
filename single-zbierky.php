<?php get_header() ?>

<section class="hero-blog" style="<?php if (has_post_thumbnail()) : ?>
        background-image: url('<?php the_field('obrazok_zbierky') ?>');" <?php else : ?> background: #808080;" <?php endif; ?>>

    <?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>


    <div class="container subhero-container">
        <div class="row">
            <div class="col-lg-8">
                <h1><?php the_title() ?></h1>
            </div>
        </div>
    </div><!-- / .container -->
</section><!-- / .hero-blog -->


<div class="container py-4">
    <div class="row">
        <article class="col-lg-8 pb-5">

            <?php the_content() ?>

            <?php echo get_template_part("template-parts/content", "gallery"); ?>


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


<?php echo get_template_part("template-parts/content", "actual-zbierky"); ?>


<?php get_footer() ?>
