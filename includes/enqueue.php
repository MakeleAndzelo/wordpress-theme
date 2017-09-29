<?php

function sunsetLoadAdminStyles($hook)
{
    if('toplevel_page_sunset_custom_settings' == $hook) {
        wp_register_style('sunset_admin_styles', get_template_directory_uri() . '/css/sunset.admin.css', [], '1.0.0');
        wp_enqueue_style('sunset_admin_styles');

        wp_enqueue_media();

        wp_register_script('sunset_admin_scripts', get_template_directory_uri() . '/js/sunset.admin.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('sunset_admin_scripts');
    }

    if('sunset_page_sunset_custom_css' == $hook) {
        wp_enqueue_script('ace', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js', '1.0.0', true);
        wp_enqueue_script('sunset_custom_css_js_script', get_template_directory_uri() . '/js/custom_css.admin.js', ['ace']);
        wp_enqueue_style('sunset_custom_css_js_styles', get_template_directory_uri() . '/css/custom_css.admin.css');
    }
}

add_action('admin_enqueue_scripts', 'sunsetLoadAdminStyles');
