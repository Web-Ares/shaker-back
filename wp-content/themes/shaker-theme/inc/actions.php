<?php
//required actions
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'wlwmanifest_link');
// close required actions

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'signuppageheaders');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');
// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);

// Отключаем события REST API
remove_action('init', 'rest_api_init');
remove_action('rest_api_init', 'rest_api_default_filters', 10, 1);
remove_action('parse_request', 'rest_api_loaded');

// Отключаем Embeds связанные с REST API
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);

remove_action('wp_head', 'wp_oembed_add_discovery_links');
// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
remove_action('wp_head', 'wp_oembed_add_host_js');
add_filter('the_content', 'do_shortcode');
add_filter('wpcf7_form_elements', 'do_shortcode');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}
function allow_svg_upload_mimes($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload_mimes');

add_action('after_setup_theme', 'theme_setup');
function theme_setup()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
//    add_image_size('298x252', 298, 252, array('center', 'top'));
//    add_image_size('341x341', 341, 341, true);
    add_image_size('tx170', 170, 100);
//    add_image_size('447x488', 447, 488, true);
}


add_action('wp_enqueue_scripts', 'add_files');
function add_files()
{
    wp_deregister_style('contact-form-7');
    wp_deregister_script('jquery');
    wp_register_script('jquery', TEMPLATEURI.'/js/vendors/jquery-2.2.1.min.js', false, '2.1.3', false);
    wp_enqueue_script('jquery');

    wp_localize_script('jquery', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('myajax-nonce')
        )
    );
    wp_enqueue_style('style-name', get_stylesheet_uri());

    wp_enqueue_style('style-index', TEMPLATEURI.'/css/index.css');

//
//    wp_enqueue_script('script-swiper', get_template_directory_uri() . '/js/jquery.swiper.min.js', array(), '1.0.0', true);
//    wp_enqueue_script('script-mobile-menu', get_template_directory_uri() . '/js/jquery.mobile-menu.js', array(), '1.0.0', true);
//    wp_enqueue_script('script-liMarquee', get_template_directory_uri() . '/js/jquery.liMarquee.js', array(), '1.0.0', true);
//    wp_enqueue_script('script-scroll-to', get_template_directory_uri() . '/js/jquery.scroll-to.js', array(), '1.0.0', true);
//    wp_enqueue_script('script-main', get_template_directory_uri() . '/js/jquery.main.js', array(), '1.0.0', true);
//    wp_enqueue_script('script-services-list', get_template_directory_uri() . '/js/jquery.services-list.js', array(), '1.0.0', true);
//
//
//    if (is_front_page()) {
//        wp_enqueue_style('style-index', get_template_directory_uri() . '/css/index.css');
//    }
//    if (is_page_template('page-templates/contact-us.php')) {
//        wp_enqueue_style('style-about', get_template_directory_uri() . '/css/about.css');
//        wp_enqueue_style('style-contact', get_template_directory_uri() . '/css/contact-us.css');
//        wp_enqueue_script('script-form', get_template_directory_uri() . '/js/jquery.form.js', array(), '1.0.0', true);
//    }
//    if (is_page_template('page-templates/data-center.php') or is_page_template('page-templates/useful.php')) {
//        wp_enqueue_style('style-about', get_template_directory_uri() . '/css/fonts.css');
//        wp_enqueue_style('style-contact', get_template_directory_uri() . '/css/data-center.css');
//    }
//    if (is_page_template('page-templates/team.php')) {
//        wp_enqueue_style('style-index', get_template_directory_uri() . '/css/index.css');
//        wp_enqueue_style('style-team', get_template_directory_uri() . '/css/team.css');
//        wp_enqueue_script('script-team', get_template_directory_uri() . '/js/jquery.team.js', array(), '1.0.0', true);
//    }
//    if (is_page_template('page-templates/about.php')) {
//        wp_enqueue_style('style-about', get_template_directory_uri() . '/css/about-us.css');
//    }
//    if (is_page_template('page-templates/testimonials.php')) {
//        wp_enqueue_style('style-testimonials', get_template_directory_uri() . '/css/clients.css');
//    }
//
//    if (is_page_template('page-templates/services.php') or get_post_type()=='services') {
//        wp_enqueue_style('style-about-us', get_template_directory_uri() . '/css/about-us.css');
//        wp_enqueue_style('style-services', get_template_directory_uri() . '/css/services.css');
//    }
//
//    if (is_page_template('page-templates/clients.php')) {
//        wp_enqueue_style('style-swiper', get_template_directory_uri() . '/css/swiper.css');
//        wp_enqueue_style('style-clients', get_template_directory_uri() . '/css/clients.css');
//        wp_enqueue_script('script-sort', get_template_directory_uri() . '/js/jquery.sort-block.js', array(), '1.0.0', true);
//    }
//
//    if (is_page_template('page-templates/cases.php')) {
//        wp_enqueue_style('style-index', get_template_directory_uri() . '/css/index.css');
//        wp_enqueue_style('style-swiper', get_template_directory_uri() . '/css/swiper.css');
//        wp_enqueue_style('style-clients', get_template_directory_uri() . '/css/clients.css');
//        wp_enqueue_style('style-case-studies', get_template_directory_uri() . '/css/case-studies.css');
//
//    }
//    if (get_post_type()=='case_studies') {
//        wp_enqueue_style('style-index', get_template_directory_uri() . '/css/index.css');
//        wp_enqueue_style('style-services', get_template_directory_uri() . '/css/case-studies_inner.css');
//        wp_enqueue_script('script-height', get_template_directory_uri() . '/js/jquery.case-height.js', array(), '1.0.0', true);
//    }
//
//    if (is_page_template('page-login.php')) {
//        wp_enqueue_style('style-client-login', get_template_directory_uri() . '/css/client-login.css');
//    }
//
//    wp_enqueue_style('style-swiper', get_template_directory_uri() . '/css/swiper.css');
//    wp_enqueue_style('style-liMarquee', get_template_directory_uri() . '/css/liMarquee.css');
}


function get_temp_ID($tmp)
{

    $the_query = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'page',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => $tmp
            )
        )
    ));

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $pid = get_the_ID();
            wp_reset_query();
            return $pid;
        endwhile;
    } else {
        wp_reset_query();
        return '#';
    }
}

function get_login_url()
{
    $temp_id = get_temp_ID('page-login.php');
    return $permalink = get_permalink($temp_id);
    wp_reset_query();
}

function ssd_admin_clean_up()
{
//    remove_menu_page( 'edit.php?post_type=post');
//    remove_menu_page( 'edit-comments.php');
////    remove_menu_page( 'wpcf7');
//    remove_menu_page('edit.php');
//    remove_menu_page( 'acf');
//    remove_menu_page( 'edit.php?post_type=acf-field-group' );
}

add_action('admin_menu', 'ssd_admin_clean_up');

// Add a custom user role

$result = add_role('client', __(
    'Client'),
    array(

        'read' => true, // true allows this capability
        'edit_posts' => false, // Allows user to edit their own posts
        'edit_pages' => false, // Allows user to edit pages
        'edit_others_posts' => false, // Allows user to edit others posts not just their own
        'create_posts' => false, // Allows user to create new posts
        'manage_categories' => false, // Allows user to manage post categories
        'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode

    ));

add_action('user_register', 'myplugin_registration_save', 10, 1);

function myplugin_registration_save($array)
{

//    var_dump($array);
//    exit();

}

//
//add_filter( 'user_meta_pre_user_register', 'user_meta_pre_user_register_function' );
//function user_meta_pre_user_register_function( $userData )
//{
//    var_dump($userData);
//    exit();
//}
?>