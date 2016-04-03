<?php
/*
Plugin Name: likes
Description: Simple and flexible favorite buttons for any post type.

*/

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Likes_List extends WP_List_Table
{

    /** Class constructor */
    public function __construct()
    {

        parent::__construct([
            'singular' => __('Like', 'sp'), //singular name of the listed records
            'plural' => __('Likes', 'sp'), //plural name of the listed records
            'ajax' => false //does this table support ajax?
        ]);

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

        $sql = "SELECT * FROM {$wpdb->prefix}likes";

        $sql .= " WHERE user_id =" . esc_sql($_REQUEST['user_id']);

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }

        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;


        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }


    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_customer($id)
    {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}likes",
            ['ID' => $id],
            ['%d']
        );
    }


    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count()
    {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}likes";
        $sql .= " WHERE user_id =" . esc_sql($_REQUEST['user_id']);
        return $wpdb->get_var($sql);
    }


    /** Text displayed when no customer data is available */
    public function no_items()
    {
        _e('No likes avaliable.', 'sp');
    }

    /**
     * @param $id
     * @return string
     */
    public function getThumbs($id)
    {
        $ava = wp_get_attachment_image_src(get_field('img_image', $id), 'tx170');
        if (count($ava) > 0) {
            return '<img src="' . $ava[0] . '">';
        }
        return '';
    }

    /**
     * @param $post_id
     * @return string
     */
    public function getAuthor($post_id)
    {
        $terms = wp_get_post_terms($post_id, 'author_categories');
        if (count($terms) > 0) {
            return $terms[0]->name;

        } else {
            return '';
        }
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
                return $this->getAuthor($item['post_id']);
            case 'image_id':
                    return '<a href="/wp-admin/post.php?post='.$item['post_id'].'&action=edit">'.$item['image_id'].'</a>';
            case 'date':
                return $item[$column_name];
            case 'post_id':
                return $this->getThumbs($item[$column_name]);
            default:
                return true;
//                return print_r( $item, true ); //Show the whole array for troubleshooting purposes
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
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['ID']
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

        $title = '<strong>' . $item['name'] . '</strong>';

        $actions = [
            'delete' => sprintf('<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Delete</a>', esc_attr($_REQUEST['page']), 'delete', absint($item['ID']), $delete_nonce)
        ];

        return $title . $this->row_actions($actions);
    }


    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns()
    {
        $columns = [
//            'cb'      => '<input type="checkbox" />',
            'image_id' => __('ID', 'sp'),
            'id' => __('Artist', 'sp'),
            'post_id' => __('Thumbnails', 'sp'),
            'date' => __('Date', 'sp')
        ];

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
//            'name' => array( 'name', true ),
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
        $actions = [
//            'bulk-delete' => 'Delete'
        ];

        return $actions;
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

        $this->set_pagination_args([
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page' => $per_page //WE have to determine how many items to show on a page
        ]);

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
                self::delete_customer(absint($_GET['customer']));

                wp_redirect(esc_url(add_query_arg()));
                exit;
            }

        }

        // If the delete bulk action is triggered
        if ((isset($_POST['action']) && $_POST['action'] == 'bulk-delete')
            || (isset($_POST['action2']) && $_POST['action2'] == 'bulk-delete')
        ) {

            $delete_ids = esc_sql($_POST['bulk-delete']);

            // loop over the array of record IDs and delete them
            foreach ($delete_ids as $id) {
                self::delete_customer($id);

            }

            wp_redirect(esc_url(add_query_arg()));
            exit;
        }
    }

}


class SP_Plugin
{

    // class instance
    static $instance;

    // customer WP_List_Table object
    public $customers_obj;

    // class constructor
    public function __construct()
    {
        add_filter('set-screen-option', [__CLASS__, 'set_screen'], 10, 3);
        add_action('admin_menu', [$this, 'plugin_menu']);
    }


    public static function set_screen($status, $option, $value)
    {
        return $value;
    }

    public function plugin_menu()
    {

        $hook = add_menu_page(
            'Page Likes users',
            'Likes users',
            'manage_options',
            'likes_users',
            [$this, 'plugin_settings_page']
        );

        add_action("load-$hook", [$this, 'screen_option']);

    }

    public function getUsers(){
        $users=' <option value="">Choose User</option>';
        $args = array(
            'blog_id'      => $GLOBALS['blog_id'],
            'role'         => '',
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
        var_dump($users_list);
        foreach( $users_list as $user ){

            $users .='<option value="'.$user->ID.'">'.$user->display_name.'</option>';
        }
        return $users;
    }

    /**
     * Plugin settings page
     */
    public function plugin_settings_page()
    {
        ?>
        <div class="wrap">
            <h2>Likes Users</h2>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder">
                    <div id="post-body-content">
                        <form name="users" action="/wp-admin/admin.php" method="get">
                            <input type="hidden" name="page" value="likes_users">
                            <select name="user_id" id="" onchange="submit();">
                               <?php echo $this->getUsers(); ?>
                            </select>
                        </form>
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
                <a href="/wp-admin/users.php">Back to Users</a>
            </div>
        </div>
        <?php
    }

    /**
     * Screen options
     */
    public function screen_option()
    {

        $option = 'per_page';
        $args = [
            'label' => 'Likes',
            'default' => 5,
            'option' => 'customers_per_page'
        ];

        add_screen_option($option, $args);

        $this->customers_obj = new Likes_List();
    }


    /** Singleton instance */
    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}


add_action('plugins_loaded', function () {
    SP_Plugin::get_instance();
});

?>