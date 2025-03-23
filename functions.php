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






    require get_template_directory() . '/inc/student-taxonomies.php';
    require get_template_directory() . '/inc/student-post-type.php';
    require get_template_directory() . '/inc/staff-taxonomies.php';
    require get_template_directory() . '/inc/staff-post-type.php';
