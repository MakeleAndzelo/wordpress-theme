<?php

function sunsetLoadAdminStyles($hook)
{
    if('toplevel_page_sunset_custom_settings' != $hook) {
        return false;
    }
    wp_register_style('sunset_admin_styles', get_template_directory_uri() . '/css/sunset.admin.css', [], '1.0.0');
    wp_enqueue_style('sunset_admin_styles');

    wp_enqueue_media();

    wp_register_script('sunset_admin_scripts', get_template_directory_uri() . '/js/sunset.admin.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('sunset_admin_scripts');
}

add_action('admin_enqueue_scripts', 'sunsetLoadAdminStyles');
