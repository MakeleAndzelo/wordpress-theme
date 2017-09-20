<?php

$contactForm = get_option('active_form');

if($contactForm) {
    add_action('init', 'messagesCustomPostType');
}

function messagesCustomPostType()
{
    $labels = [
        'name' => 'Messages',
        'singular_name' => 'Message',
        'menu_name' => 'Messages',
        'name_admin_bar' => 'Message',
    ];

    $args = [
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-email-alt',
        'supports' => ['title', 'editor', 'author'],
    ];

    register_post_type('sunset-messages', $args);
}
