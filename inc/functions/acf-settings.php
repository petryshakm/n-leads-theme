<?php
//------------------------------------------------------------------------------------include acf settings
// customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path($path)
{
    $path = get_stylesheet_directory() . '/inc/plugins/advanced-custom-fields-pro/';
    return $path;
}

// customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir($dir)
{
    $dir = get_stylesheet_directory_uri() . '/inc/plugins/advanced-custom-fields-pro/';
    return $dir;
}

// Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

// Include ACF
include_once get_stylesheet_directory() . '/inc/plugins/advanced-custom-fields-pro/acf.php';

//------------------------------------------------------------------------------------acf link field output
function acfLink($title, $lrl, $target = '')
{
    if ($title) {
        return '<a href="' . $url . '" target = "' . $target . '">
					' . $title . '
				</a>';
    }
}
