<?php
// ADD CUSTOM POST TYPES FOR EXHIBITIONS, COLLECTIONS AND EXPOS

function mnsk_custom_exhibition_post_type()
{
    $labels = array(
        'name' => _x('vystavy', 'post type general name'),
        'singular_name' => _x('vystavy', 'post type singular name'),
        'menu_name' => __('Výstavy', 'mnsk'),
    );
    $args = array(
        'labels' => $labels,
        'description' => __('Aktuálne výstavy', 'mnsk'),
        'public' => true,
        'menu_position' => 4,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('vystavy', $args);
}
add_action('init', 'mnsk_custom_exhibition_post_type');


function mnsk_custom_collections_post_type()
{
    $labels = array(
        'name' => _x('zbierky', 'post type general name'),
        'singular_name' => _x('zbierky', 'post type singular name'),
        'menu_name' => __('Zbierky', 'mnsk')
    );
    $args = array(
        'labels' => $labels,
        'description' => __('Zbierky', 'mnsk'),
        'public' => true,
        'menu_position' => 5,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
        //'rewrite' => array('slug' =>  _x('zbierky', 'URL slug'))
    );
    register_post_type('zbierky', $args);
}
add_action('init', 'mnsk_custom_collections_post_type');


function mnsk_custom_expozitury_post_type()
{
    $labels = array(
        'name' => _x('expozitury', 'post type general name'),
        'singular_name' => _x('expozitury', 'post type singular name'),
        'menu_name' => __('Expozitúry', 'mnsk')
    );
    $args = array(
        'labels' => $labels,
        'description' => __('Expozitúry', 'mnsk'),
        'public' => true,
        'menu_position' => 6,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('expozitury', $args);
}
add_action('init', 'mnsk_custom_expozitury_post_type');




// SET POST-PER-PAGE FOR SPECIFIC CUSTOM POST TYPE

add_action('pre_get_posts', 'mnsk_archive_vystavy_posts');

function mnsk_archive_vystavy_posts($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('vystavy')) {
        $query->set('posts_per_page', '2');
    }
}

add_action('pre_get_posts', 'mnsk_archive_zbierky_posts');

function mnsk_archive_zbierky_posts($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('zbierky')) {
        $query->set('posts_per_page', '2');
    }
}

add_action('pre_get_posts', 'mnsk_archive_expozitury_posts');

function mnsk_archive_expozitury_posts($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('expozitury')) {
        $query->set('posts_per_page', '2');
    }
}



