<?php get_header() ?>



<section class="hero-blog" style="<?php if (has_post_thumbnail()) : ?>
        background-image: url('<?php the_field('obrazok') ?>');" <?php else : ?> background: #808080;" <?php endif; ?>>

    <?php echo get_template_part('template-parts/content', 'breadcrumbs') ?>


    <div class="container subhero-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="mb-2 mg-lg-0"><?php the_title() ?></h1>
                    </div>

                    <div class="col-lg-5 d-flex align-items-lg-center justify-content-lg-end">
                        <a class="btn btn-dark" href="#reservation-form"><?php the_field('rezervacia') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- / .container -->
</section><!-- / .hero-blog -->

<div class="container py-4">
    <div class="row">
        <article class="col-lg-8 pb-5">
            <h2><?php the_field('datum_vystavy') ?><br>
                <?php the_field('miesto_vystavy') ?></h2>

            <?php the_content() ?>
        </article>

        <aside class="py-4 pt-lg-0 col-lg-4">
            <hr class="d-lg-none">

            <div class="spu-calendar-wrap">
                <div class="spu-calendar-header">
                    <a class="spu-month-btn spu-month-btn-prev" id="showPrevMonth" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="36 36 60 60">
                            <polyline class="cls-1" points="35 39.17 25 30.21 35 20.83" />
                        </svg>
                    </a>

                    <span class="spu-month-current h2 mb-0">
                        <span class="spu-months-wrap">
                            <span class="spu-month-name" data-month="0"><?php _e('január', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="1"><?php _e('február', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="2"><?php _e('marec', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="3"><?php _e('apríl', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="4"><?php _e('máj', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="5"><?php _e('jún', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="6"><?php _e('júl', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="7"><?php _e('august', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="8"><?php _e('september', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="9"><?php _e('október', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="10"><?php _e('november', 'mnsk') ?></span>
                            <span class="spu-month-name" data-month="11"><?php _e('december', 'mnsk') ?></span>
                        </span><!-- / .spu-months-wrap -->

                        <span class="spu-year-name"></span>
                    </span><!-- / .spu-month-current -->

                    <a class="spu-month-btn spu-month-btn-next" id="showNextMonth" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="36 36 60 60">
                            <polyline class="cls-1" points="25 20.83 35 29.79 25 39.17" />
                        </svg>
                    </a>
                </div><!-- / .spu-calendar-header -->

                <div class="spu-day-names">
                    <span class="spu-day-name"><?php _e('po', 'mnsk') ?></span>
                    <span class="spu-day-name"><?php _e('ut', 'mnsk') ?></span>
                    <span class="spu-day-name"><?php _e('st', 'mnsk') ?></span>
                    <span class="spu-day-name"><?php _e('št', 'mnsk') ?></span>
                    <span class="spu-day-name"><?php _e('pi', 'mnsk') ?></span>
                    <span class="spu-day-name"><?php _e('so', 'mnsk') ?></span>
                    <span class="spu-day-name"><?php _e('ne', 'mnsk') ?></span>
                </div><!-- / .spu-day-names -->

                <div class="spu-month">

                </div><!-- / .spu-month -->
            </div><!-- / .spu-calendar-wrap -->

            <script src="<?php echo get_template_directory_uri() ?>/assets/dist/js/spu-calendar.js"></script>
            <script>
                var d = new Date();
                var SPUmonth = d.getMonth() + 1;
                var SPUyear = d.getFullYear();
                var SPUevents = [];

                <?php

                if (have_rows('kalendar')) :

                    $dates_arr = array();
                    while (have_rows('kalendar')) : the_row();

                        $from_value_arr =  get_sub_field('od');
                        $to_value_arr = get_sub_field('do');


                        $period = new DatePeriod(
                            new DateTime($from_value_arr),
                            new DateInterval('P1D'),
                            new DateTime($to_value_arr)
                        );
                        foreach ($period as $key => $value) {
                            $dates_arr[] = $value->format('Y-m-d');
                        }

                        $dates_arr[] = get_sub_field('do');

                    endwhile;
                ?>
                    SPUevents = <?php echo json_encode($dates_arr); ?>;
                <?php
                else :
                endif;
                ?>

                var calendarObj = {
                    el: ".spu-calendar-wrap",
                    month: SPUmonth,
                    year: SPUyear,
                    events: SPUevents,
                };

                SPUCalendar.init(calendarObj);
                SPUCalendar.goPrevMonth();
                SPUCalendar.goNextMonth();
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


            <script>
                // INSERT DATES INTO FORM SELECT
                if (document.getElementById('choose-date')) {
                    const inputDate = document.getElementById('choose-date').options;

                    SPUevents.forEach(option => {
                        option = option.split('-').reverse().join('.');
                        inputDate.add(
                            new Option(option.text = option, option.value = option, option.selected)
                        )
                    });
                }
                //INSERT NAME OF EXHIBITION INTO FORM TEXT INPUT
                if (document.getElementById('exhibition')) {
                    const exhibitName = document.getElementById('exhibition');
                    exhibitName.value = '<?php echo json_encode(the_title()) ?>';
                }
            </script>

        </aside>
    </div><!-- / .row -->
</div><!-- / .container -->


<?php echo get_template_part('template-parts/content', 'actual-vystavy'); ?>


<?php get_footer() ?>
