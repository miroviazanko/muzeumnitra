<?php

/*
* ADD THEME SCRIPTS
*/

function add_theme_scripts()
{

    wp_enqueue_style('mnsk-glidejs-core', get_template_directory_uri() . '/assets/dist/plugins/glidejs/css/glide.core.min.css?v=1.0');
    wp_enqueue_style('mnsk-lightgallery', get_template_directory_uri() . '/assets/dist/plugins/lightgalleryjs/css/lightgallery.css');
    wp_enqueue_style('mnsk-bootstrap', get_template_directory_uri() . '/assets/dist/css/bootstrap.5.0.0.css?v=1.9');

    wp_enqueue_style('theme-styles', get_stylesheet_uri() . '?v=1.8');

    wp_enqueue_script('mnsk-bootstrap-js', get_template_directory_uri() . '/assets/dist/js/bootstrap.bundle.min.js', array(), 1.0, true);
    wp_enqueue_script('mnsk-glidejs', get_template_directory_uri() . '/assets/dist/plugins/glidejs/glide.min.js', array(), 1.0, true);
    wp_enqueue_script('mnsk-lightgallery', get_template_directory_uri() . '/assets/dist/plugins/lightgalleryjs/js/lightgallery.min.js', array(), 1.0, true);
    wp_enqueue_script('mnsk-custom', get_template_directory_uri() . '/assets/dist/js/custom.js', array(), 1.2, true);

}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
