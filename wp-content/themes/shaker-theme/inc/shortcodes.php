<?php
add_shortcode('contact_us_link', 'our_contact_us_link');
function our_contact_us_link()
{
    $link_cn = get_field('o_contact_us_link', 'options');
    if ($link_cn)
        return '<div class="contact-us"><a href="' . $link_cn . '">Contact Us</a></div>';
}

function switch_languages()
{
    $poly_array = pll_the_languages(array('raw' => true));
    $list = '<div class="language">';
    foreach ($poly_array as $lang) {
        if (pll_current_language('slug') == $lang['slug']) {
            $list .= '<span>' . $lang['name'] . '</span>';
        } else {
            $list .= '<a href="' . $lang['url'] . '">' . $lang['name'] . '</a>';
        }
    }

    return $list . '</div>';
}

function home_slider()
{
    $list = '<div class="home-slider">

            <!-- Slider main container -->
            <div class="swiper-container">

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">';

    if (have_rows('h_images')) {
        while (have_rows('h_images')) {
            the_row();
            $image = wp_get_attachment_image_src(get_sub_field('g_image'), 'full');
            $color = get_sub_field('logo_color');

            $list .= '<div class="home-slider__item ' . $color . ' swiper-slide" style="background-image: url(' . $image[0] . ')"></div>';
        }
    }


    $list .= ' </div>

            </div>

        </div>';
    return $list;
}

function getPostname($object)
{
    return $post_name = $object->post_name;
}

function getPostnameMenu($object_id)
{
    $post = get_post($object_id, ARRAY_A);
    return $post_name = $post['post_name'];
}

function get_menu_items($menu_name)
{
    $locations = get_nav_menu_locations();
    $menu_items = wp_get_nav_menu_items($locations[$menu_name]);
    $menu_list = '<nav class="site__menu-nav site__menu-nav_ajax">';
    if (is_array($menu_items))
        foreach ((array)$menu_items as $key => $menu_item) {
            $class = '';
            $classes = $menu_item->classes;
            foreach ($classes as $key => $val) {
                $class .= ' ' . $val;
            }

            $title = $menu_item->title;
            $url = $menu_item->url;
            $menu_list .= '<a href="' . $url . '" class="site__menu-link" data-href="' . getPostnameMenu($menu_item->object_id) . '">' . $title . '</a>';

        }

    return $menu_list . '</nav>';
}

function getLimitedCat($user_id, $cat)
{

    global $wpdb;

    $user_id = 0;
    $sql = "SELECT post_id FROM {$wpdb->prefix}users_curations";
    $sql .= " WHERE user_id =" . $user_id;
    $result = $wpdb->get_results($sql, 'ARRAY_A');
    $args = array();
    $defaults = array('fields' => 'all');
    $args = wp_parse_args($args, $defaults);
    $users_categories = array();

    foreach ($result as $post) {
        $cats = wp_get_object_terms($post['post_id'], $cat, $args);
        foreach ($cats as $key => $category) {
            $users_categories[$category->term_id]['title'] = $category->name;
            $users_categories[$category->term_id]['id'] = $category->term_id;
        }
    }

    return $users_categories;
}

function visualCategor($categories)
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

function getCatAndPost($cat)
{

    global $wpdb;

    $user_id = 0;


    $sql = "SELECT post_id FROM {$wpdb->prefix}users_curations";
    $sql .= " WHERE user_id =" . $user_id;
    $result = $wpdb->get_results($sql, 'ARRAY_A');
    $args = array();
    $defaults = array('fields' => 'all');
    $args = wp_parse_args($args, $defaults);
    $users_categories = array();

    foreach ($result as $post) {
        $cats = wp_get_object_terms($post['post_id'], $cat, $args);
        foreach ($cats as $key => $category) {
            $users_categories[$category->term_id]['title'] = $category->name;
            $users_categories[$category->term_id]['id'] = $category->term_id;
            $users_categories[$category->term_id]['posts'][] = $post['post_id'];
        }
    }

    return $users_categories;
}
function getImgName($image){
    $cur_slug = pll_current_language('slug');
    if($cur_slug=='de'){
        return $image['img_title_de'];
    }else{
       return get_the_title($image['post_id']);
    }
}
function getImgAuthor($image){
    $cur_slug = pll_current_language('slug');
    if($cur_slug=='de'){
        return get_field('cat_translate', 'author_categories_'.$image['img_author']);
    }else{
        $tt = get_term( $image['img_author'], 'author_categories');
        return $tt->name;
    }
}

function setLimitedSlider($images,$islast)
{

    if (count($images) > 1 or $islast===true) {
        $list = "<div class='swiper-slide swiper-slide_vertical'>";
    } else {
        $list = "<div class='swiper-slide'>";
    }

    foreach ($images as $image) {
//        var_dump($image);
        $author = getImgAuthor($image);
        $current_user = wp_get_current_user();
        $needle = $image['post_id'];
        $islike = "";
        foreach($image['likes'] as $like_id){
            if($like_id['post_id']==$needle) $islike='liked';
        }

        $like = 0 == $current_user->ID?'':"<a href='#' class='single-photos-slider__like ".$islike."' data-action='' data-id='".$image['post_id']."' image-id='".$image['img_id']."'>like</a>";
        $title = getImgName($image);
        $list .= " <!-- single-photos-slider__item -->
                                                <div class='single-photos-slider__item' style='background-image: url(".$image['img_image'].")'>

                                                    ".$like."

                                                    <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                    <!-- single-photos-slider__info -->
                                                    <div class='single-photos-slider__info'>
                                                        <div>
                                                            <span class='single-photos-slider__author'>".$author."</span>
                                                            <span class='single-photos-slider__name'>".$title."</span>
                                                        </div>
                                                        <div>
                                                            <span class='single-photos-slider__price'>5,600 €</span>

                                                            <!-- single-photos-slider__sizes -->
                                                            <div class='single-photos-slider__sizes'>

                                                                <!-- single-photos-slider__sizes-selected -->
                                                                <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                                <!-- /single-photos-slider__sizes-selected -->

                                                                <!-- single-photos-slider__drop -->
                                                                <div class='single-photos-slider__drop'>
                                                                    <a class='active' href='#'>10x90 cm</a>
                                                                    <a href='#'>110x156 cm</a>
                                                                    <a href='#'>250x620 cm</a>
                                                                </div>
                                                                <!-- /single-photos-slider__drop -->

                                                                <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>5</span>/<span>3</span>]
                                                                </span>
                                                                <!-- /single-photos-slider__count -->

                                                            </div>
                                                            <!-- /single-photos-slider__sizes -->

                                                        </div>
                                                    </div>
                                                    <!-- single-photos-slider__info -->

                                                </div>
                                                <!-- /single-photos-slider__item -->";
    }

    $list .= "</div>";
    return $list;
}
function get_user_likes($user_id)
{

    global $wpdb;

    $sql = "SELECT post_id FROM {$wpdb->prefix}likes";

    $sql .= " WHERE user_id =" . esc_sql($user_id);

    $result = $wpdb->get_results($sql, 'ARRAY_A');

    return $result;
}

?>
