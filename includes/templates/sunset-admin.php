<h1>Sunset settings</h1>
<?php settings_errors() ?>
<div class="sunset-options-wrapper">
    <div class="sunset-sidebar-preview">
        <?php if(!empty(esc_attr(get_option('profile_avatar')))): ?>
            <figure class="profile-avatar">
                <img id="profile-avatar-preview" src="<?= esc_attr(get_option('profile_avatar')) ?>" alt="<?= esc_attr(get_option('first_name')) ?>">
            </figure>
        <?php endif; ?>
        <h1 class="user-name">
            <?= esc_attr(get_option('first_name')) . ' ' . esc_attr(get_option('last_name')); ?>
        </h1>
        <p>
            <?= esc_attr(get_option('description')); ?>
        </p>
    </div>
    <form action="options.php" method="POST" class="sunset-admin-options-form">
        <?php settings_fields('sunset-custom-settings') ?>
        <?php do_settings_sections('sunset_custom_settings') ?>
        <?php submit_button() ?>
    </form>
</div>
