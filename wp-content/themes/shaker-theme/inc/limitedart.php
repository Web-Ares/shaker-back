<?php

/**
 * Created by PhpStorm.
 * User: iutin
 * Date: 11.04.16
 * Time: 15:04
 */
class Limitedart
{
    /**
     * @var array
     */
    public static $limited_categories = [];


    public static function getCategories($isajax = true, $button = false)
    {
        global $wpdb;

        if ($button === false) {
            $button = esc_sql($_GET['data-id']);
        }

        $user_id = 0;


        if ($button == 'author_categories') {
            $response = array('id' => 'img_categories');
            $response['btn'] = pll__('Categories');
        } else {
            $response = array('id' => 'author_categories');
            $response['btn'] = pll__('Signature line');
        }

        $response["set"] = self::getLimitedCat($user_id, $button);

        if ($isajax == '') {
            die(json_encode($response));
        } else {
            return $response;
        }
    }

    public static function getLimitedCat($user_id, $cat)
    {
        global $wpdb;

        $user_id = 0;
        $sql = "SELECT post_id FROM {$wpdb->prefix}users_curations";
        $sql .= " WHERE user_id =" . $user_id;
        $result = $wpdb->get_results($sql, 'ARRAY_A');
        $args = array();
        $defaults = array('fields' => 'all', 'parent' => 0);
        $args = wp_parse_args($args, $defaults);

        foreach ($result as $post) {
            $cats = wp_get_object_terms($post['post_id'], $cat, $args);
            foreach ($cats as $key => $category) {
                $cur_slug = pll_current_language('slug');
                if ($cur_slug == 'de') {
                    self::$limited_categories[$category->term_id]['title'] = get_field('cat_translate', $cat.'_' . $category->term_id);
                }else{
                    self::$limited_categories[$category->term_id]['title'] = $category->name;
                }
                self::$limited_categories[$category->term_id]['id'] = $category->term_id;
            }
        }

//        shuffle(self::$limited_categories);

        self::adaptiveArray();
        return self::$limited_categories;
    }

    public static function adaptiveArray()
    {
        $temp_array = [];
        foreach (self::$limited_categories as $key => $category) {
            $temp_array[$category['id']] = $category;
        }
        self::$limited_categories = $temp_array;
    }

    public static function visualCategor($categories)
    {
        $list = '';
        $i = 0;
        foreach ($categories['set'] as $category) {
            if ($list == '') {
                $list .= '<div class="categories__set">';
                $class = 'active';
            } else {
                $class = '';
            }
            $list .= ' <a href=\'#\' class="categories__set-item ' . $class . '" data-slider="' . $i . '">' . $category["title"] . '</a>
        ';
            $i++;
        }

        $list .= '</div>';


        $list .= ' <!-- categories__name -->
                    <div class="categories__name">

                        <!-- categories__btn -->
                        <a href=\'#\' class="categories__btn" data-id="' . $categories['id'] . '">' . $categories['btn'] . '</a>
                        <!-- /categories__btn -->

                    </div>
                    <!-- /categories__name -->';


        return $list;
    }

    public static function getCatAndPost($cat)
    {

        global $wpdb;

        $user_id = 0;

        $sql = "SELECT post_id FROM {$wpdb->prefix}users_curations";
        $sql .= " WHERE user_id =" . $user_id;
        $result = $wpdb->get_results($sql, 'ARRAY_A');
        $args = array();
        $defaults = array('fields' => 'all', 'parent' => 0);
        $args = wp_parse_args($args, $defaults);

        foreach ($result as $post) {
            $cats = wp_get_object_terms($post['post_id'], $cat, $args);
            foreach ($cats as $key => $category) {
                self::$limited_categories[$category->term_id]['title'] = $category->name;
                self::$limited_categories[$category->term_id]['id'] = $category->term_id;
                self::$limited_categories[$category->term_id]['posts'][] = $post['post_id'];
            }
        }
        return self::$limited_categories;
    }


    public static function getImgName($image)
    {
        $cur_slug = pll_current_language('slug');
        if ($cur_slug == 'de') {
            return $image['img_title_de'];
        } else {
            return get_the_title($image['post_id']);
        }
    }

    public static function getImgAuthor($image)
    {
        $cur_slug = pll_current_language('slug');
        if ($cur_slug == 'de') {
            return get_field('cat_translate', 'author_categories_' . $image['img_author']);
        } else {
            $tt = get_term($image['img_author'], 'author_categories');
            return $tt->name;
        }
    }

    public static function getSelect($select)
    {

        if (count($select) > 0) {
            $list = "<span class='single-photos-slider__price'>" . $select[0]['img_size_i_price'] . "</span>";
            $list .= "
                                                            <!-- single-photos-slider__sizes -->
                                                            <div class='single-photos-slider__sizes'>

                                                                <!-- single-photos-slider__sizes-selected -->
                                                                <span class='single-photos-slider__sizes-selected'>" . $select[0]['img_size_i_(width_x_hight)_cm'] . "</span>
                                                                <!-- /single-photos-slider__sizes-selected -->

                                                                 <!-- single-photos-slider__drop -->
                                                                <div class='single-photos-slider__drop'>
            ";
            foreach ($select as $key => $val) {
                if ($key == 0) {
                    $active = 'active';
                } else {
                    $active = '';
                }
                $list .= "<a href='#' class='" . $active . "' data-price='" . $val['img_size_i_price'] . "'>" . $val['img_size_i_(width_x_hight)_cm'] . "</a>";
            }

            $list .= "
         </div>
                                                                <!-- /single-photos-slider__drop -->

                                                                <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>1</span>/<span>" . count($select) . "</span>]
                                                                </span>
                                                                <!-- /single-photos-slider__count -->

                                                            </div>
                                                            <!-- /single-photos-slider__sizes -->";

            return $list;
        } else {
            return '';
        }
    }

    public static function setLimitedSlider($images, $islast)
    {

        if (count($images) > 1 or $islast === true) {
            $list = "<div class='swiper-slide swiper-slide_vertical'>";
        } else {
            $list = "<div class='swiper-slide'>";
        }

        foreach ($images as $image) {
            $author = self::getImgAuthor($image);
            $current_user = wp_get_current_user();
            $needle = $image['post_id'];
            $islike = "";
            foreach ($image['likes'] as $like_id) {
                if ($like_id['post_id'] == $needle) $islike = 'liked';
            }
            $like = 0 == $current_user->ID ? '' : "<a href='#' class='single-photos-slider__like " . $islike . "' data-action='' data-id='" . $image['post_id'] . "' data-image_id='" . $image['img_id'] . "'>like</a>";
            $title = self::getImgName($image);
            $list .= " <!-- single-photos-slider__item -->
                                                <div class='single-photos-slider__item' style='background-image: url(" . $image['img_image'] . ")'>

                                                    " . $like . "

                                                    <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                    <!-- single-photos-slider__info -->
                                                    <div class='single-photos-slider__info'>
                                                        <div>
                                                            <span class='single-photos-slider__author'>" . $author . "</span>
                                                            <span class='single-photos-slider__name'>" . $title . "</span>
                                                        </div>
                                                        <div>
                                                            " . self::getSelect($image['img_list_variables']) . "

                                                        </div>
                                                    </div>
                                                    <!-- single-photos-slider__info -->

                                                </div>
                                                <!-- /single-photos-slider__item -->";
        }

        $list .= "</div>";
        return $list;
    }

}