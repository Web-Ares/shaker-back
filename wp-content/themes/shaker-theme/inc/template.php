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

function get_header_class($post_id, $post_name = false)
{
    $header_class = '';
    if (is_page_template('page-templates/contact-us.php')) {
        $header_class = 'site__header_contact-us';
    }
    if (is_page_template('page-templates/data-center.php') or is_page_template('page-templates/useful.php')) {
        $header_class = 'site__header_data-inner';
    }
    if (is_page_template('page-templates/team.php')) {
        $header_class = 'site__header_team';
    }
    if (is_page_template('page-templates/about.php')) {
        $header_class = 'site__header_about-us';
    }
    if (is_page_template('page-templates/testimonials.php')) {
        $header_class = 'site__header_testimonials';
    }
    if (is_page_template('page-templates/services.php')) {
        $header_class = 'site__header_service';
    }
    if (get_post_type($post_id) == 'services') {
        $header_class = 'site__header_services';
        if ($post_name) {
            $header_class .= ' site__header_services-' . $post_name;
        }
        if ($post_name == 'venture-capital-firm') {
            $header_class = 'site__header_services site__header_services-companies site__header_services-venture';
        }
        if ($post_name == 'us-companies') {
            $header_class = ' site__header_services site__header_services-companies site__header_us-companies';
        }
        if ($post_name == 'core') {
            $header_class = ' site__header_services site__header_services-companies site__header_services-core';
        }
        if ($post_name == 'multinational-company') {
            $header_class = ' site__header_services site__header_services-companies';
        }
    }

    if (is_page_template('page-templates/clients.php')) {
        $header_class = ' site__header_testimonials site__header_clients';
    }
    if (is_page_template('page-templates/cases.php')) {
        $header_class = ' site__header_testimonials site__header_case';
    }
    if (is_page_template('page-login.php')) {
        $header_class = 'site__header_login';
    }
    return $header_class;
}

function get_breadcrumbs($parent_id = false, $class = 'breadcrumbs', $is_link = true)
{
    $parent = '';
    if ($parent_id != 0) {
        $parent = get_post($parent_id);
        if (!empty($parent)) {
            $title = $parent->post_title;
            if ($is_link) {
                $link = get_permalink($parent);
                $parent = '<li><a href="' . $link . '">' . $title . '</a></li>';
            } else {
                $parent = '<li><span class="no-link">' . $title . '</span></li>';
            }

        }
    }

    echo '
<ul class="' . $class . '">
    <li><a href="' . esc_url(home_url('/')) . '">Home</a></li>' . $parent . '
    <li>' . get_the_title() . '</li>
</ul>';
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

function get_testimonials()
{


    $q = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'clients',
        )
    );
    $count_posts = ceil($q->found_posts / 2);
    $testim = '<div class="testimonials__inner">';
    $i = 0;

    while ($q->have_posts()) :
        $q->the_post();
        $i++;
        $post_id = get_the_ID();
        $logo = wp_get_attachment_image(get_field('t_logo', $post_id), 'tx170');
        $desc = get_field('t_testimonial_content', $post_id);
        $author = get_field('t_author', $post_id);
        $position = get_field('t_position', $post_id);
        $testim .= '<div class="testimonials__item" id="' . $q->post->post_name . '">
        <span class="testimonial_logo">' . $logo . '</span>
                        <h3>
                            <span>' . $author . '</span>
                            ' . $position . '
                        </h3>

                        <p>' . $desc . '</p>

                    </div>';
        if ($i == $count_posts) {
            $testim .= '</div><div class="testimonials__inner">';
        }
    endwhile;
    echo $testim . '</div>';
    wp_reset_query();
}

function get_services_post_list($post_id = null)
{

    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'services'

    ));

    $service = '<ul>';
    while ($q->have_posts()) :
        $q->the_post();
        $class = '';
        $page_id = get_the_ID();
        if ($page_id == $post_id) {
            $class = 'class="active"';
        }
        $service .= '<li><a href="' . get_permalink() . '" ' . $class . '>' . get_the_title() . '</a></li>
            ';

    endwhile;

    wp_reset_query();
    $link_cn = get_field('o_contact_us_link', 'options');
    $service .= '<li><a href="' . $link_cn . '" class="tel">Contact Us</a></li>
            ';
    echo $service .= '</ul>';

}

function get_services_preview()
{
    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'services'

    ));
    $i = 0;
    $services = '';

    while ($q->have_posts()) :
        $q->the_post();
        if ($i == 0) {
            $services .= '<div class="services-page__item">';
        }
        $i++;
        $page_id = get_the_ID();

        $services .= '
        <div class="' . $q->post->post_name . ' post-id-' . $q->post->ID . ' ">
        <a href="' . get_the_permalink() . '">
                        <h3>' . get_the_title() . '</h3>
                        ' . apply_filters('the_content', get_the_excerpt()) . '
                        </a>
                    </div>
        ';
        if ($i == 2) {
            $services .= '</div>';
            $i = 0;
        }
    endwhile;

    wp_reset_query();
    if ($i == 0) {
        $services .= '<div class="services-page__item">';
    }
    $link_cn = get_field('o_case_studies', 'options');
    $link_text = get_field('o_case_studies_text', 'options');
    $link_text_2 = get_field('o_case_studies_text_2', 'options');
    if ($link_cn) {
        $services .= '<div class="check-out">
        <a href="' . $link_cn . '">
                        <div>
                            <span>' . $link_text . '</span>
                            <span class="gochi">' . $link_text_2 . '</span>
                            <div>link</div>
                        </div>

                        </a>
                        </div>';
    }

    echo $services .= '</div>';
}

;

function get_cases_prev()
{
    $q = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'case_studies'

    ));
    $i = 0;
    $cases = '';

    while ($q->have_posts()) :
        $q->the_post();
        if ($i == 0) {
            $cases .= '<div class="case-studies__inner"><div class="site__wrap">';
        }
        $i++;
        $page_id = get_the_ID();
        $cs_client = get_field('cs_client', $page_id);
        $logo = wp_get_attachment_image(get_field('t_logo', $cs_client), 'tx170');
        $cs_locations = get_field('cs_locations', $page_id);


        $cases .= '
        <!--case-studies__item-->
                        <div class="case-studies__item">

                            <!--case-studies__pic-->
                            <div class="case-studies__pic">
                                ' . $logo . '
                            </div>
                            <!--/case-studies__pic-->

                            <!--title-->
                            <a class="title" href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                            <!--/title-->

                            <address>' . $cs_locations . '</address>

                            <!--case-studies__services-->
                            <ul class="case-studies__services">
                                ' . get_serv_tax($cs_client,3) . '
                            </ul>
                            <!--/case-studies__services-->

                            <!--read-more-->
                            <a href="' . get_the_permalink() . '" class="read-more">Read more</a>
                            <!--/read-more-->

                        </div>
                        <!--/case-studies__item-->
        ';
        if ($i == 2) {
            $cases .= '</div></div>';
            $i = 0;
        }
    endwhile;
    if ($i != 0) {
        $cases .= '</div></div>';
    }
    wp_reset_query();
    return $cases;
}

function get_serv_tax($cs_client_id, $count = false)
{
    $t_service_types = get_field('t_service_type', $cs_client_id);
	$serv_tax_list = '';

    if ( $t_service_types ) {
        if (is_array($t_service_types)) {
            $slug_ar = array();
            foreach ($t_service_types as $t_service_typeID) {
                $terms = get_the_terms($t_service_typeID, 'service_type');
                foreach ($terms as $term) {
                    $slug_ar[$term->term_id][0] = $term->slug;
                    $slug_ar[$term->term_id][1] = $term->name;
                }

            }
        }
        $serv_tax_list = '';
        if ($count) {
            $slug_ch = array_chunk($slug_ar, $count);
            $slug_ar = $slug_ch[0];
        }

        foreach ($slug_ar as $slug) {
            $serv_tax_list .= ' <li class="services-sub ' . $slug[0] . '">
         <div>
              <span>
                 <span>' . $slug[1] . '</span>
              </span>
         </div>
        </li>';
        }
    }

	return $serv_tax_list;
}

function getService()
{
    $args = array(
        'orderby' => 'term_order');

    $myterms = get_terms('service_type', $args);
    $i = 0;
    $lists = '<ul>';
    foreach ($myterms as $term) {
        $i++;
        $lists .= '<li class="' . $term->slug . '">' . $term->name . '</li>';

        if ($i == 3) {
            $lists .= '</ul><ul>';
        }
    }
    $lists .= '</ul>';
    return $lists;
}

function our_clients__review_case($is_client = false)
{
    $q = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'clients'
        )
    );
    if (!$is_client) {
        $dop_class = 'clients-review_case';
    } else {
        $dop_class = '';
    }
    $testim = ' <div class="clients-review ' . $dop_class . '">

                    <!--swiper-container-->
                    <div class="swiper-container">

                        <!--swiper-wrapper-->
                        <div class="swiper-wrapper">';

    while ($q->have_posts()) :
        $q->the_post();
        $post_id = get_the_ID();
        $visible = get_field('t_display_testimonial_on_widget', $post_id);

        if (!empty($visible)) {
            $desc = cut_text(get_field('t_testimonial_content', $post_id));

            $author = get_field('t_author', $post_id);
            $position = get_field('t_position', $post_id);

            $testim .= '<!--swiper-slide-->
                        <div class="swiper-slide">

                            <!--made-review__inner-->
                            <div class="clients-review__inner">
                                <span><span>' . $author . '</span>
                                        ' . $position . '
                                    </span>
                                ' . $desc . '

                            </div>
                            <!--/made-review__inner-->

                        </div>
                        <!--/swiper-slide-->';
        }


    endwhile;

    if (!$is_client) {
        $dop_link = '';
    } else {
        $link_id = get_temp_ID('page-templates/testimonials.php');
        $dop_link = '<a class="read-more" href="' . get_the_permalink($link_id) . '">All testimonials</a>';
    }

    $testim .= ' </div>
                        <!--/swiper-wrapper-->
                        ' . $dop_link . '
                        <!--swiper-pagination-->
                        <div class="swiper-pagination"></div>
                        <!--/swiper-pagination-->

                    </div>
                    <!--swiper-container-->';
    wp_reset_query();
    return $testim;
}

function get_login_list($post_id, $cur_post_id)
{
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_parent' => $post_id,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $parent = new WP_Query($args);
    if((int)$parent->found_posts>1){
        if ($parent->have_posts()) :
            $login_panels = '<ul>';
            while ($parent->have_posts()) : $parent->the_post();
                if ($cur_post_id == get_the_ID()) {
                    $class = 'class="active"';
                } else {
                    $class = '';
                }
                $login_panels .= '<li><a href="' . get_the_permalink() . '" ' . $class . '>' . get_the_title() . '</a></li>';
            endwhile;
            $login_panels . '</ul>';
        endif;
        wp_reset_query();
        echo $login_panels;
    }

}

function get_clients()
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'clients',
        'post_status' => 'publish',
    );
    $q = new WP_Query($args);
    $client_list = '';

    while ($q->have_posts()) :
        $q->the_post();
        $client_id = get_the_ID();
        $service_types = get_field('t_service_type', $client_id);
        $service_list = '';
        if (!empty($service_types)) {
            foreach ((array)$service_types as $service_type) {
                $service_list .= '<li><a href="' . get_permalink($service_type) . '">' . get_the_title($service_type) . '</a></li>';
            }
        }
        $link_id = get_temp_ID('page-templates/testimonials.php');
        $link = get_the_permalink($link_id) . '#' . $q->post->post_name;
        $class = $inner_testim = '';
        $t_logo = wp_get_attachment_image(get_field('t_logo', $client_id), 'tx170');
        $visible = get_field('show_testimonial_in_clients_block', $client_id);
        if (!empty($visible)) {
            $desc = cut_text(get_field('t_testimonial_content', $client_id), 190);
            $author = get_field('t_author', $client_id);
            $position = get_field('t_position', $client_id);
            $class = ' clients-list__item_long';
            $inner_testim = ' <!--clients-list__item-inner-->
                    <div class="clients-list__item-inner">

                        <div>
                            <span>' . $author . '</span>
                            ' . $position . '
                        </div>

                        ' . $desc . '

                        <!--clients-list__item-services-->
                        <ul class="clients-list__item-services">
                          ' . get_serv_tax($client_id, 3) . '
                        </ul>
                        <!--/clients-list__item-services-->

                        <a href="' . $link . '"><span>link</span></a>

                    </div>
                    <!--/clients-list__item-inner-->';
        }

        $client_list .= '<div class="clients-list__item ' . $class . '"  id="' . $q->post->post_name . '">';
        $client_list .= '<!--clients-list__item-pic-->
                    <div class="clients-list__item-pic">
                            <span>
                                ' . $t_logo . '
                            </span>
                    </div>
                    <!--/clients-list__item-pic-->

                    <!--clients-list__item-sub-->
                    <div class="clients-list__item-sub">
                        <div>
                            <div>
                                <span>' . get_the_title($client_id) . '</span>
                            </div>
                            <ul>
                               ' . $service_list . '
                            </ul>
                        </div>
                    </div>
                    ' . $inner_testim . '
                    <!--/clients-list__item-sub-->
                    </div>';
    endwhile;

    wp_reset_query();

    echo $client_list;
}

function our_data_center($post_id, $cur_post_id)
{
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post_parent' => $post_id,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    );
    $parent = new WP_Query($args);

    if ($parent->have_posts()) :
        $list = '<ul>';
        while ($parent->have_posts()) : $parent->the_post();
            if ($cur_post_id == get_the_ID()) {
                $class = 'class="active"';
            } else {
                $class = '';
            }
            $list .= '<li><a href="' . get_the_permalink() . '" ' . $class . '>' . get_the_title() . '</a></li>';
        endwhile;
        $list .= '</ul>';
    endif;
    wp_reset_query();
    echo $list;
}

?>