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

    <?php
    if (isset($_GET['password-reset']) && $_GET['password-reset'] == 'true') { ?>
        <div class="pippin_message success">
            <span><?php echo pll__('Your password will be emailed'); ?></span>
        </div>
    <?php } ?>
    <!-- enter-form -->
    <form class="enter-form" action="<?php echo $current_url; ?>" method="post">
        <input class="site__input" type="email" name="email" placeholder="Email">
        <input type="hidden" name="pippin_action" value="forgot-password"/>
        <input type="hidden" name="pippin_redirect" value="<?php echo $redirect; ?>"/>
        <!-- enter-form__send -->
        <div class="enter-form__send enter-form__send_right">
            <button class="btn" type="submit"><?php echo pll__('Send'); ?></button>
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
    if (!is_user_logged_in()) {
        return pippin_change_forgot_password_form();
    }
}

add_shortcode('lostpassword_form', 'pippin_forgot_password_form');


function pippin_forgot_password()
{
    // reset a users password
    if (isset($_POST['pippin_action']) && $_POST['pippin_action'] == 'forgot-password') {

        global $user_ID;



        $email = $_POST['email'];

        if (empty($email)) {
            $mess = pll__('Enter e-mail address.');
            pippin_errors()->add('none_email', $mess);
            return false;
        } else if (!is_email($email)) {
            pippin_errors()->add('invalid_email', pll__('Invalid e-mail address.'));
            return false;
        } else if (!email_exists($email)) {
            pippin_errors()->add('none_user', pll__('There is no user registered with that email address.'));
            return false;
        } else {

            // retrieve all error messages, if any
            $errors = pippin_errors()->get_error_messages();

            if (empty($errors)) {
                $random_password = wp_generate_password(12, false);
                $user = get_user_by('email', $email);

                $update_user = wp_update_user(array(
                        'ID' => $user->ID,
                        'user_pass' => $random_password
                    )
                );

                $to = $email;
                $subject = 'Your new password';
                $sender = 'Shaiker Weiner site';

                $message = 'Your new password is: ' . $random_password;

                $headers[] = 'MIME-Version: 1.0' . "\r\n";
                $headers[] = 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers[] = "X-Mailer: PHP \r\n";
                $headers[] = 'From: ' . $sender . ' < ' . $email . '>' . "\r\n";

                $mail = wp_mail($to, $subject, $message, $headers);

                wp_redirect(add_query_arg('password-reset', 'true', $_POST['pippin_redirect']));
                exit;
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