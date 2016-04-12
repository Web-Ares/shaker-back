<?php

/**
 * Created by PhpStorm.
 * User: iutin
 * Date: 11.04.16
 * Time: 15:04
 */
class UserCategories
{
    /**
     * @var array
     */
    public static $categories = [];
    public static $usercategories = [];
    public static $userchecks = [];

    public static $user_id = null;
    public static $user = null;
    public static $send = false;

    function __construct()
    {
        self::$user = wp_get_current_user();
        self::$user_id = self::$user->ID;
        $this->get_user_categories();
    }

    public static function setUserCategories($checks)
    {
        self::$userchecks = $checks;
        self::clearUserCategories();
        if (isset($_POST)) self::$send = true;
        foreach ($checks as $check) {
            self::setUserCategory($check);
        };
    }

    protected static function setUserCategory($cat_id)
    {
        global $wpdb;
        $wpdb->insert($wpdb->prefix . 'categories', array('category_id' => $cat_id, 'user_id' => self::$user_id), array('%d', '%d'));
    }

    protected static function clearUserCategories()
    {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}categories",
            ['user_id' => self::$user_id],
            ['%d']
        );
    }

    public static function setUserWish($wish)
    {

        if (!empty($wish)) {
            self::sendMail($wish, self::$user->display_name, self::$user->ID);
        }

    }

    protected static function sendMail($wish, $user,$user_id)
    {
        $mails = array();

        $mails[] = get_field('e_email', 'options');

        $content_mail = "Wish category: ".$wish . "\n\r User: ".$user . "\n\r User id: ".$user_id;
        $multiple_to_recipients = $mails;

        add_filter('wp_mail_content_type', 'set_html_content_type');

        wp_mail($multiple_to_recipients, 'Wish category', $content_mail);

        // Сбросим content-type, чтобы избежать возможного конфликта
        remove_filter('wp_mail_content_type', 'set_html_content_type');

        function set_html_content_type()
        {
            return 'text/html';
        }
    }

    protected function get_user_categories()
    {
        global $wpdb;

        $sql = "SELECT category_id FROM {$wpdb->prefix}categories";

        $sql .= " WHERE user_id =" . esc_sql(self::$user_id);

        $result = $wpdb->get_results($sql, 'ARRAY_A');
        self::$usercategories = $result;

    }

    public static function checkInput($cat_id)
    {
        if (count(self::$userchecks) > 0 or self::$send) {
            for ($i = 0; $i < count(self::$userchecks); $i++) {

                if (self::$userchecks[$i] == $cat_id) {
                    return 'checked';
                }

            }
        } else {
            for ($i = 0; $i < count(self::$usercategories); $i++) {

                if (self::$usercategories[$i]['category_id'] == $cat_id) {
                    return 'checked';
                }

            }
        }

    }

    public static function categories_form()
    {
        $args = array(
            'type' => 'post',
            'child_of' => 0,
            'parent' => 0,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 1,
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'number' => 0,
            'taxonomy' => 'img_categories',
            'pad_counts' => false
        );

        self::$categories = get_categories($args);
        $count_col = ceil(count(self::$categories) / 4);

        if (self::$categories) {
            $i = 0;
            $list = '<div>';
            foreach (self::$categories as $cat) {
                if ($i == $count_col) {
                    $list .= '</div><div>';
                    $i = 0;
                }
                $list .= '<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" value="' . $cat->term_id . '" ' . self::checkInput($cat->term_id) . ' name="categor[]" id="check' . $cat->term_id . '">
								<label for="check' . $cat->term_id . '">' . $cat->name . '</label>
							</div>
							<!-- /nice-checkbox -->';


                $i++;
            }
            if ($i >= 0) {
                $list .= '<!-- personal-wish-list__area -->
							<div class="personal-wish-list__area">
								<textarea class="site__area" name="own-wish" id="own-wish" cols="30" rows="10" placeholder="Make Your Own Wish"></textarea>
							</div>
							<!-- /personal-wish-list__area --></div>';
                $i = 0;
            }
            echo $list;
        }
    }

}