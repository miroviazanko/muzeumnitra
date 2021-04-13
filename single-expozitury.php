<?php get_header() ?>

<section class="hero-blog" style="<?php if (has_post_thumbnail()) : ?>
        background-image: url('<?php the_field('obrazok_expozitury') ?>');" <?php else : ?> background: #808080;" <?php endif; ?>>

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

            <?php echo get_template_part('template-parts/content', 'gallery') ?>

        </article>

        <aside class="py-4 pt-lg-0 col-lg-4">
            <hr class="d-lg-none">

            <h2><?php _e('Mapa', 'mnsk') ?></h2>

            <script src="<?php echo get_template_directory_uri() ?>/assets/dist/plugins/openlayers/ol.min.js"></script>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/dist/plugins/openlayers/ol.min.css" type="text/css">

            <div class="mb-4" id="mapCanvas"></div><!-- / #mapCanvas -->
            <div id="mapMarker"></div>

            <script>
                <?php
                $coordinates = array_reverse(explode(',', get_field('poloha_expozitury')));
                ?>

                var map = new ol.Map({
                    target: 'mapCanvas',
                    layers: [
                        new ol.layer.Tile({
                            source: new ol.source.OSM()
                        })
                    ],
                    view: new ol.View({
                        center: ol.proj.fromLonLat(<?php echo json_encode($coordinates) ?>),
                        zoom: 15
                    })
                });

                let marker = new ol.Overlay({
                    position: ol.proj.fromLonLat(<?php echo json_encode($coordinates) ?>),
                    positioning: 'center-center',
                    element: document.getElementById("mapMarker"),
                    stopEvent: false
                });
                map.addOverlay(marker);

                map.on('postcompose', function(e) {
                    document.querySelector('#mapCanvas canvas').style.filter = "grayscale(100%)";
                });
            </script>



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
