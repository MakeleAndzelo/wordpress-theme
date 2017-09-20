<?php settings_errors() ?>
<form action="options.php" method="POST">
    <?php settings_fields('sunset-contact-form-options-group') ?>
    <?php do_settings_sections('sunset_theme_options_contact') ?>
    <?php submit_button() ?>
</form>
