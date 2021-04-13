<?php
// CUSTOM LOGO ON LOGIN PAGE
function my_login_logo()
{
?>
    <style type="text/css">
        .login {
            background: #eee;
        }

        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg');
            padding-bottom: 60px;
            background-size: 100px 100px;
            background-position: center bottom;
            width: 300px;
        }
    </style>

<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');
