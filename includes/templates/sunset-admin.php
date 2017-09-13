<h1>Sunset settings</h1>
<?php settings_errors() ?>
<form action="options.php" method="POST">
    <?php settings_fields('sunset-custom-settings') ?>
    <?php do_settings_sections('sunset_custom_settings') ?>
    <?php submit_button() ?>
</form>
