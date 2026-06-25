<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/wp-content/themes/kamenshchikitatar/images/fav.png">
    <link rel="apple-touch-icon" href="/wp-content/themes/kamenshchikitatar/images/fav.png">
    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="/wp-content/themes/kamenshchikitatar/style.css?v=0.3">
    <?php wp_head(); ?>
    <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>" />
    <meta property="og:description" content="<?php echo esc_attr(get_bloginfo('description')); ?>" />
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/images/site.png'); ?>" />
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri() . '/images/site.png'); ?>" />
</head>

<body>
    <!-- Skip to content for accessibility -->
    <a href="#main-content" class="skip-link">Перейти к основному содержанию</a>

    <!-- Header -->
    <header class="header" id="header" role="banner">
        <div class="container header__container">
            <a href="/" class="logo" aria-label="Каменщики Татарстана - на главную">
                <img src="/wp-content/themes/kamenshchikitatar/images/logo.png" alt="Каменщики Татарстана" loading="eager" width="190" height="60">
            </a>

            <nav class="nav" id="nav" role="navigation" aria-label="Основная навигация">
                <ul class="nav__list">
                    <?php if (is_front_page()) : ?>
                        <!-- Front page menu -->
                        <li class="nav__item"><a href="#services" class="nav__link">Услуги</a></li>
                        <li class="nav__item"><a href="#masters" class="nav__link">Наши мастера</a></li>
                        <li class="nav__item"><a href="#portfolio" class="nav__link">Портфолио</a></li>
                        <li class="nav__item"><a href="#price" class="nav__link">Цены</a></li>
                        <!--li class="nav__item"><a href="#reviews" class="nav__link">Отзывы</a></li-->
                        <li class="nav__item"><a href="#contacts" class="nav__link">Контакты</a></li>
                    <?php else : ?>
                        <!-- Default menu for other pages -->
                        <li class="nav__item"><a href="#services" class="nav__link">Услуги</a></li>
                        <li class="nav__item"><a href="#portfolio" class="nav__link">Наши работы</a></li>
                        <li class="nav__item"><a href="#contacts" class="nav__link">Контакты</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <div class="header__actions">
                <a href="tel:+79600352588" class="header__phone">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <span>+7 (960) 035-25-88</span>
                </a>
                <button class="burger" id="burger" aria-label="Открыть меню" aria-expanded="false" aria-controls="nav">
                    <span class="burger__line"></span>
                    <span class="burger__line"></span>
                    <span class="burger__line"></span>
                </button>
            </div>
        </div>
    </header>