<?php

// CPTs
function school_register_custom_post_types() {

    // Staff CPT
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name'  ),
        'singular_name'      => _x( 'Staff', 'post type singular name'  ),
        'menu_name'          => _x( 'Staff', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'staff' ),
        'add_new_item'       => __( 'Add New Staff' ),
        'new_item'           => __( 'New Staff' ),
        'edit_item'          => __( 'Edit Staff' ),
        'view_item'          => __( 'View Staff'  ),
        'all_items'          => __( 'All Staff' ),
        'search_items'       => __( 'Search Staff' ),
        'parent_item_colon'  => __( 'Parent Staff:' ),
        'not_found'          => __( 'No staff found.' ),
        'not_found_in_trash' => __( 'No staff found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title' ),
        'template'           => array( 
                                    array( 'core/paragraph',
                                        array(
                                            'placeholder' => 'Add staff biography...'
                                        ),
                                    ),
                                    array( 'core/button',
                                        array(
                                            'placeholder' => 'Add staff portfolio...',
                                        ),
                                    ),
                                ),
        'template_lock'      => 'all',
    );

    register_post_type( 'school-staff', $args );



    // Student CPT
    $labels = array(
        'name'               => _x( 'Students', 'post type general name'  ),
        'singular_name'      => _x( 'Student', 'post type singular name'  ),
        'menu_name'          => _x( 'Students', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'student' ),
        'add_new_item'       => __( 'Add New Student' ),
        'new_item'           => __( 'New Student' ),
        'edit_item'          => __( 'Edit Student' ),
        'view_item'          => __( 'View Student'  ),
        'all_items'          => __( 'All Students' ),
        'search_items'       => __( 'Search Students' ),
        'parent_item_colon'  => __( 'Parent Students:' ),
        'not_found'          => __( 'No students found.' ),
        'not_found_in_trash' => __( 'No students found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template'           => array( 
                                    array( 'core/paragraph',
                                        array(
                                            'placeholder' => 'Add student biography...'
                                        ),
                                    ),
                                    array( 'core/button',
                                        array(
                                            'placeholder' => 'Add student portfolio...',
                                        ),
                                    ),
                                ),
        'template_lock'      => 'all',
    );

    register_post_type( 'school-student', $args );

}
add_action( 'init', 'school_register_custom_post_types' );



// Taxonomies
function school_register_taxonomies() {

    // Add Staff Category taxonomy

    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff Categories' ),
        'all_items'         => __( 'All Staff Categories' ),
        'parent_item'       => __( 'Parent Staff Categories' ),
        'parent_item_colon' => __( 'Parent Staff Categories:' ),
        'edit_item'         => __( 'Edit Staff Categories' ),
        'view_item'         => __( 'View Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Work Staff Category' ),
        'menu_name'         => __( 'Staff Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );

    register_taxonomy( 'school-staff-category', array( 'school-staff' ), $args );


    
    // Add Student Category taxonomy
    $labels = array(
        'name'              => _x( 'Student Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Categories' ),
        'all_items'         => __( 'All Student Categories' ),
        'parent_item'       => __( 'Parent Student Categories' ),
        'parent_item_colon' => __( 'Parent Student Categories:' ),
        'edit_item'         => __( 'Edit Student Categories' ),
        'view_item'         => __( 'View Student Category' ),
        'update_item'       => __( 'Update Student Category' ),
        'add_new_item'      => __( 'Add New Student Category' ),
        'new_item_name'     => __( 'New Work Student Category' ),
        'menu_name'         => __( 'Student Category' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );

    register_taxonomy( 'school-student-category', array( 'school-student' ), $args );

}
add_action( 'init', 'school_register_taxonomies' );

function school_rewrite_flush() {
    school_register_custom_post_types();
    school_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'school_rewrite_flush' );