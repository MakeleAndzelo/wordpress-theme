<?php

$postFormats = get_option('post_formats');
if (!empty($postFormats)) {
    add_theme_support('post-formats', array_keys($postFormats));
}
