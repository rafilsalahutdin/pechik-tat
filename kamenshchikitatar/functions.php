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

function load_more_portfolio() {
    $offset = intval($_POST['offset'] ?? 0);
    $post_id = intval($_POST['post_id'] ?? 0);
    $filter = sanitize_text_field($_POST['filter'] ?? 'all');

    if (!$post_id) {
        wp_send_json_error(['message' => 'Post ID not provided']);
    }

    $all_rows = get_field('works', $post_id);
    if (!is_array($all_rows) || empty($all_rows)) {
        wp_send_json_success(['html' => '', 'loaded' => 0, 'has_more' => false]);
    }

    // === ШАГ 1: Отфильтруем ВСЕ элементы по категории ===
    $filtered_rows = [];

    foreach ($all_rows as $row) {
        $categories_list = $row['vid'] ?? [];
        $data_category = '';

        if (is_array($categories_list)) {
            $values = [];
            foreach ($categories_list as $cat) {
                if (is_array($cat) && isset($cat['value'])) {
                    $values[] = $cat['value'];
                } elseif (!is_array($cat)) {
                    $values[] = $cat;
                }
            }
            $data_category = implode(' ', $values);
        } else {
            $data_category = (string)$categories_list;
        }

        if ($filter === 'all' || in_array($filter, explode(' ', $data_category))) {
            $filtered_rows[] = [
                'data_category' => $data_category,
                'image' => $row['img'] ?? [],
                'title' => $row['title'] ?? 'Проект',
                'location_year' => $row['location_year'] ?? 'Казань, 2025'
            ];
        }
    }

    // === ШАГ 2: Теперь берём 3 элементов НАЧИНАЯ С offset ===
    $total = count($filtered_rows);
    $end = min($offset + 3, $total);
    $items_html = '';
    $loaded = 0;

    for ($i = $offset; $i < $end; $i++) {
        if (!isset($filtered_rows[$i])) continue;

        $item = $filtered_rows[$i];
        $url = $item['image']['url'] ?? '';
        if (empty($url)) continue;

        $items_html .= '<article class="portfolio-item" data-category="' . esc_attr($item['data_category']) . '">
            <div class="portfolio-item__image">
                <img src="' . esc_url($url) . '" alt="' . esc_attr($item['title']) . '" loading="lazy" width="600" height="400">
                <div class="portfolio-item__overlay">
                    <a href="' . esc_url($url) . '" class="fancybox">
                        <button class="portfolio-item__btn" aria-label="Посмотреть подробнее">
                            <i class="fas fa-search-plus"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="portfolio-item__content">
                <p>' . esc_html($item['title']) . ', ' . esc_html($item['location_year']) . '</p>
            </div>
        </article>';

        $loaded++;
    }

    $has_more = $end < $total;

    wp_send_json_success([
        'html' => $items_html,
        'loaded' => $loaded,
        'has_more' => $has_more
    ]);
}
add_action('wp_ajax_load_more_portfolio', 'load_more_portfolio');
add_action('wp_ajax_nopriv_load_more_portfolio', 'load_more_portfolio');

function enqueue_theme_scripts() {
    wp_enqueue_script('jquery');

    // Регистрируем основной скрипт
    wp_enqueue_script(
        'theme-main',
        get_template_directory_uri() . '/scripts.js',
        ['jquery'],
        null,
        true
    );

    // Передаём ajaxurl
    wp_localize_script('theme-main', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

?>