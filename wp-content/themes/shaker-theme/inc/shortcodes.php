<?php
add_shortcode('contact_us_link', 'our_contact_us_link');
function our_contact_us_link()
{
    $link_cn = get_field('o_contact_us_link', 'options');
    if ($link_cn)
        return '<div class="contact-us"><a href="'.$link_cn.'">Contact Us</a></div>';
}

function switch_languages(){
$poly_array = pll_the_languages(array('raw' => true));
    $list='<div class="language">';
    foreach($poly_array as $lang){
        if (pll_current_language('slug') == $lang['slug']) {
            $list.='<span>'.$lang['name'].'</span>';
        } else {
            $list.='<a href="'.$lang['url'].'">'.$lang['name'].'</a>';
        }
    }

   return $list.'</div>';
}

function home_slider(){
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

            $list .= '<div class="home-slider__item '.$color.' swiper-slide" style="background-image: url('.$image[0].')"></div>';
        }
    }


    $list.=' </div>

            </div>

        </div>';
    return $list;
}
function getPostname($object)
{
    return $post_name = $object->post_name;
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
            $menu_list .= '<a href="'.$url.'" class="site__menu-link" data-href="'.getPostname($menu_item->object_id).'">'.$title.'</a>';

        }

    return $menu_list.'</nav>';
}
?>
