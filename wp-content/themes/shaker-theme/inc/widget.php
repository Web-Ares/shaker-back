<?php
add_action('show_user_profile', 'add_extra_members');
add_action('edit_user_profile', 'add_extra_members');

function add_extra_members($user)
{
    ?>
    <h3>Members</h3>

    <table class="form-table">
        <tr>
            <th><label for="facebook_profile">Favorites images</label></th>
            <td>
                <a href="/wp-admin/admin.php?page=likes_users&user_id=<?= $user->ID; ?>"><?php echo esc_attr(get_counts_Likes($user->ID)); ?></a>
            </td>
        </tr>

        <tr>
            <th><label for="twitter_profile">My Curations</label></th>
            <td>
                <a href="/wp-admin/admin.php?page=curation_users&user_id=<?= $user->ID; ?>"><?php echo esc_attr(get_counts_Curations($user->ID)); ?></a>
            </td>
        </tr>

    </table>
    <?php
}

function get_counts_Likes($user_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "likes";
    $rows = $wpdb->get_results("select count(id) as itogo from " . $table_name . " WHERE user_id = " . $user_id);
    return $rows[0]->itogo;
}


function get_counts_Curations($user_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "users_curations";
    $rows = $wpdb->get_results("select count(id) as itogo from " . $table_name . " WHERE user_id = " . $user_id);
    return $rows[0]->itogo;
}


function new_modify_user_table($column)
{
    $column['likes'] = 'Likes';
    $column['curation'] = 'Curation';
    return $column;
}

add_filter('manage_users_columns', 'new_modify_user_table');

function new_modify_user_table_row($val, $column_name, $user_id)
{
    switch ($column_name) {
        case 'likes' :
            return '<a href="/wp-admin/admin.php?page=likes_users&user_id=' . $user_id . '">' . get_counts_Likes($user_id) . '</a>';
            break;
        case 'curation' :
            return '<a href="/wp-admin/admin.php?page=curation_users&user_id=' . $user_id . '">' . get_counts_Curations($user_id) . '</a>';
            break;
        default:
    }
    return true;
}

add_filter('manage_users_custom_column', 'new_modify_user_table_row', 10, 3);


add_action('wp_ajax_likes', 'setLikes');
add_action('wp_ajax_nopriv_likes', 'setLikes');

/**
 *
 */
function setLikes()
{
    global $wpdb;
    $id = esc_sql($_GET['data-id']);
    $image_id = esc_sql($_GET['image-id']);
    $date = time();
    $class = esc_sql($_GET['class']);
    $current_user = wp_get_current_user();
    if ( 0 == $current_user->ID ) {
        die('false');
    } else {
        $user_id = $current_user->ID;
        // Авторизован.
    }

    if ($class == 'liked') {
        $wpdb->delete(
            "{$wpdb->prefix}likes",
            ['post_id' => $id,'user_id' => $user_id],
            ['%d','%d']
        );
        $json_data = '{
            "like": true
        }';


    } else {
        $wpdb->insert( $wpdb->prefix . 'likes', array( 'post_id' => $id, 'image_id' => $image_id,'user_id' => $user_id, 'date'=>$date), array( '%d', '%d', '%d', '%d' )  );

        $json_data = '{
            "like": false
        }';

    }
    die($json_data);
}

add_action('wp_ajax_getcategories', 'getCategories');
add_action('wp_ajax_nopriv_getcategories', 'getCategories');


function getCategories($isajax=true,$button=false)
{
    Limitedart::getCategories($isajax,$button);
}

add_action('wp_ajax_getslidercontent', 'getSlidercontent');
add_action('wp_ajax_nopriv_getslidercontent', 'getSlidercontent');

/**
 *
 */
function getSlidercontent()
{
    global $wpdb;
         get_template_part('pages/partlimited');
    die();
}

?>