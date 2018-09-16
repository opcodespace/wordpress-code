<?php 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Staterooms', 'Post Type General Name', 'customization' ),
        'singular_name'       => _x( 'Stateroom', 'Post Type Singular Name', 'customization' ),
        'menu_name'           => __( 'Staterooms', 'customization' ),
        'parent_item_colon'   => __( 'Parent Stateroom', 'customization' ),
        'all_items'           => __( 'All Staterooms', 'customization' ),
        'view_item'           => __( 'View Stateroom', 'customization' ),
        'add_new_item'        => __( 'Add New Stateroom', 'customization' ),
        'add_new'             => __( 'Add New', 'customization' ),
        'edit_item'           => __( 'Edit Stateroom', 'customization' ),
        'update_item'         => __( 'Update Stateroom', 'customization' ),
        'search_items'        => __( 'Search Stateroom', 'customization' ),
        'not_found'           => __( 'Not Found', 'customization' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'customization' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'staterooms', 'customization' ),
        'description'         => __( 'Stateroom news and reviews', 'customization' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
         
        // This is where we add taxonomies to our CPT
        'taxonomies'          => array( 'category' ),
    );
     
    // Registering your Custom Post Type
    register_post_type( 'staterooms', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );
