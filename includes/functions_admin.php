<?php

function sunsetCustomAdminPage()
{
    add_menu_page('Sunset Custom Settings', 'Sunset', 'manage_options', 'sunset_custom_settings', 'sunsetGenerateCustomAdminPage', 'dashicons-admin-customizer', 100);

    add_submenu_page('sunset_custom_settings', 'Settings', 'Settings' ,'manage_options', 'sunset_custom_settings', 'sunsetGenerateCustomAdminPage');

    add_submenu_page('sunset_custom_settings', 'Theme support', 'Theme support', 'manage_options', 'sunset_theme_support', 'sunsetGenerateThemeSupportPage');

    add_submenu_page('sunset_custom_settings', 'Contact', 'Contact', 'manage_options', 'sunset_theme_options_contact', 'sunsetGenerateThemeOptionsContact');

    add_submenu_page('sunset_custom_settings', 'Custom CSS options', 'Css options' ,'manage_options', 'sunset_custom_css', 'sunsetGenerateCssSettingsPage');

    add_action('admin_init', 'sunsetSidebarSettings');
    add_action('admin_init', 'sunsetThemeSupportSettings');
    add_action('admin_init', 'sunsetThemeContactFormOptions');
}

/* SIDEBAR OPTIONS*/

function sunsetSidebarSettings()
{
    add_settings_section('personal_informations', 'Personal informations', 'personalInformationsSettings', 'sunset_custom_settings');

    register_setting('sunset-custom-settings', 'profile_avatar');
    register_setting('sunset-custom-settings', 'first_name');
    register_setting('sunset-custom-settings', 'last_name');
    register_setting('sunset-custom-settings', 'description');
    register_setting('sunset-custom-settings', 'twitter_handler', function($input) {
        $output = sanitize_text_field($input);
        $output = str_replace("@", '', $output);
        return $output;
    });
    register_setting('sunset-custom-settings', 'facebook_handler');
    register_setting('sunset-custom-settings', 'gplus_handler');

    add_settings_field('personal_informations_profile_avatar', 'Profile avatar', 'personalInformationsProfileAvatar', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_full_name', 'Full name', 'personalInformationsFullName', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_description', 'Description', 'personalInformationsDescription', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_twitter_handler', 'Twitter', 'personalInformationsTwitterHandler', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_facebook_handler', 'Facebook', 'personalInformationsFacebookHandler', 'sunset_custom_settings', 'personal_informations');
    add_settings_field('personal_informations_gplus_handler', 'Google plus', 'personalInformationsGplusHandler', 'sunset_custom_settings', 'personal_informations');
}


function personalInformationsSettings()
{
    echo "Your personal informations";
}

function personalInformationsProfileAvatar()
{
    $profileAvatar = esc_attr(get_option('profile_avatar'));
    echo "<input type='button' id='profile-avatar-button' class='button button-secondary' value='Update your avatar'/>";
    echo "<input type='button' id='profile-avatar-remove-button' class='button button-secondary' value='Remove'/>";
    echo "<input type='hidden' id='profile-avatar-input' value='".$profileAvatar."' name='profile_avatar'/>";
}

function personalInformationsFullName()
{
    $firstName = esc_attr(get_option('first_name'));
    echo "<input type='text' value='".$firstName."' name='first_name' placeholder='Your name'/>";
    $lastName = esc_attr(get_option('last_name'));
    echo "<input type='text' value='".$lastName."' name='last_name' placeholder='Your second name'/>";
}

function personalInformationsDescription()
{
    $description = esc_attr(get_option('description'));
    echo "<input type='text' value='".$description."' name='description' placeholder='Description'/>";
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

/* END OF THE SIDEBAR OPTIONS */

function sunsetGenerateCssSettingsPage()
{

}


/* THEME SUPPORT PAGE */

function sunsetThemeSupportSettings()
{
    add_settings_section('theme_support', 'Theme support options', 'themeSupportSettings', 'sunset-theme-support');

    register_setting('theme-options-support', 'post_formats');
    register_setting('theme-options-support', 'custom_header');
    register_setting('theme-options-support', 'custom_background');

    add_settings_field('theme_support_post_formats', 'Post formats', 'themeSupportPostFormatsField', 'sunset-theme-support', 'theme_support');
    add_settings_field('theme_support_custom_header', 'Custom header', 'themeSupportCustomHeaderField', 'sunset-theme-support', 'theme_support');
    add_settings_field('theme_support_custom_background', 'Custom background', 'themeSupportCustomBackgroundField', 'sunset-theme-support', 'theme_support');
}

function themeSupportCustomHeaderField()
{
    $checked = get_option('custom_header') ? 'checked' : '';
    echo "<input type='checkbox' name='custom_header' {$checked} id='custom-header' />";
    echo "<label for='custom-header'><small>You can add custom background in theme options</small></label>";
}

function themeSupportCustomBackgroundField()
{
    $checked = get_option('custom_background') ? 'checked' : '';
    echo "<input type='checkbox' name='custom_background' {$checked} id='custom-background' />";
    echo "<label for='custom-background'><small>You can add custom header in theme options</small></label>";
}

function themeSupportPostFormatsField()
{
    $options = get_option('post_formats');
    $formats = ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'];
    foreach($formats as $format) {
        $isChecked = $options[$format] ? 'checked' : '';
        echo "<p>
            <input type='checkbox' value='1' id='{$format}' {$isChecked} name='post_formats[{$format}]'/>
            <label for={$format}>{$format}</label>
        </p>";
    }
}

function themeSupportSettings()
{
    echo "Choose your theme options";
}

function sunsetGenerateThemeSupportPage()
{
    require get_template_directory() . '/includes/templates/sunset-theme-support-page.php';
}

/* END OF THEME SUPPORT */

/* THEME CONTACT FORM*/

function sunsetThemeContactFormOptions()
{
    add_settings_section('sunset-contact-form-options', 'Customize contact form', 'contactFormSettings', 'sunset_theme_options_contact');

    register_setting('sunset-contact-form-options-group', 'active_form');

    add_settings_field('sunset_contact_form_active_form', 'Activate form', 'contactFormActivateField', 'sunset_theme_options_contact', 'sunset-contact-form-options');
}

function contactFormActivateField()
{
    $checked = get_option('active_form') ? 'checked' : '';
    echo "<input type='checkbox' name='active_form' {$checked} />";
}

function contactFormSettings()
{
    echo "Customize contact form";
}

function sunsetGenerateThemeOptionsContact()
{
    require get_template_directory() . '/includes/templates/sunset-theme-contact-form.php';
}

/* END THEME CONTACT FORM*/

add_action('admin_menu', 'sunsetCustomAdminPage');
