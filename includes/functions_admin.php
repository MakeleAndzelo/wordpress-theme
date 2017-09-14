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
    register_setting('sunset-custom-settings', 'last_name');
    register_setting('sunset-custom-settings', 'twitter_handler', function($input) {
        $output = sanitize_text_field($input);
        $output = str_replace("@", '', $output);
        return $output;
    });
    register_setting('sunset-custom-settings', 'facebook_handler');
    register_setting('sunset-custom-settings', 'gplus_handler');

    add_settings_field('personal_informations_full_name', 'Full name', 'personalInformationsFullName', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_twitter_handler', 'Twitter', 'personalInformationsTwitterHandler', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_facebook_handler', 'Facebook', 'personalInformationsFacebookHandler', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_gplus_handler', 'Google plus', 'personalInformationsGplusHandler', 'sunset_custom_settings', 'personal_informations');
}

function personalInformationsSettings()
{
    echo "Your personal informations";
}

function personalInformationsFullName()
{
    $firstName = esc_attr(get_option('first_name'));
    echo "<input type='text' value='".$firstName."' name='first_name' placeholder='Your name'/>";
    $lastName = esc_attr(get_option('last_name'));
    echo "<input type='text' value='".$lastName."' name='last_name' placeholder='Your second name'/>";
}

function personalInformationsTwitterHandler()
{
    $twitterHandler = esc_attr(get_option('twitter_handler'));
    echo "<input type='text' value='".$twitterHandler."' name='twitter_handler' placeholder='Your twitter'/>";
    echo "<p class='description'>Without @ symbol</p>";
}

function personalInformationsFacebookHandler()
{
    $facebookHandler = esc_attr(get_option('facebook_handler'));
    echo "<input type='text' value='".$facebookHandler."' name='facebook_handler' placeholder='Your facebook'/>";
}

function personalInformationsGplusHandler()
{
    $gplusHandler = esc_attr(get_option('gplus_handler'));
    echo "<input type='text' value='".$gplusHandler."' name='gplus_handler' placeholder='Your google plus'/>";
}

function sunsetGenerateCustomAdminPage()
{
    require get_template_directory() . '/includes/templates/sunset-admin.php';
}

function sunsetGenerateCssSettingsPage()
{

}
add_action('admin_menu', 'sunsetCustomAdminPage');
