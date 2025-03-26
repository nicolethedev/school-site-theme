<?php
/*
    * Plugin Name: Staff Taxonomy
    * Description: A taxonomy for staff on the school site.
    * Version: 1.0
    * Author: Nicole + Stephanie
    * Author URI: nicolelogan.dev
*/

function staff_taxonomy() {
    $labels = array(
        'name'              => _x( 'Staff Type', 'taxonomy general name' ),
        'search_items'      => __( 'Search Staff Types' ),
        'all_items'         => __( 'All Staff Types' ),
        'parent_item'       => __( 'Parent Type' ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item'         => __( 'Edit Type' ),
        'update_item'       => __( 'Update Type' ),
        'add_new_item'      => __( 'Add New Staff Type' ),
        'new_item_name'     => __( 'New Staff Type' ),
        'menu_name'         => __( 'Staff Types' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'staff-type'],
        'show_in_rest'      => true,
    );
    
    register_taxonomy( 'staff-type', ['fwd-staff'], $args );
}
add_action( 'init', 'staff_taxonomy' );

function create_staff_terms() {
    $terms = array(
        'Faculty' => array(
            'description' => 'Teachers and other teaching staff',
            'slug' => 'faculty'
        ),
        'Administrative' => array(
            'description' => 'Administrative staff',
            'slug' => 'administrative'
        )
    );

    foreach ($terms as $term_name => $term_args) {
        if (!term_exists($term_name, 'staff-type')) {
            wp_insert_term($term_name, 'staff-type', $term_args);
        }
    }
}
add_action( 'init', 'create_staff_terms' );
