<?php 
add_action( 'init', 'custom_post_type_properties', 0 );
add_action( 'init', 'custom_post_type_itineraries', 0 );


// ====== Properties
function custom_post_type_properties() {

    $labels = array(
        'name'                => _x( 'Properties', 'Post Type General Name'),
        'singular_name'       => _x( 'Property',  'Post Type Singular Name'),
        'menu_name'           => __( 'Properties'),
        'parent_item_colon'   => __( 'Properties'),
        'all_items'           => __( 'All Properties'),
        'view_item'           => __( 'View Properties'),
        'add_new_item'        => __( 'Add New Property'),
        'add_new'             => __( 'Add Property' ),
        'edit_item'           => __( 'Edit Property' ),
        'update_item'         => __( 'Update Property' ),
        'search_items'        => __( 'Search Properties' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'properties' ),
        'description'         => __( 'properties'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-admin-multisite',
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

    register_post_type( 'properties', $args );
}

// ====== Itineraries
function custom_post_type_itineraries() {

    $labels = array(
        'name'                => _x( 'Itineraries', 'Post Type General Name'),
        'singular_name'       => _x( 'Itinerary',  'Post Type Singular Name'),
        'menu_name'           => __( 'Itineraries'),
        'parent_item_colon'   => __( 'Itineraries'),
        'all_items'           => __( 'All Itineraries'),
        'view_item'           => __( 'View Itineraries'),
        'add_new_item'        => __( 'Add New Itinerary'),
        'add_new'             => __( 'Add Itinerary' ),
        'edit_item'           => __( 'Edit Itinerary' ),
        'update_item'         => __( 'Update Itinerary' ),
        'search_items'        => __( 'Search Itineraries' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'itineraries' ),
        'description'         => __( 'itineraries'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-calendar-alt',
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

    register_post_type( 'itineraries', $args );
}
// ====== Type Sarafi Type
function taxonomy_safaritype() {

    $labels = array(
        'name'              => _x( 'Safari Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Safari Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Safari Types'   ),
        'all_items'         => __( 'All Safari Types'     ),
        'parent_item'       => __( 'Parent Safari Type'   ),
        'parent_item_colon' => __( 'Parent Safari Type:'  ),
        'edit_item'         => __( 'Edit Safari Type'     ),
        'update_item'       => __( 'Update Safari Type'   ),
        'add_new_item'      => __( 'Add New Safari Type'  ),
        'new_item_name'     => __( 'New Safari Type' ),
        'menu_name'         => __( 'Safari Types'         )
    );

    register_taxonomy( 'safaritype', array( 'properties', 'destination', 'itineraries' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'safaritype', 'hierarchical' => true )
    ));
}
// ====== Type Destination
function taxonomy_destination() {

    $labels = array(
        'name'              => _x( 'Destinations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Destination', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Destinations'   ),
        'all_items'         => __( 'All Destinations'     ),
        'parent_item'       => __( 'Parent Destination'   ),
        'parent_item_colon' => __( 'Parent Destinations:'  ),
        'edit_item'         => __( 'Edit Destinations'     ),
        'update_item'       => __( 'Update Destination'   ),
        'add_new_item'      => __( 'Add New Destination'  ),
        'new_item_name'     => __( 'New Destination' ),
        'menu_name'         => __( 'Destinations'         )
    );

    register_taxonomy( 'destination', array(  'properties', 'itineraries' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'destination', 'hierarchical' => true )
    ));
}
// ====== Type Property Style
function taxonomy_propertystyle() {

    $labels = array(
        'name'              => _x( 'Property Style', 'taxonomy general name' ),
        'singular_name'     => _x( 'Property Style', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Property Styles'   ),
        'all_items'         => __( 'All Property Styles'     ),
        'parent_item'       => __( 'Parent Property Style'   ),
        'parent_item_colon' => __( 'Parent Property Style:'  ),
        'edit_item'         => __( 'Edit Property Style'     ),
        'update_item'       => __( 'Update Property Style'   ),
        'add_new_item'      => __( 'Add New Property Style'  ),
        'new_item_name'     => __( 'New Property Style' ),
        'menu_name'         => __( 'Property Style'         )
    );

    register_taxonomy( 'propertystyle', array(  'properties', 'itineraries'), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'propertystyle', 'hierarchical' => true )
    ));
}

// ====== Type Property Facilities
function taxonomy_propertyfacility() {

    $labels = array(
        'name'              => _x( 'Facility', 'taxonomy general name' ),
        'singular_name'     => _x( 'Facility', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Facilities'   ),
        'all_items'         => __( 'All Facilities'     ),
        'parent_item'       => __( 'Parent Facility'   ),
        'parent_item_colon' => __( 'Parent Facility'  ),
        'edit_item'         => __( 'Edit Facility'     ),
        'update_item'       => __( 'Update Facility'   ),
        'add_new_item'      => __( 'Add New Facility'  ),
        'new_item_name'     => __( 'New Facility' ),
        'menu_name'         => __( 'Facility'         )
    );

    register_taxonomy( 'facility', array(  'properties' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'facility', 'hierarchical' => true )
    ));
}
// ====== Type Activities
function taxonomy_activities() {

    $labels = array(
        'name'              => _x( 'Activity', 'taxonomy general name' ),
        'singular_name'     => _x( 'Activity', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Activities'   ),
        'all_items'         => __( 'All Activities'     ),
        'parent_item'       => __( 'Parent Activity'   ),
        'parent_item_colon' => __( 'Parent Activity'  ),
        'edit_item'         => __( 'Edit Activity'     ),
        'update_item'       => __( 'Update Activity'   ),
        'add_new_item'      => __( 'Add New Activity'  ),
        'new_item_name'     => __( 'New Activity' ),
        'menu_name'         => __( 'Activity'         )
    );

    register_taxonomy( 'activity', array(  'properties' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'activity', 'hierarchical' => true )
    ));
}




add_action( 'init', 'taxonomy_propertystyle', 0 );
add_action( 'init', 'taxonomy_safaritype', 0 );
add_action( 'init', 'taxonomy_destination', 0 );
add_action( 'init', 'taxonomy_propertyfacility', 0 );
add_action( 'init', 'taxonomy_activities', 0 );