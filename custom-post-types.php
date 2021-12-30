<?php 
add_action( 'init', 'custom_post_type_safaris', 0 );
add_action( 'init', 'custom_post_type_testimonials', 0 );

// ====== safaris
function custom_post_type_safaris() {

    $labels = array(
        'name'                => _x( 'Safaris', 'Post Type General Name'),
        'singular_name'       => _x( 'Safari',  'Post Type Singular Name'),
        'menu_name'           => __( 'Safaris'),
        'parent_item_colon'   => __( 'Safaris'),
        'all_items'           => __( 'All Safaris'),
        'view_item'           => __( 'View Safaris'),
        'add_new_item'        => __( 'Add New Safaris'),
        'add_new'             => __( 'Add Safari' ),
        'edit_item'           => __( 'Edit Safari' ),
        'update_item'         => __( 'Update Safari' ),
        'search_items'        => __( 'Search Safaris' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'safari' ),
        'description'         => __( 'safari'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-pets',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'safari', $args );
}
// ====== Testimonials
function custom_post_type_testimonials() {

    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name'),
        'singular_name'       => _x( 'Testimonial',  'Post Type Singular Name'),
        'menu_name'           => __( 'Testimonials'),
        'parent_item_colon'   => __( 'Testimonials'),
        'all_items'           => __( 'All Testimonials'),
        'view_item'           => __( 'View Testimonials'),
        'add_new_item'        => __( 'Add New Testimonials'),
        'add_new'             => __( 'Add Testimonial' ),
        'edit_item'           => __( 'Edit Testimonial' ),
        'update_item'         => __( 'Update Testimonial' ),
        'search_items'        => __( 'Search Testimonials' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'testimonial' ),
        'description'         => __( 'testimonial'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-format-quote',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'testimonial', $args );
}
// ====== Type Destination
function taxonomy_destinations() {

    $labels = array(
        'name'              => _x( 'Destinations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Destination', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Destinations'   ),
        'all_items'         => __( 'All Destinations'     ),
        'parent_item'       => __( 'Parent Destination'   ),
        'parent_item_colon' => __( 'Parent Destination:'  ),
        'edit_item'         => __( 'Edit Destination'     ),
        'update_item'       => __( 'Update Destination'   ),
        'add_new_item'      => __( 'Add New Destination'  ),
        'new_item_name'     => __( 'New Destination' ),
        'menu_name'         => __( 'Destinations'         )
    );

    register_taxonomy( 'destination', array( 'safari' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'destinations', 'hierarchical' => true )
    ));
}
add_action( 'init', 'taxonomy_destinations', 0 );


// ====== Type Properties
function taxonomy_properties() {

    $labels = array(
        'name'              => _x( 'Properties', 'taxonomy general name' ),
        'singular_name'     => _x( 'Property', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Properties'   ),
        'all_items'         => __( 'All Properties'     ),
        'parent_item'       => __( 'Parent Property'   ),
        'parent_item_colon' => __( 'Parent Property:'  ),
        'edit_item'         => __( 'Edit Property'     ),
        'update_item'       => __( 'Update Property'   ),
        'add_new_item'      => __( 'Add New Property'  ),
        'new_item_name'     => __( 'New Property' ),
        'menu_name'         => __( 'Properties'         )
    );

    register_taxonomy( 'properties', array( 'safari' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'properties', 'hierarchical' => true )
    ));
}
add_action( 'init', 'taxonomy_properties', 0 );