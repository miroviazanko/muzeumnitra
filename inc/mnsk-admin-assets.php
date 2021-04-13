<?php
/**
* enqueue admin assets.
*/
function enqueue_admin_assets()
{
    $user_id = wp_get_current_user()->ID;

    if ( $user_id !== 1 && $user_id !== 2 )
    {
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'plugins.php' );
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
        remove_menu_page( 'users.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'options-general.php' );
        remove_menu_page( 'loco' );
        remove_menu_page( 'sitepress-multilingual-cms/menu/languages.php' );

        remove_submenu_page('themes.php', 'widgets.php');
        remove_submenu_page('themes.php', 'themes.php');
        remove_submenu_page('themes.php', 'theme-editor.php');
    }
}
add_action('admin_menu', 'enqueue_admin_assets', 999);


/*
**  Hook for finding out menu names for removing
*/

/*add_action('admin_init', 'wpse_136058_debug_admin_menu');

function wpse_136058_debug_admin_menu()
{

    echo '<pre>' . print_r($GLOBALS['menu'], TRUE) . '</pre>';
}*/

