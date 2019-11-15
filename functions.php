<?php
//------------------------------------------------------------------------------------styles and scripts
function enqueue_scripts()
{

    wp_register_script('theme_settings', get_template_directory_uri() . '/assets/js/theme-settings.js', array('jquery'), '1.0', true);
    wp_enqueue_script('theme_settings');

    wp_register_script('t_jquery', get_template_directory_uri() . '/assets/js/core/jquery.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('t_jquery');

    wp_register_script('popper', get_template_directory_uri() . '/assets/js/core/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('popper');

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/core/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap');

    wp_register_script('scrollbar', get_template_directory_uri() . '/assets/js/plugins/perfect-scrollbar.jquery.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('scrollbar');

    wp_register_script('moment', get_template_directory_uri() . '/assets/js/plugins/moment.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('moment');

    wp_register_script('paperjs', get_template_directory_uri() . '/assets/js/paper-dashboard.min.js?v=2.0.1', array('jquery'), '1.0', true);
    wp_enqueue_script('paperjs');

    wp_register_script('sortable', get_template_directory_uri() . '/assets/js/plugins/sortable.js', array('jquery'), '1.0', true);
    wp_enqueue_script('sortable');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

//------------------------------------------------------------------------------------include acf settings
require_once get_template_directory() . '/inc/functions/acf-settings.php';

//------------------------------------------------------------------------------------menus
function register_menus()
{
    register_nav_menus(
        array(
            'sidebar_menu' => 'Sidebar menu',
        )
    );
}

add_action('init', 'register_menus');

//------------------------------------------------------------------------------------leads post type
if (!function_exists('leadsPostType')) {
    function leadsPostType()
    {

        $labels = array(
            'name'               => _x('Leads', 'Post Type General Name', 'n-theme'),
            'singular_name'      => _x('Lead', 'Post Type Singular Name', 'n-theme'),
            'menu_name'          => __('Leads', 'n-theme'),
            'parent_item_colon'  => __('Parent:', 'n-theme'),
            'all_items'          => __('All leads', 'n-theme'),
            'view_item'          => __('View', 'n-theme'),
            'add_new_item'       => __('Add new lead', 'n-theme'),
            'add_new'            => __('Add new', 'n-theme'),
            'edit_item'          => __('Edit lead', 'n-theme'),
            'update_item'        => __('Update lead', 'n-theme'),
            'search_items'       => __('Search lead', 'n-theme'),
            'not_found'          => __('There is no leads yet', 'n-theme'),
            'not_found_in_trash' => __('Did not find in the trash', 'n-theme'),
        );
        $args = array(
            'labels'             => $labels,
            'show_in_rest'       => true,
            'supports'           => array('title'),
            'public'             => true,
            'publicly_queryable' => false,
            'menu_position'      => 22,
            'menu_icon'          => 'dashicons-list-view',
        );
        register_post_type('lead', $args);
    }
    add_action('init', 'leadsPostType', 0);

}

// -------------------------------------------------------------------------------------------remove wp version
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

// -------------------------------------------------------------------------------------------get chart data
function getDataForChart($field)
{
    /*
    get chart data from db
     */

    $chart_data = array();

    $leads_args = array(
        'post_type'      => 'lead',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'posts_per_page' => -1,
    );

    $lead_query              = new WP_Query($leads_args);
    $leads_source_chart_data = '';
    if ($lead_query->have_posts()) {

        while ($lead_query->have_posts()) {
            $lead_query->the_post();

            if ($field == 'traked_source') {
                if (get_field('traked_source_predef') == 'Other') {
                    $sorted_field = get_field($field);
                } else {
                    $sorted_field = get_field('traked_source_predef');
                }
            } else {
                $sorted_field = get_field($field);
            }

            if (array_key_exists($sorted_field, $chart_data)) {
                $chart_data[$sorted_field] += 1;
            } else {
                $chart_data[$sorted_field] = 1;
            }
        }
        wp_reset_postdata();
    }

    return $chart_data;
}

function prepareDataForChart($data_array)
{
    /*
    prepare data for amcharts
     */

    $js_chart_data = '';
    foreach ($data_array as $key => $value) {
        $js_chart_data .= '{
							"category": "' . $key . '",
							"value": ' . $value . '
						  },';
    }
    return $js_chart_data;
}

// -------------------------------------------------------------------------------------------remove dashboard widgets

function remove_dashboard_widgets()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Quick Press widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); //WordPress.com Blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side'); //Other WordPress News
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Plugins
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Right Now
    remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal'); //Gravity Forms
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Recent Comments
    remove_meta_box('icl_dashboard_widget', 'dashboard', 'normal'); //Multi Language Plugin
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Activity
    remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
