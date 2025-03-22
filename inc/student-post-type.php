<?php

function student_post_type() {

	$labels = array(
		'name'                  => _x( 'Students', 'Post Type General Name', 'school-site-theme' ),
		'singular_name'         => _x( 'Student', 'Post Type Singular Name', 'school-site-theme' ),
		'menu_name'             => __( 'Students', 'school-site-theme' ),
		'name_admin_bar'        => __( 'Students', 'school-site-theme' ),
		'archives'              => __( 'Student Archives', 'school-site-theme' ),
		'attributes'            => __( 'Student Attributes', 'school-site-theme' ),
		'parent_item_colon'     => __( 'Parent Student:', 'school-site-theme' ),
		'all_items'             => __( 'All Students', 'school-site-theme' ),
		'add_new_item'          => __( 'Add New Student', 'school-site-theme' ),
		'add_new'               => __( 'Add New', 'school-site-theme' ),
		'new_item'              => __( 'New Student', 'school-site-theme' ),
		'edit_item'             => __( 'Edit Student', 'school-site-theme' ),
		'update_item'           => __( 'Update Student', 'school-site-theme' ),
		'view_item'             => __( 'View Student', 'school-site-theme' ),
		'view_items'            => __( 'View Students', 'school-site-theme' ),
		'search_items'          => __( 'Search Students', 'school-site-theme' ),
		'not_found'             => __( 'Student Not found', 'school-site-theme' ),
		'not_found_in_trash'    => __( 'Student Not found in Trash', 'school-site-theme' ),
		'featured_image'        => __( 'Featured Image', 'school-site-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'school-site-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'school-site-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'school-site-theme' ),
		'insert_into_item'      => __( 'Insert into item', 'school-site-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'school-site-theme' ),
		'items_list'            => __( 'Student list', 'school-site-theme' ),
		'items_list_navigation' => __( 'Student list navigation', 'school-site-theme' ),
		'filter_items_list'     => __( 'Filter Student list', 'school-site-theme' ),
	);
	$args = array(
        'label'                 => __( 'Student', 'school-site-theme' ),
        'description'           => __( 'A place to add school students', 'school-site-theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'student' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-smiley',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'students' ),
        'template' => array(
            array('core/paragraph', array(
                'placeholder' => 'Enter student biography'
            )),
            array('core/button', array(
                'placeholder' => 'Add portfolio link'
            ))
        ),
        'template_lock' => 'all',
    );
    register_post_type( 'fwd-student', $args );
}
add_action( 'init', 'student_post_type', 0 );
