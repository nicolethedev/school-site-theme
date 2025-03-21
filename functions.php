<?php
    function school_site_enqueues() {
        wp_enqueue_style(
            'school-site-style',
            get_stylesheet_uri()
            array(),
            wp_get_theme()->get('Version')
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

    require get_template_directory() . '/inc/student-taxonomies.php';
    require get_template_directory() . '/inc/student-post-type.php';
    require get_template_directory() . '/inc/staff-taxonomies.php';
    require get_template_directory() . '/inc/staff-post-type.php';
