<?php
add_action( 'show_user_profile', 'add_extra_members' );
add_action( 'edit_user_profile', 'add_extra_members' );

function add_extra_members( $user )
{
?>
<h3>Members</h3>

<table class="form-table">
    <tr>
        <th><label for="facebook_profile">Favorites images</label></th>
        <td><a href="#"><?php echo esc_attr(get_counts_Likes( $user->ID )); ?></a></td>
    </tr>

    <tr>
        <th><label for="twitter_profile">My Curations</label></th>
        <td><a href="/"><?php echo esc_attr(get_the_author_meta( 'my_curations', $user->ID )); ?></a></td>
    </tr>

</table>
<?php
}

function get_counts_Likes($user_id){
    global $wpdb;
    $table_name = $wpdb->prefix . "likes";
    $rows = $wpdb->get_results("select count(id) as itogo from ".$table_name." WHERE user_id = ".$user_id);
    return $rows[0]->itogo;
}



function new_modify_user_table( $column ) {
    $column['likes'] = 'Likes';
    $column['curation'] = 'Curation';
    return $column;
}

add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'likes' :
            return '<a href="/wp-admin/admin.php?page=wp_list_table_class&user_id='.$user_id.'">'.get_counts_Likes($user_id).'</a>';
            break;
        case 'curation' :
            return '1';
            break;
        default:
    }
    return true;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );




add_action('wp_ajax_likes', 'setLikes');
add_action('wp_ajax_nopriv_likes', 'setLikes');

/**
 *
 */
function setLikes()
{
    global $wpdb;
    $id='56';
    if(true){

    }else{
        $wpdb->delete(
            "{$wpdb->prefix}likes",
            ['ID' => $id],
            ['%d']
        );
    }
}
?>