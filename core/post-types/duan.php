<?php 
//du an
function create_posttype_duan() {
register_post_type( 'duan',
// CPT Options
    array(
        'labels' => array(
            'name' => __( 'Dự Án' ),
            'singular_name' => __( 'Dự Án' )
        ),
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
            'custom-fields',
            'excerpt'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-settings',
        'rewrite' => array('slug' => 'duan'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_duan' );
add_action( 'init', 'create_category_duan' );
function create_category_duan() {
    register_taxonomy(
        'duan_category',
        'duan',
        array(
            'label' => __( 'Chuyên mục dự án' ),
            'rewrite' => array( 'slug' => 'du-an-category' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );
}

 ?>