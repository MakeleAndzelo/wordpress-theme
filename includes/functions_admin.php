<?php

function sunsetCustomAdminPage()
{
    add_menu_page('Sunset Custom Settings', 'Sunset', 'manage_options', 'sunset_custom_settings', 'sunsetGenerateCustomAdminPage', 'dashicons-admin-customizer', 100);

    add_submenu_page('sunset_custom_settings', 'Settings', 'Settings' ,'manage_options', 'sunset_custom_settings', 'sunsetGenerateCustomAdminPage');

    add_submenu_page('sunset_custom_settings', 'Custom CSS options', 'Css options' ,'manage_options', 'sunset_custom_css', 'sunsetGenerateCssSettingsPage');
}

function sunsetGenerateCustomAdminPage()
{
    require get_template_directory() . '/includes/templates/sunset-admin.php';
}

function sunsetGenerateCssSettingsPage()
{

}
add_action('admin_menu', 'sunsetCustomAdminPage');
