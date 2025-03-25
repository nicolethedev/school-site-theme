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

    function school_site_setup() {
        add_editor_style( get_stylesheet_uri() );
    }

    function change_staff_title_placeholder($title) {
        $screen = get_current_screen();
        if ('fwd-staff' == $screen->post_type) {
            $title = 'Add staff name';
        }
        return $title;
    }
    add_filter('enter_title_here', 'change_staff_title_placeholder');

    function change_student_title_placeholder($title) {
        $screen = get_current_screen();
        if ('fwd-student' == $screen->post_type) {
            $title = 'Add student name';
        }
        return $title;
    }
    add_filter('enter_title_here', 'change_student_title_placeholder');
    

    function add_student_image_sizes() {
    add_image_size('student-thumbnail', 300, 300, true);
    add_image_size('student-featured', 600, 400, true);
}
add_action('after_setup_theme', 'add_student_image_sizes');

function add_student_image_sizes_to_dropdown($sizes) {
    return array_merge($sizes, array(
        'student-thumbnail' => __('Student Thumbnail'),
        'student-featured' => __('Student Featured')
    ));
}
add_filter('image_size_names_choose', 'add_student_image_sizes_to_dropdown');

function enqueue_lightgallery_on_homepage() {
    if (is_front_page()) { // Only load on the front page
        // Load lightGallery CSS from CDN
        wp_enqueue_style(
            'lightgallery-css',
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/2.7.1/css/lightgallery-bundle.min.css',
            array(),
            '2.7.1'
        );

        // Load lightGallery JS from CDN
        wp_enqueue_script(
            'lightgallery-js',
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/2.7.1/lightgallery.umd.min.js',
            array('jquery'),
            '2.7.1',
            true // Loads in footer for better performance
        );

        // Load lightGallery Zoom plugin
        wp_enqueue_script(
            'lightgallery-zoom',
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/2.7.1/plugins/zoom/lg-zoom.min.js',
            array('lightgallery-js'),
            '2.7.1',
            true
        );

        // Load lightGallery Thumbnail plugin
        wp_enqueue_script(
            'lightgallery-thumbnail',
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/2.7.1/plugins/thumbnail/lg-thumbnail.min.js',
            array('lightgallery-js'),
            '2.7.1',
            true
        );

        // Load custom JS file to initialize lightGallery
        wp_enqueue_script(
            'custom-lightgallery-settings',
            get_template_directory_uri() . '/assets/js/lightgallery-init.js',
            array('lightgallery-js', 'lightgallery-zoom', 'lightgallery-thumbnail'),
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_lightgallery_on_homepage');






    require get_template_directory() . '/inc/student-taxonomies.php';
    require get_template_directory() . '/inc/student-post-type.php';
    require get_template_directory() . '/inc/staff-taxonomies.php';
    require get_template_directory() . '/inc/staff-post-type.php';
