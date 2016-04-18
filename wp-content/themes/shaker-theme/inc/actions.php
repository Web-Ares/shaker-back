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
    add_image_size('tx140', 140, 9999);
//    add_image_size('447x488', 447, 488, true);
}


add_action('wp_enqueue_scripts', 'add_files');
function add_files()
{
    wp_deregister_style('contact-form-7');
    wp_deregister_script('jquery');
    wp_register_script('jquery', TEMPLATEURI . '/js/vendors/jquery-2.1.4.min.js', false, '2.1.4', false);
    wp_enqueue_script('jquery');

    wp_enqueue_style('style-all', get_stylesheet_uri());

    wp_enqueue_style('style-swiper', TEMPLATEURI . '/css/swiper.min.css');
    wp_enqueue_style('style-index', TEMPLATEURI . '/css/index.css');
    if (wp_get_current_user()->exists()) {
        wp_enqueue_style('style-wish', TEMPLATEURI . '/css/wish-list.css');
    }


    wp_enqueue_script('script-nicescroll', TEMPLATEURI . '/js/vendors/jquery.nicescroll.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-swiper', TEMPLATEURI . '/js/vendors/swiper.jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-history', TEMPLATEURI . '/js/vendors/history.js', array(), '1.0.0', true);
    wp_enqueue_script('script-main', TEMPLATEURI . '/js/main.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-index', TEMPLATEURI . '/js/index.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-limited', TEMPLATEURI . '/js/limited-art.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-cform7', '/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js', array(), '1.0.0', true);
    wp_enqueue_script('script-cf7', '/wp-content/plugins/contact-form-7/includes/js/scripts.js', array(), '1.0.0', true);

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

function get_curation_url()
{
    $temp_id = get_temp_ID('pages/page-curations.php');
    return $permalink = get_permalink($temp_id);
    wp_reset_query();
}

function ssd_admin_clean_up()
{
//    remove_menu_page( 'edit.php?post_type=post');
//    remove_menu_page( 'edit-comments.php');
//    remove_menu_page( 'wpcf7');
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

register_nav_menus(array(
    'main_menu' => 'menu_main',
    'auth_menu' => 'auth_menu'
));

add_action('wpcf7_before_send_mail', 'cf7_create_post', 10, 1);

function cf7_create_post($contact_form)
{
    /* Use id() method instead. */

     $id = $contact_form->id();

    if ($id == 148 or $id == 5) {

        //Get current form
        $wpcf7 = WPCF7_ContactForm::get_current();

        // get current SUBMISSION instance
        $submission = WPCF7_Submission::get_instance();

        // Ok go forward
        if ($submission) {

            $posted_data = $submission->get_posted_data();

            setNewUser($posted_data['name'],$posted_data['email'],$posted_data['user-name']);

            // get submission data
            $data = $submission->get_posted_data();

            // nothing's here... do nothing...
            if (empty($data))
                return;

            // return current cf7 instance
            return $wpcf7;
        }
    }

}

function setNewUser($name,$email,$username){
    global $wpdb;
    $wpdb->insert( $wpdb->prefix . 'newusers', array( 'name' => $name, 'email' => $email, 'nickname'=> $username), array( '%s', '%s', '%s' ) );
}

?>