<?php
/**
 * @return string
 */
function document_title()
{
    global $s;

    if (function_exists('seo_title_tag')) {
        seo_title_tag();

        return null;
    } else if (class_exists('All_in_One_SEO_Pack') || class_exists('Platinum_SEO_Pack') || class_exists('WPSEO_Frontend')) {
        if (is_front_page() || is_home()) {
            $output = get_bloginfo('name') . ' &#8212; ' . get_bloginfo('description');
        } else {
            $output = wp_title('', false);
        }
    } else {
        if (is_attachment()) {
            $output = get_bloginfo('name') . ' &#8212; ' . single_post_title('', false);
        } else if (is_single()) {
            $output = single_post_title('', false);
        } else if (is_home()) {
            $output = get_bloginfo('name') . ' &#8212; ' . get_bloginfo('description');

        } else if (is_page()) {
            $output = single_post_title('', false);
        } else if (is_search()) {
            $output = get_bloginfo('name') . ' &#8212; ' . sprintf(__('Результаты поиска для: %s'), esc_html($s));
        } else if (is_404()) {
            $output = get_bloginfo('name') . ' &#8212; ' . __('Ничего не найдено.');
        } else {
            $output = get_bloginfo('name') . wp_title('&#8212;', false);
        }
    }

    echo apply_filters('document_title', $output);
}

function get_main_menu($post_id, $menu_name, $wrap_list = "nav", $wrap_class = "", $wrap_link = false)
{

    $menu_items = wp_get_nav_menu_items($menu_name);
    $menu_list = '<' . $wrap_list . ' class="' . $wrap_class . '">';
    foreach ((array)$menu_items as $key => $menu_item) {

        if ($post_id == $menu_item->object_id) {
            $class = "class='active'";
        } else {
            $class = "";
        }
        $title = $menu_item->title;
        $url = $menu_item->url;

        if ($wrap_link) {
            $menu_list .= '<' . $wrap_link . '>' . '<a href="' . $url . '" ' . $class . '>' . $title . '</a>' . '</' . $wrap_link . '>
            ';
        } else {
            $menu_list .= '<a href="' . $url . '" ' . $class . '>' . $title . '</a>
            ';
        }

    }

    $menu_list .= '</' . $wrap_list . '>';
    return $menu_list;
}

function get_team_category()
{

    $terms = get_terms('p_categories', 'hide_empty=1');
    if ($terms) {
        echo '<ul>';
        foreach ($terms as $term) {
            echo '<li><a href="' . esc_url(home_url('/')) . 'team/#' . $term->slug . '">' . $term->name . '</a></li>';
        }
        echo '</ul>';
    }
    wp_reset_query();

}

function get_team_list()
{
    $taxonomy = 'p_categories';
    $taxonomy_terms = get_terms($taxonomy, array(
        'hide_empty' => 0,
        'fields' => 'id=>slug',
        'orderby' => 'term_order'
    ));
    $team = '';
    foreach ($taxonomy_terms as $key => $taxonomy_slug) {
        $q = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'team',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'terms' => $key,
                )
            )
        ));

        $anchor = 'id="' . $taxonomy_slug . '" ';
        while ($q->have_posts()) :
            $q->the_post();
            $page_id = get_the_ID();
            $position = get_field('t_position', $page_id);
            $photo = wp_get_attachment_image(get_field('t_photo', $page_id), '298x252');

            if ( empty($photo) ) {
                $photo =  sprintf('<img src="%s" alt="Avatar">', TEMPLATEURI . '/img/img_avatar.jpg');
            }

            $team .= '<div class="team__item" ' . $anchor . '>
                        <!--team__item-pic-->
                        <div class="team__item-pic">
                            ' . $photo . '
                        </div>
                        <!--/team__item-pic-->

                        <!--team__item-title-->
                        <div class="team__item-title">
                            <div class="team__item-name">
                                <span>' . get_the_title() . '</span>
                                ' . $position . '
                            </div>

                            <!--team__item-sub-->
                            <div class="team__item-sub">
                                ' . apply_filters('the_content', get_the_content()) . '
                            </div>
                            <!--/team__item-sub-->

                        </div>
                        <!--/team__item-title-->
                    </div>';
            $anchor = '';
        endwhile;

        wp_reset_query();
    }
    echo $team;

}

function get_team_list_categories()
{
    $taxonomy = 'p_categories';
    $taxonomy_terms = get_terms($taxonomy, array(
        'hide_empty' => 0,
        'parent' => 56,
        'fields' => 'all',
        'orderby' => 'term_order'
    ));

    foreach ($taxonomy_terms as $key => $taxonomy_term) {
        $q = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'team',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'terms' => $taxonomy_term->term_id,
                )
            )
        ));


        $anchor = 'id="' . $taxonomy_term->slug . '" ';
        if ($q->have_posts()) {
            $teams = '<!--team-->
        <div class="team" ' . $anchor . '>

            <!--site__wrap-->
            <div class="site__wrap">

                <!--team__title-->
                <h2 class="team__title">' . $taxonomy_term->name . '</h2>
                <!--/team__title-->';
            while ($q->have_posts()) :
                $q->the_post();
                $page_id = get_the_ID();
                $position = get_field('t_position', $page_id);
                $photo = wp_get_attachment_image(get_field('t_photo', $page_id), '298x252');

                if (empty($photo)) {
                    $photo = sprintf('<img src="%s" alt="Avatar">', TEMPLATEURI . '/img/img_avatar.jpg');
                }

                $teams .= '<div class="team__item">
                        <!--team__item-pic-->
                        <div class="team__item-pic">
                            ' . $photo . '
                        </div>
                        <!--/team__item-pic-->

                        <!--team__item-title-->
                        <div class="team__item-title">
                            <div class="team__item-name">
                                <span>' . get_the_title() . '</span>
                                ' . $position . '
                            </div>

                            <!--team__item-sub-->
                            <div class="team__item-sub">
                                ' . apply_filters('the_content', get_the_content()) . '
                            </div>
                            <!--/team__item-sub-->

                        </div>
                        <!--/team__item-title-->
                    </div>';
                $anchor = '';
            endwhile;

            wp_reset_query();

            $teams .= '</div>
            <!--/site__wrap-->
        </div>
        <!--/team-->';
            echo $teams;
        }

    }


}


?>