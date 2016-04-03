<?php
/*
Plugin Name: Curations
Description: Curations list.

*/

class Curation_Plugin
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
            'Curations',
            'Curation users',
            'manage_options',
            'curation_users',
            [$this, 'plugin_settings_page']
        );

        add_action("load-$hook", [$this, 'screen_option']);

    }


    /**
     * Plugin settings page
     */
    public function plugin_settings_page()
    {
        ?>
        <div class="wrap">
            <h2>Curation Users</h2>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">

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
    Curation_Plugin::get_instance();
});

?>