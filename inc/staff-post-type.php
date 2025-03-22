<?php

function staff_post_type() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'school-site-theme' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'school-site-theme' ),
		'menu_name'             => __( 'Staff', 'school-site-theme' ),
		'name_admin_bar'        => __( 'Staff', 'school-site-theme' ),
		'archives'              => __( 'Staff Archives', 'school-site-theme' ),
		'attributes'            => __( 'Staff Attributes', 'school-site-theme' ),
		'parent_item_colon'     => __( 'Parent Staff:', 'school-site-theme' ),
		'all_items'             => __( 'All Staff', 'school-site-theme' ),
		'add_new_item'          => __( 'Add New Staff', 'school-site-theme' ),
		'add_new'               => __( 'Add New', 'school-site-theme' ),
		'new_item'              => __( 'New Staff', 'school-site-theme' ),
		'edit_item'             => __( 'Edit Staff', 'school-site-theme' ),
		'update_item'           => __( 'Update Staff', 'school-site-theme' ),
		'view_item'             => __( 'View Staff', 'school-site-theme' ),
		'view_items'            => __( 'View Staff', 'school-site-theme' ),
		'search_items'          => __( 'Search Staff', 'school-site-theme' ),
		'not_found'             => __( 'Staff Not found', 'school-site-theme' ),
		'not_found_in_trash'    => __( 'Staff Not found in Trash', 'school-site-theme' ),
		'featured_image'        => __( 'Featured Image', 'school-site-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'school-site-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'school-site-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'school-site-theme' ),
		'insert_into_item'      => __( 'Insert into item', 'school-site-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'school-site-theme' ),
		'items_list'            => __( 'Staff list', 'school-site-theme' ),
		'items_list_navigation' => __( 'Staff list navigation', 'school-site-theme' ),
		'filter_items_list'     => __( 'Filter Staff list', 'school-site-theme' ),
	);
	$args = array(
		'label'                 => __( 'Staff', 'school-site-theme' ),
		'description'           => __( 'A place to add school staff', 'school-site-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'staff' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'staff' ),
	);
	register_post_type( 'fwd-staff', $args );

}
add_action( 'init', 'staff_post_type', 0 );



function register_staff_template() {
    $post_type_obj = get_post_type_object('fwd-staff');
    
    // Define template blocks
    $post_type_obj->template = array(
        
        // Job Title Block
        array( 'core/paragraph', array(
            'placeholder' => 'Enter job title',
            'className' => 'staff-job-title',
            'lock' => array( 'move' => true, 'remove' => true ) 
        )),
        
        // Email Block
        array( 'core/paragraph', array(
            'placeholder' => 'Enter email address',
            'className' => 'staff-email',
            'lock' => array( 'move' => true, 'remove' => true )
        ))
    );
    
  
    $post_type_obj->template_lock = 'all';
}
add_action('init', 'register_staff_template');
