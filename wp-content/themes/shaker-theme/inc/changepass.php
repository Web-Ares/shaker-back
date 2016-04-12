<?php

function pippin_change_password_form()
{
    global $post;

    if (is_singular()) :
        $current_url = get_permalink($post->ID);
    else :
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") $pageURL .= "s";
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        else $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $current_url = $pageURL;
    endif;
    $redirect = $current_url;

    ob_start();

// show any error messages after form submission
    pippin_show_error_messages(); ?>

    <?php if (isset($_GET['password-reset']) && $_GET['password-reset'] == 'true') { ?>
    <div class="pippin_message success">
        <span><?php _e('Password changed successfully', 'rcp'); ?></span>
    </div>
<?php } ?>
    <form id="pippin_password_form" class="enter-form" method="POST" action="<?php echo $current_url; ?>">
        <input class="site__input" type="password" name="current-pass" placeholder="Current password">
        <input class="site__input" type="password" name="pippin_user_newpass" placeholder="<?php _e('New Password', 'rcp'); ?>">
        <input class="site__input" type="password" name="pippin_user_newpass_confirm"
               placeholder="<?php _e('Password Confirm', 'rcp'); ?>">

        <!-- enter-form__send -->
        <div class="enter-form__send enter-form__send_right">
            <input type="hidden" name="pippin_action" value="reset-password"/>
            <input type="hidden" name="pippin_redirect" value="<?php echo $redirect; ?>"/>
            <input type="hidden" name="pippin_password_nonce"
                   value="<?php echo wp_create_nonce('rcp-password-nonce'); ?>"/>
            <button class="btn" type="submit"><?php _e('Change Password', 'pippin'); ?></button>
        </div>
        <!-- /enter-form__send -->

    </form>
    <?php
    return ob_get_clean();
}

// password reset form
function pippin_reset_password_form()
{
    if (is_user_logged_in()) {
        return pippin_change_password_form();
    }
}

add_shortcode('password_form', 'pippin_reset_password_form');


function pippin_reset_password()
{
    // reset a users password
    if (isset($_POST['pippin_action']) && $_POST['pippin_action'] == 'reset-password') {

        global $user_ID;

        if (!is_user_logged_in())
            return;

        $user = get_userdata( $user_ID );
        if( $user ){
            $password = $_POST['current-pass'];
            $hash     = $user->data->user_pass;
            if ( !wp_check_password( $password, $hash ) ) {
                pippin_errors()->add('password_incorrect', __('Password do not correct', 'pippin'));
                // retrieve all error messages, if any
                $errors = pippin_errors()->get_error_messages();
                return false;
            }
        }

        if (wp_verify_nonce($_POST['pippin_password_nonce'], 'rcp-password-nonce')) {

            if ($_POST['pippin_user_newpass'] == '' || $_POST['pippin_user_newpass_confirm'] == '') {
                // password(s) field empty
                pippin_errors()->add('password_empty', __('Please enter a password, and confirm it', 'pippin'));
            }
            if ($_POST['pippin_user_newpass'] != $_POST['pippin_user_newpass_confirm']) {
                // passwords do not match
                pippin_errors()->add('password_mismatch', __('Passwords do not match', 'pippin'));

            }

            // retrieve all error messages, if any
            $errors = pippin_errors()->get_error_messages();

            if (empty($errors)) {
                // change the password here
                $user_data = array(
                    'ID' => $user_ID,
                    'user_pass' => $_POST['pippin_user_newpass_confirm']
                );
                wp_update_user($user_data);
                // send password change email here (if WP doesn't)
                wp_redirect(add_query_arg('password-reset', 'true', $_POST['pippin_redirect']));
                exit;
            }
        }
    }
}

add_action('init', 'pippin_reset_password');

if (!function_exists('pippin_show_error_messages')) {
    // displays error messages from form submissions
    function pippin_show_error_messages()
    {
        if ($codes = pippin_errors()->get_error_codes()) {
            echo '<div class="pippin_message error">';
            // Loop error codes and display errors
            foreach ($codes as $code) {
                $message = pippin_errors()->get_error_message($code);
                echo '<span class="pippin_error"><strong>' . __('Error', 'rcp') . '</strong>: ' . $message . '</span><br/>';
            }
            echo '</div>';
        }
    }
}

if (!function_exists('pippin_errors')) {
    // used for tracking error messages
    function pippin_errors()
    {
        static $wp_error; // Will hold global variable safely
        return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
    }
}