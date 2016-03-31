<?php
// Register Custom Post Type
add_action('init', 'custom_post_type', 0);

function custom_post_type()
{
    $labels = array(
        'name' => 'Images',
        'singular_name' => 'Images',
        'menu_name' => 'Images',
        'all_items' => 'All images',
        'view_item' => 'View image',
        'add_new_item' => 'Add image',
        'add_new' => 'Add image',
        'edit_item' => 'Edit',
        'update_item' => 'Update',
        'search_items' => 'Search'
    );

    $args = array(
        'labels' => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'has_archive' => false,
        'menu_position'=> 31,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array(
            'with_front' => true
        )
    );

    register_post_type('images', $args);

}