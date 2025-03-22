<?php
/*
* Plugin Name: Student Taxonomy
* Description: A taxonomy for students on the school site.
* Version: 1.0
* Author: Nicole + Stephanie
* Author URI: nicolelogan.dev
*/

function student_taxonomy() {
	 $labels = array(
		 'name'              => _x( 'Students', 'taxonomy general name' ),
		 'singular_name'     => _x( 'Student', 'taxonomy singular name' ),
		 'search_items'      => __( 'Search Students' ),
		 'all_items'         => __( 'All Students' ),
		 'parent_item'       => __( 'Parent Student' ),
		 'parent_item_colon' => __( 'Parent Student:' ),
		 'edit_item'         => __( 'Edit Student' ),
		 'update_item'       => __( 'Update Student' ),
		 'add_new_item'      => __( 'Add New Student' ),
		 'new_item_name'     => __( 'New Student' ),
		 'menu_name'         => __( 'Student' ),
	 );
	 $args   = array(
		 'hierarchical'      => true, 
		 'labels'            => $labels,
		 'show_ui'           => true,
		 'show_admin_column' => true,
		 'query_var'         => true,
		 'rewrite'           => [ 'slug' => 'student' ],
	 );
	 register_taxonomy( 'student', [ 'post' ], $args );
}
add_action( 'init', 'student_taxonomy' );

function create_student_taxonomy_terms() {
    $terms = array(
        'Freshman' => array(
            'description' => 'Students in their first year of high school',
            'slug' => 'freshman'
        ),
        'Sophomore' => array(
            'description' => 'Students in their second year of high school',
            'slug' => 'sophomore'
        ),
        'Junior' => array(
            'description' => 'Students in their third year of high school',
            'slug' => 'junior'
        ),
        'Senior' => array(
            'description' => 'Students in their fourth year of high school',
            'slug' => 'senior'
        )
    );

    foreach ($terms as $term_name => $term_args) {
        if (!term_exists($term_name, 'student_category')) {
            wp_insert_term($term_name, 'student_category', $term_args);
        }
    }
}
add_action( 'init', 'create_student_taxonomy_terms' );
