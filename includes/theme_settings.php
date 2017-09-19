<?php

$postFormats = get_option('post_formats');

if(!empty($postFormats)) {
    add_theme_support('post-formats', array_keys($postFormats));
}

if(get_option('custom_header')) {
    add_theme_support('custom-header');
}

if(get_option('custom_background')) {
    add_theme_support('custom-background');
}
