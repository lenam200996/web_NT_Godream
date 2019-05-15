<?php 
//Dich vu
function create_posttype_dichvu() {
register_post_type( 'dichvu',
// CPT Options
    array(
        'labels' => array(
            'name' => __( 'Dịch vụ' ),
            'singular_name' => __( 'Dịch vụ' )
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
        'rewrite' => array('slug' => 'dichvu'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_dichvu' );
add_action( 'init', 'create_category_dichvu' );
function create_category_dichvu() {
    register_taxonomy(
        'dichvu_category',
        'dichvu',
        array(
            'label' => __( 'Chuyên mục dịch vụ' ),
            'rewrite' => array( 'slug' => 'Dich-vu-category' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );
}

 ?>