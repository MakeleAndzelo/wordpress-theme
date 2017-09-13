<?php

function sunsetCustomAdminPage()
{
    add_menu_page('Sunset Custom Settings', 'Sunset', 'manage_options', 'sunset_custom_settings', 'sunsetGenerateCustomAdminPage', 'dashicons-admin-customizer', 100);

    add_submenu_page('sunset_custom_settings', 'Settings', 'Settings' ,'manage_options', 'sunset_custom_settings', 'sunsetGenerateCustomAdminPage');

    add_submenu_page('sunset_custom_settings', 'Custom CSS options', 'Css options' ,'manage_options', 'sunset_custom_css', 'sunsetGenerateCssSettingsPage');

    add_action('admin_init', 'sunsetCustomSettings');
}

function sunsetCustomSettings()
{
    add_settings_section('personal_informations', 'Personal informations', 'personalInformationsSettings', 'sunset_custom_settings');

    register_setting('sunset-custom-settings', 'first_name');
    add_settings_field('personal_informations_first_name', 'First Name', 'personalInformationsFirstName', 'sunset_custom_settings', 'personal_informations');

    register_setting('sunset-custom-settings', 'second_name');
    add_settings_field('personal_informations_second_name', 'Second name', 'personalInformationsSecondName', 'sunset_custom_settings', 'personal_informations');

}

function personalInformationsSettings()
{
    echo "Your personal informations";
}

function personalInformationsFirstName()
{
    $firstName = esc_attr(get_option('first_name'));
    echo "<input type='text' value='".$firstName."' name='first_name' placeholder='Your name'/>";
}


function personalInformationsSecondName()
{
    $secondName = esc_attr(get_option('second_name'));
    echo "<input type='text' value='".$secondName."' name='second_name' placeholder='Your second name'/>";
}

function sunsetGenerateCustomAdminPage()
{
    require get_template_directory() . '/includes/templates/sunset-admin.php';
}

function sunsetGenerateCssSettingsPage()
{

}
add_action('admin_menu', 'sunsetCustomAdminPage');
