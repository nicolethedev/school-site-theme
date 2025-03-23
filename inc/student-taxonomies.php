<?php
/*
* Plugin Name: Student Grade Level Taxonomy
* Description: A taxonomy for student grade levels on the school site.
* Version: 1.0
* Author: Nicole + Stephanie
* Author URI: nicolelogan.dev
*/

function student_grade_level_taxonomy() {
     $labels = array(
         'name'              => _x( 'Students Grade Level', 'taxonomy general name' ),
         'singular_name'     => _x( 'Student Grade Level', 'taxonomy singular name' ),
         'search_items'      => __( 'Search Grade Levels' ),
         'all_items'         => __( 'All Grade Levels' ),
         'parent_item'       => __( 'Parent Grade Level' ),
         'parent_item_colon' => __( 'Parent Grade Level:' ),
         'edit_item'         => __( 'Edit Grade Level' ),
         'update_item'       => __( 'Update Grade Level' ),
         'add_new_item'      => __( 'Add New Grade Level' ),
         'new_item_name'     => __( 'New Grade Level' ),
         'menu_name'         => __( 'Grade Levels' ),
     );
     $args   = array(
         'hierarchical'      => true, 
         'labels'            => $labels,
         'show_ui'           => true,
         'show_admin_column' => true,
         'query_var'         => true,
         'rewrite'           => [ 'slug' => 'student-grade-level' ],
         'show_in_rest'      => true,
     );
     register_taxonomy( 'student-grade-level', [ 'fwd-student' ], $args );
}
add_action( 'init', 'student_grade_level_taxonomy' );

function create_student_grade_level_terms() {
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
        if (!term_exists($term_name, 'student-grade-level')) {
            wp_insert_term($term_name, 'student-grade-level', $term_args);
        }
    }
}
add_action( 'init', 'create_student_grade_level_terms' );
