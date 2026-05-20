<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="images/fav.png">
    <link rel="apple-touch-icon" href="images/fav.png">
    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <?php wp_head(); ?>
</head>

<body>
    <!-- Skip to content for accessibility -->
    <a href="#main-content" class="skip-link">Перейти к основному содержанию</a>

    <!-- Header -->
    <header class="header" id="header" role="banner">
        <div class="container header__container">
            <a href="#" class="logo" aria-label="Каменщики Татарстана - на главную">
                <img src="images/logo.png" alt="Каменщики Татарстана" loading="eager" width="190" height="60">
            </a>

            <nav class="nav" id="nav" role="navigation" aria-label="Основная навигация">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#services" class="nav__link">Услуги</a></li>
                    <li class="nav__item"><a href="#portfolio" class="nav__link">Портфолио</a></li>
                    <li class="nav__item"><a href="#advantages" class="nav__link">Преимущества</a></li>
                    <li class="nav__item"><a href="#reviews" class="nav__link">Отзывы</a></li>
                    <li class="nav__item"><a href="#contacts" class="nav__link">Контакты</a></li>
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