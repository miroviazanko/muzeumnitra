<?php
if (function_exists('acf_add_options_page'))
{
    acf_add_options_page(array(
        'page_title' => __('mnsk nastavenia web stránky', 'mnsk'),
        'menu_title' => __('mnsk Nastavenia', 'mnsk'),
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Pätička', 'mnsk'),
        'menu_title' => __('Pätička', 'mnsk'),
        'parent_slug' => 'theme-general-settings',
    ));
}
