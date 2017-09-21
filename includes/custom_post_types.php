<?php

$contactForm = get_option('active_form');

if($contactForm) {
    add_action('init', 'messagesCustomPostType');

    add_action('manage_sunset_messages_posts_custom_column', 'manageMessagesColumnsContent', 10, 2);
    add_filter('manage_sunset_messages_posts_columns', 'manageMessagesColumns');
}

function manageMessagesColumnsContent($column, $postId)
{
    switch($column) {
        case 'excerpt':
            echo get_the_excerpt();
            break;
        case 'email':
            echo 'email';
            break;
    }
}

function manageMessagesColumns()
{
    return [
        'title' => 'Title',
        'excerpt' => 'Excerpt',
        'email' => 'Email',
        'date' => 'Date',
    ];
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

    register_post_type('sunset_messages', $args);
}
