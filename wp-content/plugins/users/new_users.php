<?php

/*
Plugin Name: New Users
Description: New Users list.

*/

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class New_Users_List extends WP_List_Table
{

    /**
     * Likes_List constructor.
     */
    public function __construct()
    {

        parent::__construct(array(
            'singular' => __('New User', 'sp'), //singular name of the listed records
            'plural' => __('New Users', 'sp'), //plural name of the listed records
            'ajax' => false //does this table support ajax?
        ));

    }


    /**
     * Retrieve customers data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_customers($per_page = 5, $page_number = 1)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}newusers";

        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;


        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }

    /** Text displayed when no customer data is available */
    public function no_items()
    {
        _e('No new users avaliable.', 'sp');
    }

    /**
     * Render a column when no column specific method exist.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
                return $item['id'];
            case 'name':
                return $item['name'];
            case 'email':
                return $item['email'];
            case 'nickname':
                return $item['nickname'];
            default:
                return true;
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
        );
    }


    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_name($item)
    {

        $delete_nonce = wp_create_nonce('sp_delete_customer');
        $edit_nonce = wp_create_nonce('sp_edit_customer');

        $title = '<strong>' . $item['name'] . '</strong>';

        $actions = array(
            'delete' => sprintf('<a href="?page=%s&action=%s&new_user=%s&_wpnonce=%s">Delete</a>', esc_attr($_REQUEST['page']), 'delete', absint($item['id']), $delete_nonce),
            'edit' => sprintf('<a href="?page=%s&action=%s&new_user=%s&_wpnonce=%s">Edit</a>', esc_attr($_REQUEST['page']), 'edit', absint($item['id']), $edit_nonce)
        );

        return $title . $this->row_actions($actions);
    }


    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns()
    {
        $columns = array(
            'id' => __('ID', 'sp'),
            'name' => __('Name', 'sp'),
            'email' => __('Email', 'sp'),
            'nickname' => __('User name', 'sp')
        );

        return $columns;
    }


    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns()
    {
        $sortable_columns = array(
            'name' => array('name', true)
//            'city' => array( 'city', false )
        );

        return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions()
    {
        $actions = array();

        return $actions;
    }

    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}newusers";

        if (!empty($_REQUEST['user_id']))
            $sql .= " WHERE user_id =" . esc_sql($_REQUEST['user_id']);
        return $wpdb->get_var($sql);
    }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items()
    {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page = $this->get_items_per_page('customers_per_page', 5);
        $current_page = $this->get_pagenum();
        $total_items = self::record_count();

        $this->set_pagination_args(array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page' => $per_page //WE have to determine how many items to show on a page
        ));

        $this->items = self::get_customers($per_page, $current_page);
    }

    public function process_bulk_action()
    {

        //Detect when a bulk action is being triggered...
        if ('delete' === $this->current_action()) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);

            if (!wp_verify_nonce($nonce, 'sp_delete_customer')) {
                die('Go get a life script kiddies');
            } else {
                self::delete_user(absint($_GET['new_user']));

                wp_redirect(esc_url(add_query_arg()));

                exit;
            }

        }

        //Detect when a bulk action is being triggered...
        if ('edit' === $this->current_action()) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);

            if (!wp_verify_nonce($nonce, 'sp_edit_customer')) {
                die('Go get a life script kiddies');
            } else {

                wp_redirect(esc_url(add_query_arg()));

                exit;
            }

        }

    }

}

class New_Users_Plugin
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
    static $users_categories = array();

    /**
     * @var array
     */
    static $users_photos = array();

    static $user_id;

    /**
     * Curation_Plugin constructor.
     */
    public function __construct()
    {
        add_action('init', array('New_Users_Plugin', 'check_plugin_edituser_page'));
        add_filter('set-screen-option', array(__CLASS__, 'set_screen'), 10, 3);
        add_action('admin_menu', array($this, 'plugin_menu'));
    }

    public static function check_plugin_edituser_page()
    {
        if (isset($_POST['submit_new_user'])) {
            if (empty($_POST['password'])){
                self::pip_errors()->add('none_user', 'Password was empty');
                return false;
            }
            if (empty($_POST['email'])){
                self::pip_errors()->add('none_user_email', 'Email was empty');
                return false;
            }
            if (empty($_POST['name'])){
                self::pip_errors()->add('none_user_name', 'Name was empty');
                return false;
            }
            if(email_exists($_POST['email'])){
                self::pip_errors()->add('none_email', 'Email already exist');
                return false;
            }
            if(username_exists($_POST['login'])) {
                self::pip_errors()->add('none_username', 'Username already exist');
                return false;
            } else {
                self::$user_id = absint($_GET['new_user']);
                self::createUser(esc_attr($_POST['email']),esc_attr($_POST['name']),esc_attr($_POST['password']),esc_attr($_POST['login']));
            }
        }
    }

    public static function delete_user($id)
    {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}newusers",
            array('ID' => $id),
            array('%d')
        );
    }

    public static function createUser($email,$display_name,$pass,$login){
        $user_id = wp_create_user($login, $pass, $email);

        if($user_id){
            $user_id_role = new WP_User($user_id);
            $user_id_role->set_role('client');
            wp_update_user(array(
                    'ID' => $user_id,
                    'display_name' => $display_name
                )
            );
            self::sendLetters($user_id,$pass);

            self::delete_user(self::$user_id);
            wp_redirect('/wp-admin/admin.php?page=new_users');
        }
    }
    public static function sendLetters($user_id,$key_user){
        $user = get_userdata( $user_id );

        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
        $message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
        $message .= sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
        $message .= sprintf(__('Email: %s'), $user->user_email) . "\r\n";
        $message .= sprintf(__('User\'s Password: %s'), '('.$key_user.')') . "\r\n";

        @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);

        $message = sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
        $message .= 'Your password, for visits the site: '. $key_user . "\r\n\r\n";

        @wp_mail($user->user_email, sprintf(__('[%s] Your username and password info'), $blogname), $message);
    }

    public static function pip_show_error_messages()
    {
        if ($codes = self::pip_errors()->get_error_codes()) {
            echo '<div class="pippin_message error">';
            // Loop error codes and display errors
            foreach ($codes as $code) {
                $message = self::pip_errors()->get_error_message($code);
                echo '<span class="pippin_error">' . $message . '</span><br/>';
            }
            echo '</div>';
        }
    }

    public static function pip_errors()
    {
        static $wp_error; // Will hold global variable safely
        return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
    }

    public static function generateUserPass()
    {
        // Generate something random for a password reset key.
        return $key_user = wp_generate_password(20, false);
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


    public static function getUser($user_id)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}newusers";
        $sql .= " WHERE id =" . $user_id;
        return $wpdb->get_results($sql, 'ARRAY_A');
    }

    /**
     * hooks
     */
    public function plugin_menu()
    {

        $hook = add_menu_page(
            'New users',
            'New users',
            'manage_options',
            'new_users',
            array($this, 'plugin_new_users_page')
        );


        add_action("load-$hook", array($this, 'screen_option'));


    }

    /**
     * Screen options
     */
    public function screen_option()
    {

        $option = 'per_page';
        $args = array(
            'label' => 'Count',
            'default' => 5,
            'option' => 'customers_per_page'
        );

        add_screen_option($option, $args);

        $this->customers_obj = new New_Users_List();
    }

    public function current_action()
    {
        if (isset($_REQUEST['filter_action']) && !empty($_REQUEST['filter_action']))
            return false;

        if (isset($_REQUEST['action']) && -1 != $_REQUEST['action'])
            return $_REQUEST['action'];

        if (isset($_REQUEST['action2']) && -1 != $_REQUEST['action2'])
            return $_REQUEST['action2'];

        return false;
    }

    /**
     * Plugin edituser page
     */
    public function plugin_edituser_page()
    {
        require_once("new_userspage.php");
    }

    /**
     * Plugin new users page
     */
    public function plugin_new_users_page()
    {
        //Detect when a bulk action is being triggered...
        if ('edit' == $this->current_action()) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr($_REQUEST['_wpnonce']);

            $this->plugin_edituser_page();
        } else {
            ?>
            <div class="wrap">
                <h2>New Users</h2>

                <div id="poststuff">
                    <div id="post-body" class="metabox-holder">
                        <div id="post-body-content">
                            <div class="meta-box-sortables ui-sortable">
                                <form method="post">
                                    <?php
                                    $this->customers_obj->prepare_items();
                                    $this->customers_obj->display(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                </div>
            </div>
            <?php
        }
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
    New_Users_Plugin::get_instance();
});

?>