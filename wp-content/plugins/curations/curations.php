<?php

/*
Plugin Name: Curations
Description: Curations list.

*/

class Curation_Plugin
{

    /**
     * @var object
     */
    static $instance;

    /**
     * @var object
     */
    public $customers_obj;

    /**
     * @var integer
     */
    static $first_user;

    /**
     * @var array
     */
    static $users;

    /**
     * @var array
     */
    static $users_categories = [];

    /**
     * @var array
     */
    static $users_photos = [];

    /**
     * Curation_Plugin constructor.
     */
    public function __construct()
    {
        add_action('init', 'register_script');
        function register_script()
        {
            wp_register_script('select_jquery', plugins_url('/select.js', __FILE__), array('jquery'), '2.5.1');
            wp_register_style('curations_style', plugins_url('/curations.css', __FILE__), false, '1.0.0', 'all');
        }

        add_filter('set-screen-option', [__CLASS__, 'set_screen'], 10, 3);
        add_action('admin_menu', [$this, 'plugin_menu']);
    }

    /**
     * @param $status
     * @param $option
     * @param $value
     * @return mixed
     */
    public static function set_screen($status, $option, $value)
    {
        return $value;
    }

    /**
     * hooks
     */
    public function plugin_menu()
    {

        $hook = add_menu_page(
            'Curations',
            'Curation users',
            'manage_options',
            'curation_users',
            [$this, 'plugin_curations_page']
        );

        add_action("load-$hook", [$this, 'screen_option']);

        $hook2 = add_menu_page(
            'Limited',
            'Limited users',
            'manage_options',
            'limited_users',
            [$this, 'plugin_limited_page']
        );

        add_action("load-$hook2", [$this, 'screen_option']);

    }

    /**
     * Screen options
     */
    public function screen_option()
    {

    }

    /**
     * Plugin curations page
     */
    public function plugin_curations_page()
    {
        wp_enqueue_style('curations_style');
        wp_enqueue_script('select_jquery');
        require_once("curpage.php");
    }

    /**
     * Plugin limited page
     */
    public function plugin_limited_page()
    {
        wp_enqueue_style('curations_style');
        wp_enqueue_script('select_jquery');
        require_once("limitedpage.php");
    }

    /**
     * @param int $hide
     * @return string
     */
    public static function get_Authors($hide = 1)
    {
        $list = '';
        $terms = get_terms('author_categories', 'hide_empty=' . $hide);
        if ($terms) {
            foreach ($terms as $term) {
                $list .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
            }
        }
        wp_reset_query();
        return $list;
    }

    /**
     * @return string
     */
    public static function setUsers(){
        self::$users=' <option value="">Choose User</option>';
        $args = array(
            'blog_id'      => $GLOBALS['blog_id'],
            'role'         => 'client',
            'role__in'     => array(),
            'role__not_in' => array(),
            'meta_key'     => '',
            'meta_value'   => '',
            'meta_compare' => '',
            'meta_query'   => array(),
            'include'      => array(),
            'exclude'      => array(),
            'orderby'      => 'login',
            'order'        => 'ASC',
            'offset'       => '',
            'search'       => '',
            'search_columns' => array(),
            'number'       => '',
            'paged'        => 1,
            'count_total'  => false,
            'fields'       => 'all',
            'who'          => '',
            'has_published_posts' => null,
            'date_query'   => array() // смотрите WP_Date_Query
        );
        $users_list = get_users( $args );
        foreach( $users_list as $user ){
            if(empty(self::$first_user)){
                self::$first_user = $user->ID;
            }
            self::$users .='<option value="'.$user->ID.'">'.$user->display_name.'</option>';
        }
    }

    public static function getUsers(){
        return self::$users;
    }

    /**
     * @param $post_id
     * @param $cat_id
     */
    public static function changePostCategories($post_id, $cat_id)
    {
        global $wpdb;
        $result = $wpdb->update($wpdb->prefix . 'users_curations', array('category_id' => $cat_id), array('post_id' => $post_id), array('%d'), array('%d'));
    }

    /**
     * @param int $hide
     * @return string
     */
    public static function get_Categories($hide = 1)
    {
        $list = '';
        $terms = get_terms('img_categories', array(
            'order' => 'ASC',
            'parent' => '0'
        ));
        if ($terms) {
            foreach ($terms as $term) {
                $list .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
            }
        }
        wp_reset_query();
        return $list;
    }

    /**
     * @param $user_id
     * @return string
     */
    public static function getUserCategories($user_id)
    {
        global $wpdb;
        $list = '';
        $sql = "SELECT post_id FROM {$wpdb->prefix}users_curations";
        $sql .= " WHERE user_id =" . $user_id;
        $result = $wpdb->get_results($sql, 'ARRAY_A');
        self::$users_photos=$result;
        foreach ($result as $post) {
            self::getPostCategories($post['post_id']);
        }

        if (self::$users_categories) {
            foreach (self::$users_categories as $key=>$term) {
                $list .= '<option value="' . $key . '">' . $term['title'] . ' (' . $term['count'] .')</option>';
            }
        }
        return $list;
    }

    /**
     * @param $user_id
     * @return string
     */
    public static function getUserSelCategories($user_id)
    {
        global $wpdb;
        $list = '';
        $sql = "SELECT category_id FROM {$wpdb->prefix}categories";
        $sql .= " WHERE user_id =" . $user_id;
        $result = $wpdb->get_results($sql, 'ARRAY_A');


        foreach ($result as $post) {
            $term = get_term( $post['category_id'], 'img_categories' );
            echo  '<li>' . $term->name . '</li>';
        }

    }

    /**
     * @param $post_id
     */
    public static function getPostCategories($post_id)
    {
        $args = array();
        $defaults = array('fields' => 'all');
        $args = wp_parse_args($args, $defaults);

        $auth_cats = wp_get_object_terms($post_id, 'author_categories', $args);
        $img_cats = wp_get_object_terms($post_id, 'img_categories', $args);
        $results = array_merge($auth_cats, $img_cats);

        foreach($results as $key=>$category){
            if(!empty(self::$users_categories[$category->term_id])){
                self::$users_categories[$category->term_id]['title']=$category->name;
                self::$users_categories[$category->term_id]['count']+=1;
            }else{
                self::$users_categories[$category->term_id]['title']=$category->name;
                self::$users_categories[$category->term_id]['count']=1;
            }
        }

    }

    /**
     * @param bool $cat_id
     */
    public static function getUserPhotos($cat_id = false)
    {
        $list = '';
        foreach (self::$users_photos as $post) {
            $list .= '<li>' . get_the_title($post['post_id']) . '<span class="delete" data-id="' . $post['post_id'] . '">X</span></li>';
        }
        echo $list;
    }

    /**
     * @return Curation_Plugin|object
     */
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}

/**
 * action
 */
add_action('plugins_loaded', function () {
    Curation_Plugin::get_instance();
});


add_action('wp_ajax_subcategories', 'getSubcategories');
add_action('wp_ajax_nopriv_subcategories', 'getSubcategories');



function getSubcategories()
{
    $category_id = $_POST['category_id'];
    $list = [];
    $terms = get_terms('img_categories', array(
        'order' => 'ASC',
        'parent' => $category_id
    ));

    if ($terms) {
        foreach ($terms as $term) {
            $list['subcategory'][] .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
        }
    }
    wp_reset_query();

    global $wpdb;

    $user_id = (int)$_POST['user_id'];

    $sql = "SELECT post_id  FROM {$wpdb->prefix}users_curations";
    $sql .= " WHERE user_id =" . $user_id;
    $result = $wpdb->get_results($sql, 'ARRAY_A');
    $posts = [];
    foreach($result as $val){
        $posts[] = $val['post_id'];
    }

    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post__not_in' => $posts,
        'post_type' => 'images',
        'tax_query' => array(
            array(
                'taxonomy' => 'img_categories',
                'terms' => $category_id,
            )
        )
    ));


    if ($q->have_posts()) {

        while ($q->have_posts()) :
            $q->the_post();
            $img_id = get_the_ID();
            $title = get_the_title();
            $list['photos'] .= '<option value="' . $img_id . '">' . $title . '</option>';
        endwhile;

        wp_reset_query();

    }

    die(json_encode($list));
}

add_action('wp_ajax_photos', 'getPhotos');

function getPhotos()
{
    $category_id = $_POST['category_id'];
    $taxonomy = 'img_categories';

    $list = [];
    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'images',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'terms' => $category_id,
            )
        )
    ));


    if ($q->have_posts()) {

        while ($q->have_posts()) :
            $q->the_post();
            $img_id = get_the_ID();
            $title = get_the_title();
            $list['photos'] .= '<option value="' . $img_id . '">' . $title . '</option>';
        endwhile;

        wp_reset_query();

    }


    die(json_encode($list));
}

add_action('wp_ajax_authphotos', 'getAuthPhotos');

function getAuthPhotos()
{
    $category_id = $_POST['category_id'];
    $taxonomy = 'author_categories';

    $list = [];
    $list['subcategory'] = '';

    global $wpdb;

    $user_id = (int)$_POST['user_id'];

    $sql = "SELECT post_id  FROM {$wpdb->prefix}users_curations";
    $sql .= " WHERE user_id =" . $user_id;
    $result = $wpdb->get_results($sql, 'ARRAY_A');
    $list = [];
    $posts = [];
    foreach($result as $val){
        $posts[] = $val['post_id'];
    }

    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post__not_in' => $posts,
        'post_type' => 'images',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'terms' => $category_id,
            )
        )
    ));
    if ($q->have_posts()) {

        while ($q->have_posts()) :
            $q->the_post();
            $img_id = get_the_ID();
            $title = get_the_title();
            $list['photos'] .= '<option value="' . $img_id . '">' . $title . '</option>';
        endwhile;

        wp_reset_query();

    }


    die(json_encode($list));
}

add_action('wp_ajax_user_photos', 'getUserPhotos');

function getUserPhotos()
{
    $category_id = $_POST['category_id'];
    $user_id = (int)$_POST['user_id'];
    global $wpdb;

    $sql = "SELECT post_id  FROM {$wpdb->prefix}users_curations";
    $sql .= " WHERE user_id =" . $user_id;
    $result = $wpdb->get_results($sql, 'ARRAY_A');
    $list = [];
    $posts = [];
    foreach($result as $val){
        $posts[] = $val['post_id'];
    }
    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'images',
        'post__in' => $posts,
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' =>'author_categories',
                'terms' => $category_id,
            ),
            array(
                'taxonomy' =>'img_categories',
                'terms' => $category_id,
            )
        )
    ));
    if ($q->have_posts()) {

        while ($q->have_posts()) :
            $q->the_post();
            $img_id = get_the_ID();
            $title = get_the_title();
            $list['photos'] .= '<li>' . $title . '<span  class="delete" data-id="' . $img_id . '">X</span></li>';
        endwhile;

        wp_reset_query();

    }

    die(json_encode($list));
}

add_action('wp_ajax_delete_post', 'getDeletePost');

function getDeletePost()
{
    global $wpdb;
    $post_id = (int)$_POST['post_id'];
    $user_id = (int)$_POST['user_id'];
    $category_id = (int)$_POST['category_id'];

    $wpdb->query("DELETE FROM ".$wpdb->prefix."users_curations WHERE user_id={$user_id} AND post_id={$post_id}");



    $list['categories'] = Curation_Plugin::getUserCategories($user_id);
    foreach (Curation_Plugin::$users_photos as $post) {
        $list['photos'][]= '<li>' . get_the_title($post['post_id']) . '<span class="delete" data-id="' . $post['post_id'] . '">X</span></li>';
    }
    die(json_encode($list));
}

add_action('wp_ajax_add_user_photos', 'addUserPhotos');

function addUserPhotos()
{
    global $wpdb;
    $user_id = (int)$_POST['user_id'];
    foreach($_REQUEST['posts'] as $val){
        $wpdb->insert( $wpdb->prefix . 'users_curations', array( 'post_id' => $val, 'user_id' => $user_id ), array( '%d', '%d' ) );
    }


    $list['categories'] = Curation_Plugin::getUserCategories($user_id);
    foreach (Curation_Plugin::$users_photos as $post) {
        $list['photos'][]= '<li>' . get_the_title($post['post_id']) . '<span class="delete" data-id="' . $post['post_id'] . '">X</span></li>';
    }
    die(json_encode($list));

}

?>