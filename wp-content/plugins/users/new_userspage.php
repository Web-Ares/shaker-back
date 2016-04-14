<?php
/**
 * Created by PhpStorm.
 * User: iutin
 * Date: 04.04.16
 * Time: 09:58
 */

$user_id = !empty($_GET['new_user']) ? esc_attr($_GET['new_user']) : null;
if (empty($user_id)) die('Choose user please.');
$user_data = New_Users_Plugin::getUser($user_id);
New_Users_Plugin::pip_show_error_messages();
?>

<div class="wrap">

    <h2>Curation User</h2>
    <form name="users" id="your-profile" action="" method="post">
        <table class="form-table">
            <tbody>
            <tr class="user-user-login-wrap">
                <th><label for="user_login">Username</label></th>
                <td><input type="text" name="login" id="user_login"
                           value="<?php echo $user_data[0]['nickname']; ?>"
                           class="regular-text"></td>
            </tr>

            <tr class="user-nickname-wrap">
                <th><label for="email">Email<span class="description">(required)</span></label></th>
                <td><input type="text" name="email" id="email" value="<?php echo $user_data[0]['email']; ?>"
                           class="regular-text"></td>
            </tr>

            <tr class="user-display-name-wrap">
                <th><label for="display_name">Display name publicly as<span
                            class="description">(required)</span></label></th>
                <td><input type="text" name="name" id="display_name" value="<?php echo $user_data[0]['name']; ?>"
                           class="regular-text"></td>
                <input type="hidden" name="new_user" value="<?php echo $user_data[0]['id']; ?>">
                <input type="hidden" name="_wpnonce" value="<?php echo $_REQUEST['_wpnonce']; ?>">
                <input type="hidden" name="page" value="new_users">
                <input type="hidden" name="action" value="edit">
            </tr>

            <tr id="password" class="user-pass1-wrap">
                <th><label for="pass">New Password</label></th>
                <td><input type="text" name="password" id="pass" value="<?php echo New_Users_Plugin::generateUserPass();?>" class="regular-text"></td>
            </tr>


            </tbody>
        </table>
        <p class="submit"><input type="submit" name="submit_new_user" id="submit" class="button button-primary" value="Create User"><span class="acf-spinner"></span></p>

    </form>

</div>
