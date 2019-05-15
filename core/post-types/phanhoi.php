<?php 
//san pham
function create_posttype_phanhoi() {
register_post_type( 'phanhoi',
// CPT Options
    array(
        'labels' => array(
            'name' => __( 'Feelback' ),
            'singular_name' => __( 'Feelback' )
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
        'rewrite' => array('slug' => 'phanhoi'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_phanhoi' );
add_action( 'init', 'create_category_phanhoi' );
function create_category_phanhoi() {
    register_taxonomy(
        'phanhoi_category',
        'phanhoi',
        array(
            'label' => __( 'Chuyên mục phản hồi' ),
            'rewrite' => array( 'slug' => 'phanhoi-category' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );
}

 ?>