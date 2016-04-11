<?php
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
    if( wp_get_current_user()->exists() )
        $menu_name = 'auth_menu';
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
            if($menu_item->type=='custom'){
                $menu_list .= '<a href="' . wp_logout_url(home_url()) . '" class="site__menu-nonelink" data-href="link">' . $title . '</a>';

            }else{
                $menu_list .= '<a href="' . $url . '" class="site__menu-link" data-href="' . getPostnameMenu($menu_item->object_id) . '">' . $title . '</a>';

            }
        }

    return $menu_list . '</nav>';
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
