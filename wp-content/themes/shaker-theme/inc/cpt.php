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

// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy(){
    // заголовки
    $labels = array(
        'name'              => 'Image Categories',
        'singular_name'     => 'Image Category',
        'search_items'      => 'Search Image Category',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Image Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Image\'s Categories',
    );
    // параметры
    $args = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => $labels,
        'public'                => true,
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => true, // равен аргументу show_ui
        'hierarchical'          => true,
        'update_count_callback' => '',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('img_categories', array('images'), $args );

    // заголовки
    $labels = array(
        'name'              => 'Author Categories',
        'singular_name'     => 'Author Category',
        'search_items'      => 'Search Author Category',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Author Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Author\'s list',
    );
    // параметры
    $args = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => $labels,
        'public'                => true,
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => true, // равен аргументу show_ui
        'hierarchical'          => false,
        'update_count_callback' => '',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('author_categories', array('images'), $args );
}