<?php

$contactForm = get_option('active_form');

if($contactForm) {
    add_action('init', 'messagesCustomPostType');

    add_action('manage_sunset_messages_posts_custom_column', 'manageMessagesColumnsContent', 10, 2);
    add_filter('manage_sunset_messages_posts_columns', 'manageMessagesColumns');

    add_action('add_meta_boxes', 'sunset_contact_email_meta_box');
    add_action('save_post', 'sunset_save_email_data');
}

function manageMessagesColumnsContent($column, $postId)
{
    switch($column) {
        case 'excerpt':
            echo get_the_excerpt();
            break;
        case 'email':
            echo get_post_meta($postId, '_contact_email_value_key', true);
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

/* CUSTOM META BOXES */

function sunset_contact_email_meta_box()
{
    add_meta_box( 'contact_email', 'User Email', 'email_meta_box_callback', 'sunset_messages', 'side');
}

function email_meta_box_callback($post)
{
    wp_nonce_field('sunset_save_email_data', 'sunset_email_meta_box_nonce');

    $value = get_post_meta($post->ID, '_contact_email_value_key', true);

    echo "<label for='sunset_email_meta_box_id'>User Email Address: </label>";
    echo "<input type='email' id='sunset_email_meta_box_id' name='sunset_email_meta_box' value='{$value}' />";
}

function sunset_save_email_data($post_id)
{
    if(!isset($_POST['sunset_email_meta_box_nonce'])) {
        return false;
    }

    if(!wp_verify_nonce($_POST['sunset_email_meta_box_nonce'], 'sunset_save_email_data')) {
        return false;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return false;
    }

    if(!current_user_can('edit_post', $post_id)) {
        return false;
    }

    if(!isset($_POST['sunset_email_meta_box'])) {
        return false;
    }

    $my_data = sanitize_text_field($_POST['sunset_email_meta_box']);
    update_post_meta($post_id, '_contact_email_value_key', $my_data);
}
