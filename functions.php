<?php
// Enqueue scripts and styles
function school_site_enqueues() {
    wp_enqueue_style(
        'school-site-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_style(
        'school-site-normalize',
        'https://unpkg.com/@csstools/normalize.css', 
        array(), 
        '12.1.0'
    );
}
add_action('wp_enqueue_scripts', 'school_site_enqueues');

// Theme setup
function school_site_setup() {
    add_editor_style( get_stylesheet_uri() );
    add_theme_support('post-thumbnails');
    add_image_size('student-thumbnail', 300, 300, true);
    add_image_size('student-featured', 600, 400, true);
}
add_action('after_setup_theme', 'school_site_setup');

// Custom image sizes for media library
function add_student_image_sizes_to_dropdown($sizes) {
    return array_merge($sizes, array(
        'student-thumbnail' => __('Student Thumbnail'),
        'student-featured' => __('Student Featured')
    ));
}
add_filter('image_size_names_choose', 'add_student_image_sizes_to_dropdown');

// Change placeholder text for custom post types
function change_custom_post_type_title_placeholder($title) {
    $screen = get_current_screen();
    if ('fwd-staff' == $screen->post_type) {
        $title = 'Add staff name';
    } elseif ('fwd-student' == $screen->post_type) {
        $title = 'Add student name';
    }
    return $title;
}
add_filter('enter_title_here', 'change_custom_post_type_title_placeholder');

// Enqueue LightGallery on homepage
function enqueue_lightgallery_on_homepage() {
    if (is_front_page()) {
        // LightGallery enqueue code here (unchanged)
    }
}
add_action('wp_enqueue_scripts', 'enqueue_lightgallery_on_homepage');

function enqueue_aos_files() {
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', array( 'strategy' => 'defer' ) );
    wp_enqueue_script( 'aos-settings',  get_theme_file_uri( 'assets/js/aos-settings.js'), array('aos-js'), '2.3.1', array( 'strategy' => 'defer' ) );
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
}
add_action('wp_enqueue_scripts', 'enqueue_aos_files');


// Include custom post types and taxonomies
require get_template_directory() . '/inc/student-taxonomies.php';
require get_template_directory() . '/inc/student-post-type.php';
require get_template_directory() . '/inc/staff-taxonomies.php';
require get_template_directory() . '/inc/staff-post-type.php';

require get_theme_file_path( '/aos/aos.php' );