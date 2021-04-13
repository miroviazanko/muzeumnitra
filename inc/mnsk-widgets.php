<?php

/**
 * Register widget area.
 *
 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function mnsk_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Footer-nav1', 'mnsk'),
            'id' => 'footer-nav1',
            'description' => __('Add widgets here to appear in your sidebar.', 'mnsk'),
            'class' => 'accordion-body',
            'before_widget' => '',
            'after_widget' => '',
            'before_sidebar' => '<div>',
            'after_sidebar' => '</div>',
            'before_title' => '',
            'after_title' => '',
        )
    );

    register_sidebar(
        array(
            'name' => __('Footer-nav2', 'mnsk'),
            'id' => 'footer-nav2',
            'description' => __('Add widgets here to appear in your sidebar.', 'mnsk'),
            'class' => 'accordion-body',
            'before_widget' => '',
            'after_widget' => '',
            'before_sidebar' => '',
            'after_sidebar' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );
}
add_action('widgets_init', 'mnsk_widgets_init');
