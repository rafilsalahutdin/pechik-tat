<?php
// Поддержка темой нужных функций
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'kamenshchikitatar'),
    ));
}
add_action('after_setup_theme', 'theme_setup');


?>