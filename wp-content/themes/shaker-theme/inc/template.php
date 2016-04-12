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


/**
 * Provides a simple login form for use anywhere within WordPress.
 *
 * The login format HTML is echoed by default. Pass a false value for `$echo` to return it instead.
 *
 * @since 3.0.0
 *
 * @param array $args {
 *     Optional. Array of options to control the form output. Default empty array.
 *
 *     @type bool   $echo           Whether to display the login form or return the form HTML code.
 *                                  Default true (echo).
 *     @type string $redirect       URL to redirect to. Must be absolute, as in "https://example.com/mypage/".
 *                                  Default is to redirect back to the request URI.
 *     @type string $form_id        ID attribute value for the form. Default 'loginform'.
 *     @type string $label_username Label for the username field. Default 'Username'.
 *     @type string $label_password Label for the password field. Default 'Password'.
 *     @type string $label_remember Label for the remember field. Default 'Remember Me'.
 *     @type string $label_log_in   Label for the submit button. Default 'Log In'.
 *     @type string $id_username    ID attribute value for the username field. Default 'user_login'.
 *     @type string $id_password    ID attribute value for the password field. Default 'user_pass'.
 *     @type string $id_remember    ID attribute value for the remember field. Default 'rememberme'.
 *     @type string $id_submit      ID attribute value for the submit button. Default 'wp-submit'.
 *     @type bool   $remember       Whether to display the "rememberme" checkbox in the form.
 *     @type string $value_username Default value for the username field. Default empty.
 *     @type bool   $value_remember Whether the "Remember Me" checkbox should be checked by default.
 *                                  Default false (unchecked).
 *
 * }
 * @return string|void String when retrieving.
 */
function wp_mylogin_form( $args = array() ) {
    $defaults = array(
        'echo' => true,
        // Default 'redirect' value takes the user back to the request URI.
        'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
        'form_id' => 'loginform',
        'class_id' => 'enter-form',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'btn',
        'remember' => true,
        'value_username' => '',
        // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
        'value_remember' => false,
    );

    /**
     * Filter the default login form output arguments.
     *
     * @since 3.0.0
     *
     * @see wp_login_form()
     *
     * @param array $defaults An array of default login form arguments.
     */
    $args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );

    /**
     * Filter content to display at the top of the login form.
     *
     * The filter evaluates just following the opening form tag element.
     *
     * @since 3.0.0
     *
     * @param string $content Content to display. Default empty.
     * @param array  $args    Array of login form arguments.
     */
    $login_form_top = apply_filters( 'login_form_top', '', $args );

    /**
     * Filter content to display in the middle of the login form.
     *
     * The filter evaluates just following the location where the 'login-password'
     * field is displayed.
     *
     * @since 3.0.0
     *
     * @param string $content Content to display. Default empty.
     * @param array  $args    Array of login form arguments.
     */
    $login_form_middle = apply_filters( 'login_form_middle', '', $args );

    /**
     * Filter content to display at the bottom of the login form.
     *
     * The filter evaluates just preceding the closing form tag element.
     *
     * @since 3.0.0
     *
     * @param string $content Content to display. Default empty.
     * @param array  $args    Array of login form arguments.
     */
    $login_form_bottom = apply_filters( 'login_form_bottom', '', $args );

    $form = '
		<form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" class="' . $args['class_id'] . '" action="" method="post">
			' . $login_form_top . '

				<input type="text" name="log" class="site__input input_log" placeholder="' . esc_html( $args['label_username'] ) . '" value="' . esc_attr( $args['value_username'] ) . '"/>
				<input type="password" name="pwd" class="site__input input_pass"  placeholder="' . esc_html( $args['label_password'] ) . '" value="" />
<!-- enter-form__send -->
							<div class="enter-form__send">
								<a class="enter-form__forgot" href="'. wp_lostpassword_url().' "> '.__( "Lost your password?" ).'
								</a>
								<button class="btn" type="submit">' . esc_attr( $args['label_log_in'] ) . '</button>
				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
							</div>
							<!-- /enter-form__send -->


		</form>';

    if ( $args['echo'] )
        echo $form;
    else
        return $form;
}

/**
 * Display the Log In/Out link.
 *
 * Displays a link, which allows users to navigate to the Log In page to log in
 * or log out depending on whether they are currently logged in.
 *
 * @since 1.5.0
 *
 * @param string $redirect Optional path to redirect to on login/logout.
 * @param bool   $echo     Default to echo and not return the link.
 * @return string|void String when retrieving.
 */
function wp_myloginout($redirect = '', $echo = true) {
    if ( ! is_user_logged_in() )
        $link = '<a class="site__content-link" href="' . esc_url( wp_login_url($redirect) ) . '">' . __('Log in') . '</a>';
    else
        $link = '<a class="site__content-link" href="' . esc_url( wp_logout_url($redirect) ) . '">' . __('Log out') . '</a>';

    if ( $echo ) {
        /**
         * Filter the HTML output for the Log In/Log Out link.
         *
         * @since 1.5.0
         *
         * @param string $link The HTML link content.
         */
        echo apply_filters( 'loginout', $link );
    } else {
        /** This filter is documented in wp-includes/general-template.php */
        return apply_filters( 'loginout', $link );
    }
}

?>