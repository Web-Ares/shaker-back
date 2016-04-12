<?php

function pippin_change_forgot_password_form()
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
        <!-- enter-form -->
        <form class="enter-form" action="<?php echo $current_url; ?>" method="post">
            <input class="site__input" type="email" name="email" placeholder="Email">
            <input type="hidden" name="pippin_action" value="forgot-password"/>
            <input type="hidden" name="pippin_redirect" value="<?php echo $redirect; ?>"/>
            <!-- enter-form__send -->
            <div class="enter-form__send enter-form__send_right">
                <button class="btn" type="submit">Send</button>
            </div>
            <!-- /enter-form__send -->

        </form>
        <!-- enter-form -->
    <?php
    return ob_get_clean();
}

// password reset form
function pippin_forgot_password_form()
{
    if (is_user_logged_in()) {
        return pippin_change_forgot_password_form();
    }
}

add_shortcode('lostpassword_form', 'pippin_forgot_password_form');


function pippin_forgot_password()
{
    // reset a users password
    if (isset($_POST['pippin_action']) && $_POST['pippin_action'] == 'forgot-password') {

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

    }
}

add_action('init', 'pippin_forgot_password');

if (!function_exists('pippin_show_error_messages')) {
    // displays error messages from form submissions
    function pippin_show_error_messages()
    {
        if ($codes = pippin_errors()->get_error_codes()) {
            echo '<div class="pippin_message error">';
            // Loop error codes and display errors
            foreach ($codes as $code) {
                $message = pippin_errors()->get_error_message($code);
                echo '<span class="pippin_error">' . $message . '</span><br/>';
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