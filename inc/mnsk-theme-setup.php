<?php

if (!function_exists('mnsk_setup')) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
    function mnsk_setup()
    {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        */
        load_theme_textdomain('mnsk', get_template_directory() . '/languages');

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
            * provide it for us.
            */
            add_theme_support('title-tag');

            /*
            * Enable support for Post Thumbnails on posts and pages.
            *
            * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
            */
            add_theme_support('post-thumbnails');

            // This theme uses wp_nav_menu() in two locations.
            register_nav_menus(
            array(
                'top-menu' => __('Primary', 'mnsk'),
                'blog-menu' => __( 'Blog-menu', 'mnsk' ),
                'footer-1a' => __('Footer-1a', 'mnsk'),
                'footer-1b' => __('Footer-1b', 'mnsk'),
                'footer-2a' => __('Footer-2a', 'mnsk'),
                'footer-2b' => __('Footer-2b', 'mnsk'),
                'footer-4a' => __('Footer-4a', 'mnsk'),
                'vystavy-menu' => __('Vystavy-menu', 'mnsk'),
                'zbierky-menu' => __('Zbierky-menu', 'mnsk'),
                'expozitury-menu' => __('Expozitury-menu', 'mnsk'),

            )
            );

            /*
            * Switch default core markup for search form, comment form, and comments
            * to output valid HTML5.
            */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                )
            );

            // Add support for responsive embedded content.
            add_theme_support('responsive-embeds');

            // Register a new image sizes
            add_image_size('square_size', 320 , 320, true);
            add_image_size('rectangle_portrait_size', 440 , 820, true);
            add_image_size('mnsk_post_thumbnail', 600 , 400, true);
    }
endif;


add_action('after_setup_theme', 'mnsk_setup');
