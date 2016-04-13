<?php
/*
Plugin Name: User Emails
Description: Changes the default user emails
Version: 1.0
Author: Joe Sexton
Author URI: http://www.josephmsexton.com
*/
/**
 * redefine new user notification function
 *
 * emails new users their login info
 *
 * @author  Joe Sexton <joe@webtipblog.com>
 * @param   integer $user_id user id
 * @param   string $plaintext_pass optional password
 */
if ( !function_exists( 'wp_new_user_notification' ) ) {
    function wp_new_user_notification( $user_id, $deprecated = null, $notify = '' ) {

        if ( $deprecated !== null ) {
            _deprecated_argument( __FUNCTION__, '4.3.1' );
        }

        global $wpdb, $wp_hasher;
        $user = get_userdata( $user_id );

        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

        // Generate something random for a password reset key.
        $key_user = wp_generate_password( 20, false );


        $user_data = array(
            'ID' => $user_id,
            'user_activation_key' => ''
        );

        wp_set_password( $key_user, $user_id );

        wp_update_user($user_data);

        $message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
        $message .= sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
        $message .= sprintf(__('Email: %s'), $user->user_email) . "\r\n";
        $message .= sprintf(__('User\'s Password: %s'), $key_user) . "\r\n";

        @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);
        // `$deprecated was pre-4.3 `$plaintext_pass`. An empty `$plaintext_pass` didn't sent a user notifcation.
        if ( 'admin' === $notify || ( empty( $deprecated ) && empty( $notify ) ) ) {
            return;
        }


        $message = sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
        $message .= 'Your password, for visits the site: '. $key_user . "\r\n\r\n";

        wp_mail($user->user_email, sprintf(__('[%s] Your username and password info'), $blogname), $message);
    }
}


?>