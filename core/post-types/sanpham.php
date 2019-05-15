<?php 
//san pham
function create_posttype_sanpham() {
register_post_type( 'sanpham',
// CPT Options
    array(
        'labels' => array(
            'name' => __( 'Sản phẩm' ),
            'singular_name' => __( 'Sản phẩm' )
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
        'rewrite' => array('slug' => 'sanpham'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_sanpham' );
add_action( 'init', 'create_category_sanpham' );
function create_category_sanpham() {
    register_taxonomy(
        'sanpham_category',
        'sanpham',
        array(
            'label' => __( 'Chuyên mục sản phẩm' ),
            'rewrite' => array( 'slug' => 'san-pham-category' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );
}

 ?>