<div class="d-none d-sm-block breadcrumbs-wrap">
    <div class="container">
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="<?php echo get_home_url() ?>"><?php _e('Ponitrianske múzeum', 'mnsk') ?></a></li>


                <?php
                if (is_page()) {
                    $current_page = get_post();
                    $current_title = $current_page->post_title;
                    $current_link = $current_page->guid;
                ?>
                    <li class="breadcrumb-item active"><?php echo $current_title ?></li>
                <?php

                } else if (is_archive()) {

                    $post_type = get_post_type();
                    $post_type_object   = get_post_type_object($post_type);
                    $current_title = $post_type_object->labels->archives;
                    $current_link  = get_post_type_archive_link($post_type);

                ?>
                    <li class="breadcrumb-item active"><?php echo $current_title ?></li>
                <?php
                } else if (is_home()) {
                    $current_link = get_permalink(get_option('page_for_posts'));
                    $current_title = 'Blog';
                ?>
                    <li class="breadcrumb-item active"><?php echo $current_title ?></li>
                <?php
                }
                ?>


                <?php
                if (is_single()) {
                    $post_type = get_post_type();
                    $parent_link = get_post_type_archive_link($post_type);

                    if ($post_type != 'post') {

                        $post_type_object = get_post_type_object($post_type);

                        ?>

                        <li class="breadcrumb-item"><a href="<?php echo $parent_link ?>"><?php echo $post_type_object->labels->archives ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
                        <?php

                    } else if (($post_type == 'post')) {

                        $posts_page_id = get_option('page_for_posts');
                        $posts_page = get_post($posts_page_id);
                        $posts_page_title = $posts_page->post_title;
                        ?>
                        <li class="breadcrumb-item"><a href="<?php echo $parent_link ?>"><?php echo $posts_page_title ?></a></li>

                        <li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
                        <?php
                    }
                }

                ?>

            </ol>
        </nav>
    </div><!-- / .container -->
</div><!-- / .breadcrumbs-wrap -->
