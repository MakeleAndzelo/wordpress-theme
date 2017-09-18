<h1>Sunset settings</h1>
<?php settings_errors() ?>
<form action="options.php" method="POST">
    <?php settings_fields('theme-options-support') ?>
    <?php do_settings_sections('sunset-theme-support') ?>
    <?php submit_button() ?>
</form>
