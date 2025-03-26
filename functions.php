<?php
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

function enqueue_lightgallery_on_homepage() {
    if (is_front_page()) {

        wp_enqueue_style(
            'lightgallery-css',
            get_template_directory_uri() . '/assets/lightgallery/lightgallery-bundle.min.css', 
            array(),
            '2.7.1'
        );

        wp_enqueue_script(
            'lightgallery-js',
            get_template_directory_uri() . '/assets/lightgallery/lightgallery.umd.js', 
            array('jquery'), 
            '2.7.1',
            true
        );

        wp_enqueue_script(
            'lightgallery-zoom',
            get_template_directory_uri() . '/assets/lightgallery/lg-zoom.min.js', 
            array('lightgallery-js'), 
            '2.7.1', 
            true
        );

        wp_enqueue_script(
            'lightgallery-thumbnail',
            get_template_directory_uri() . '/assets/lightgallery/lg-thumbnail.min.js', 
            array('lightgallery-js'), 
            '2.7.1', 
            true
        );

        wp_enqueue_script(
            'lightgallery-init',
            get_template_directory_uri() . '/assets/js/lightgallery-init.js', 
            array('jquery', 'lightgallery-js', 'lightgallery-zoom', 'lightgallery-thumbnail'),
            false, 
            true
        );
    }
}


function school_site_setup() {
    add_editor_style(get_stylesheet_uri());
    add_theme_support('post-thumbnails');
    add_image_size('student-thumbnail', 300, 300, true);
    add_image_size('student-featured', 600, 400, true);
}
add_action('after_setup_theme', 'school_site_setup');

function add_student_image_sizes_to_dropdown($sizes) {
    return array_merge($sizes, array(
        'student-thumbnail' => __('Student Thumbnail'),
        'student-featured' => __('Student Featured')
    ));
}
add_filter('image_size_names_choose', 'add_student_image_sizes_to_dropdown');

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

function enqueue_aos_files() {
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', array( 'strategy' => 'defer' ) );
    wp_enqueue_script( 'aos-settings',  get_theme_file_uri( 'assets/js/aos-settings.js'), array('aos-js'), '2.3.1', array( 'strategy' => 'defer' ) );
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
}
add_action('wp_enqueue_scripts', 'enqueue_aos_files');

require get_template_directory() . '/inc/student-taxonomies.php';
require get_template_directory() . '/inc/student-post-type.php';
require get_template_directory() . '/inc/staff-taxonomies.php';
require get_template_directory() . '/inc/staff-post-type.php';
require get_theme_file_path('/aos/aos.php');
