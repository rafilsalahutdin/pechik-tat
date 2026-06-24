<?php
/**
 * Template Name: Участник
 */
get_header(); ?>
    <main id="main-content">
        <!-- Hero Section -->
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero__bg" aria-hidden="true"></div>
            <div class="hero__overlay"></div>
            <div class="container hero__container">
                <div class="hero__content">
                    <h1 id="hero-title" class="hero__title">
                        <?php echo get_field('title'); ?>
                    </h1>
                    <p class="hero__subtitle">
                       <?php echo get_field('title_text'); ?>
                    </p>
                    <!--div class="hero__stats">
                        <div class="stat">
                            <span class="stat__number">15+</span>
                            <span class="stat__label">лет опыта</span>
                        </div>
                        <div class="stat">
                            <span class="stat__number">500+</span>
                            <span class="stat__label">проектов</span>
                        </div>
                        <div class="stat">
                            <span class="stat__number">5 лет</span>
                            <span class="stat__label">гарантия</span>
                        </div>
                    </div-->
                    <div class="hero__actions">
                        <a href="#contacts" class="btn btn--primary btn--large">
                            <i class="fas fa-calculator" aria-hidden="true"></i>
                            Бесплатный расчёт
                        </a>
                        <a href="#portfolio" class="btn btn--outline btn--large">
                            Наши работы
                        </a>
                    </div>
                </div>
                <div class="hero__image" aria-hidden="true">
                    <div class="hero__card glass">
                        <img src="<?php echo get_field('logo_foto'); ?>" loading="eager" width="600" height="400">
                        <div class="hero__card-badge">
                            <i class="fas fa-award"></i>
                            <span>Премиум качество</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__scroll" aria-hidden="true">
                <i class="fas fa-chevron-down"></i>
            </div>
        </section>
        <!-- Services Section -->
    <?php if (have_rows('srv')) : ?>    
        <section class="services section" id="services" aria-labelledby="services-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title">Наши услуги</h2>
                    <!--p class="section__subtitle">
                        Реализуем проекты любой сложности с использованием различных видов кирпича: керамического, клинкерного, кирпича ручной формовки, ригельного и евроформата. Предоставляем услуги по замеру, расчету материалов, разработке проектов и 3D-визуализации. Гарантируем высокое качество кладочных работ и подберем специалиста в соответствии с вашими требованиями.
                    </p-->
                </header>
                <div class="services__grid">
                    <?php 
                    $i = 0;
                    while (have_rows('srv')) : the_row();
                        $i++;
                        $title    = get_sub_field('title');
                        $subtitle = get_sub_field('subtitle');
                        $desc     = get_sub_field('desc'); // WYSIWYG
                        $price    = get_sub_field('price');
                        $video    = get_sub_field('video');
                        $icon     = get_sub_field('icon'); // текстовое поле: "fa-home", "fa-fire"
                        // 🔍 Получаем фото из повторителя `fotos`
                        $foto_url = '';
                        if (have_rows('fotos', false)) { // false — не переключать on_post, просто проверяем
                            while (have_rows('fotos', false)) : the_row();
                                $foto = get_sub_field('foto'); // URL или array
                                if ($foto) {
                                    $foto_url = is_array($foto) ? $foto['url'] : $foto;
                                    if ($foto_url) break; // нашли первое фото — выходим
                                }
                            endwhile;
                            wp_reset_postdata(); // безопасно для outer loop
                        }
                        // Цвета по порядку
                        $colors = ['service-card__icon--red', 'service-card__icon--beige', 'service-card__icon--green'];
                        $color_class = $colors[($i - 1) % 3];

                        // 4-й элемент = "Популярное"
                        $featured_class = ($i === 4) ? 'service-card--featured' : '';
                        $badge = ($i === 4) ? '<div class="service-card__badge">Популярное</div>' : '';
                    ?>
                        <article class="service-card glass <?= $featured_class ?>">
                            <?= $badge ?>
                            <div class="service-card__icon <?= $color_class ?>" <?php if ($foto_url) { echo 'style="width: 250px;height: 250px;"';} ?>>
                                <?php if ($icon) : ?>
                                    <i class="fas <?= esc_attr($icon) ?>" aria-hidden="true"></i>
                                <?php elseif ($foto_url) : ?>
                                    <img src="<?= esc_url($foto_url) ?>" alt="<?= esc_attr($title) ?>" style="max-width: 100%; height: auto;">
                                    <?php $gallery_id = 'gallery_' . get_the_ID(); ?>
                                    <div class="portfolio-item__overlay">
                                        <a href="<?= esc_url($foto_url) ?>" class="fancybox" data-fancybox="<?= esc_attr($gallery_id) ?>" aria-label="Посмотреть подробнее">
                                            <button class="portfolio-item__btn" aria-label="Посмотреть подробнее">
                                                <i class="fas fa-search-plus"></i>
                                            </button>
                                        </a>
                                        <?php if ($video) : ?>
                                            <a target="_blank" href="<?= esc_url($video) ?>" class="" aria-label="Посмотреть видеоролик" style="margin-left: 15px;">
                                                <button class="portfolio-item__btn" aria-label="Посмотреть видеоролик">
                                                    <i class="fab fa-youtube"></i>
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( have_rows('fotos') ): ?>
                                        <!-- Скрытые ссылки на остальные фото -->
                                        <?php while ( have_rows('fotos') ): the_row(); ?>
                                            <a href="<?= esc_url(get_sub_field('foto')) ?>" 
                                            data-fancybox="<?= esc_attr($gallery_id) ?>" 
                                            hidden></a>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <i class="fas fa-home" aria-hidden="true"></i>
                                <?php endif; ?>
                            </div>
                            <h3 class="service-card__title"><?= esc_html($title) ?></h3>
                            <p class="service-card__desc"><?= esc_html($subtitle) ?></p>
                            <!-- WYSIWYG-описание -->
                            <div class="service-card__desc">
                                <?= $desc ?>
                            </div>
                            <div class="service-card__price">
                                от <span><?= esc_html($price) ?> ₽</span>
                            </div>
                            <a href="#contacts" class="btn btn--primary">Заказать</a>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
        <!-- Portfolio Section -->
        <section class="services section" id="portfolio" aria-labelledby="portfolio-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="portfolio-title" class="section__title">Наши работы</h2>
                    <p class="section__subtitle">
                        <?php echo get_field('services'); ?>
                    </p>
                </header>
                <?php
                // Список всех возможных категорий и их лейблы
                $all_filters = [
                    'kladka' => 'Кладка',
                    'pech' => 'Печи',
                    'bbq' => 'Барбекю',
                    'zab' => 'Заборы',
                    'kamin' => 'Камины',
                ];

                // Собираем категории, у которых есть изображения
                $visible_filters = [];

                if (have_rows('works')) :
                while (have_rows('works')) : the_row();
                    $categories = get_sub_field('vid'); // array: [['value' => 'pech', 'label' => 'Печи']]
                    $image = get_sub_field('img');
                    // Проверка: есть ли изображение?
                    $has_image = false;
                    if ($image && is_array($image)) {
                        $has_image = !empty($image['url']);
                    } elseif ($image && is_string($image)) {
                        $has_image = !empty($image);
                    } elseif ($image && is_int($image)) {
                        $has_image = true;
                    }

                    if (!$has_image) {
                        continue;
                    }

                    // Если $categories не массив — превращаем в массив
                    if (!is_array($categories)) {
                        $categories = [$categories];
                    }

                    foreach ($categories as $cat) {
                        // Извлекаем value из массива
                        $cat_value = is_array($cat) ? ($cat['value'] ?? null) : $cat;
                        if ($cat_value && is_scalar($cat_value)) {
                            $visible_filters[$cat_value] = true;
                        }
                    }
                endwhile;
                endif;

                wp_reset_postdata();
                ?>
                <!-- Фильтры -->
                <div class="portfolio__filter">
                    <button class="filter-btn active" data-filter="all">Все</button>
                    <?php foreach ($all_filters as $key => $label): ?>
                        <?php if (isset($visible_filters[$key])): ?>
                        <button class="filter-btn" data-filter="<?= esc_attr($key) ?>">
                            <?= esc_html($label) ?>
                        </button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Сетка проектов -->
                <div class="portfolio__grid">
                    <?php $count = 0;
                    if (have_rows('works')) :
                        while (have_rows('works') && $count < 3) : the_row();
                        //while (have_rows('works')) : the_row();
                            $count++;
                            $categories_list = get_sub_field('vid'); // Может быть массивом!
                            $image = get_sub_field('img');
                            $title = get_sub_field('title');
                            $url = $image['url'] ?? '';
                            $location_year= get_sub_field('location_year');
                            if (empty($url)) continue;
                            // Определяем data-category
                            $data_category = '';
                            if (is_array($categories_list)) {
                                $values = [];
                                foreach ($categories_list as $item) {
                                    if (is_array($item) && isset($item['value'])) {
                                        $values[] = $item['value'];
                                    } elseif (!is_array($item)) {
                                        $values[] = $item;
                                    }
                                }
                                $data_category = implode(' ', $values);
                            } else {
                                $data_category = (string) $categories_list;
                            }
                            ?>
                            <article class="portfolio-item" data-category="<?php echo esc_attr($data_category); ?>">
                                <div class="portfolio-item__image">
                                    <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy" width="600" height="400">
                                    <div class="portfolio-item__overlay">
                                        <a href="<?php echo esc_url($url); ?>" class="fancybox">
                                            <button class="portfolio-item__btn" aria-label="Посмотреть подробнее">
                                                <i class="fas fa-search-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-item__content">
                                    <p><?php echo esc_html($title); ?> <?php echo esc_html($location_year); ?></p>
                                </div>
                            </article>
                        <?php endwhile;
                    endif; ?>
                </div>
                <!-- CTA -->
                <div class="portfolio__cta">
                    <a href="#" class="btn btn--primary btn--large btn-load-more" data-offset="3" data-post-id="<?php echo get_the_ID(); ?>" aria-label="Загрузить больше проектов">Показать еще</a>
                </div>
            </div>
        </section>
        <!-- Reviews Section >
        <section class="reviews section" id="reviews" aria-labelledby="reviews-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="reviews-title" class="section__title">Отзывы клиентов</h2>
                    <p class="section__subtitle">
                        Мы строим для тех, кто ценит качество и надежность. Что говорят о нас наши заказчики
                    </p>
                </header>

                <div class="reviews__slider" role="region" aria-label="Отзывы клиентов">
                    <div class="reviews__track">
                        <article class="review-card glass">
                            <div class="review-card__header">
                                <div class="review-card__avatar">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="review-card__meta">
                                    <h4 class="review-card__name">Александр Петров</h4>
                                    <div class="review-card__rating" aria-label="Рейтинг 5 из 5">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="review-card__text">
                                «Заказывал русскую печь с лежанкой для дачи. Ребята сделали всё на высшем уровне!
                                Печь прогревается равномерно, очень экономичная. Отдельное спасибо за консультацию
                                по выбору материалов. Рекомендую!»
                            </p>
                            <time class="review-card__date" datetime="2025-11">Ноябрь 2025</time>
                        </article>

                        <article class="review-card glass">
                            <div class="review-card__header">
                                <div class="review-card__avatar">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="review-card__meta">
                                    <h4 class="review-card__name">Елена Смирнова</h4>
                                    <div class="review-card__rating" aria-label="Рейтинг 5 из 5">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="review-card__text">
                                «Делали камин в гостиной. Очень довольны результатом! Мастера профессионалы,
                                всё сделали аккуратно и в срок. Камин стал центральным элементом интерьера.
                                Спасибо за качество!»
                            </p>
                            <time class="review-card__date" datetime="2025-10">Октябрь 2025</time>
                        </article>

                        <article class="review-card glass">
                            <div class="review-card__header">
                                <div class="review-card__avatar">
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="review-card__meta">
                                    <h4 class="review-card__name">Михаил Иванов</h4>
                                    <div class="review-card__rating" aria-label="Рейтинг 5 из 5">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="review-card__text">
                                «Построили отличный барбекю комплекс на участке. Теперь все соседи завидуют!
                                Печь для пиццы — просто огонь (в прямом смысле). Цены адекватные, качество
                                на высоте. Буду рекомендовать друзьям.»
                            </p>
                            <time class="review-card__date" datetime="2025-09">Сентябрь 2025</time>
                        </article>
                    </div>
                    <div class="reviews__controls">
                        <button class="reviews__btn reviews__btn--prev" aria-label="Предыдущий отзыв">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="reviews__btn reviews__btn--next" aria-label="Следующий отзыв">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section-->
        <!-- CTA Section >
        <section class="cta section" aria-labelledby="cta-title">
            <div class="container">
                <div class="cta__box glass">
                    <h2 id="cta-title" class="cta__title">Доверьте нам свою мечту!</h2>
                    <p class="cta__text">
                        Получите бесплатную консультацию и расчёт стоимости проекта прямо сейчас
                    </p>
                    <div class="cta__actions">
                        <a href="tel:+79600352588" class="btn btn--primary btn--large">
                            <i class="fas fa-phone"></i>
                            Позвонить сейчас
                        </a>
                        <a href="#contacts" class="btn btn--outline btn--large">
                            Оставить заявку
                        </a>
                    </div>
                </div>
            </div>
        </section-->
        <!-- Price Section>
        <section class="services section" id="price" aria-labelledby="price-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title">Стоимость</h2>
                    <p class="section__subtitle">
                        Мы предлагаем услуги высокого качества по разумным и обоснованным ценам.
                    </p>
                </header>

                <div class="services__grid">
                    <article class="service-card glass" data-service="service1">
                        <div class="service-card__icon service-card__icon--green">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Черновая кладка</h3>
                        <a href="#" id="price" class="btn btn--primary">Посмотреть</a>
                    </article>

                    <article class="service-card glass service-card--featured" data-service="service2">
                        <div class="service-card__badge">Популярное</div>
                        <div class="service-card__icon service-card__icon--red">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Облицовочная кладка</h3>

                        <a href="#" id="price" class="btn btn--primary">Посмотреть</a>
                    </article>

                    <article class="service-card glass" data-service="service3">
                        <div class="service-card__icon service-card__icon--beige">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Блоки</h3>
                        <a href="#" id="price" class="btn btn--primary">Посмотреть</a>
                    </article>

                </div>
            </div>
        </section-->
        <!--section>
            <div id="price-block" class="price-block glass" style="display: none; margin-top: 2rem;">
                 <div class="container">
                    <ul id="price-list" class="price-list"></ul>
                    <p class="text-muted" style="margin-top: 1rem; opacity: 0.8;">
                        * Прайс составлен по проведённым опросам из сообщества каменщиков!<br>
                        Все приведённые цены являются ориентировочными и могут колебаться в зависимости от многих составляющих,начиная с опыта каменщика до пожелания заказчика.<br>
                        Но являются рекомендованными!
                    </p>
                 </div>
            </div>
        </section-->

        <!-- Contacts Section -->
        <section class="contacts section" id="contacts" aria-labelledby="contacts-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="contacts-title" class="section__title">Контакты</h2>
                    <p class="section__subtitle">
                        Свяжитесь с нами удобным для вас способом
                    </p>
                </header>

                <div class="contacts__grid">
                    <div class="contacts__info">
                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Телефон</h3>
                                <a href="tel:<?php echo get_field('tel_link'); ?>"><?php echo get_field('tel'); ?></a>
                                <p><?php echo get_field('tel_time'); ?></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Email</h3>
                                <a target="_blank" href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
                            </div>
                        </div>

<div class="contact-item">
    <div class="contact-item__icon">
        <i class="fas fa-link" aria-hidden="true"></i>
    </div>
    <div class="contact-item__content">
        <h3>Ссылки на соцсети: </h3>
       <?php if (have_rows('socset')) : ?>
            <?php while (have_rows('socset')) : the_row();
                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
                ?>
                <?php if ($icon === 'site'): ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($link); ?>">
                        <i class="fas fa-2x fa-tag" aria-hidden="true"></i>
                    </a>
                <?php elseif ($icon === 'instagram'): ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($link); ?>">
                        <i class="fab fa-2x fa-instagram" aria-hidden="true"></i>
                    </a>
                <?php elseif ($icon === 'telegram'): ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($link); ?>">
                        <i class="fab fa-2x fa-telegram" aria-hidden="true"></i>
                    </a>
                <?php elseif ($icon === 'whatsapp'): ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($link); ?>">
                        <i class="fab fa-2x fa-whatsapp" aria-hidden="true"></i>
                    </a>
                <?php elseif ($icon === 'vk'): ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($link); ?>">
                        <i class="fab fa-2x vk" aria-hidden="true"></i>
                    </a>
                <?php else: ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($link); ?>">
                        <i class="fas fa-2x fa-tag" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Адрес</h3>
                                <p><?php echo get_field('addr'); ?></p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Режим работы</h3>
                                <p><?php echo get_field('time'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="contacts__form-wrapper">
                        <?php echo do_shortcode('[contact-form-7 id="d57e7b1" title="Контактная форма"]'); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
$prices = [
    'service1' => get_field('price_1') ?: '',
    'service2' => get_field('price_2') ?: '',
    'service3' => get_field('price_3') ?: '',
];
// Выводим данные в JS
echo '<script>window.pricesData = ' . json_encode($prices, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ';</script>';
?>
<!--script>
document.addEventListener('DOMContentLoaded', function() {
    // Используем данные из глобальной переменной
    const pricesData = window.pricesData || {
        service1: [],
        service2: [],
        service3: []
    };

    // Проверка существования элементов
    const priceSection = document.getElementById('price');
    const priceBlock = document.getElementById('price-block');
    const priceList = document.getElementById('price-list');
    const buttons = document.querySelectorAll('#price .btn');

    //console.log('priceSection:', priceSection);
    //console.log('priceBlock:', priceBlock);
    //console.log('priceList:', priceList);
    //console.log('buttons:', buttons.length);

    if (!priceSection || !priceBlock || !priceList || buttons.length === 0) {
        console.error('❌ Критическая ошибка: отсутствуют обязательные элементы');
        return;
    }

    // Обработчики кликов
    buttons.forEach((button, index) => {
        //console.log(`[Button ${index}] attaching listener`);
        button.addEventListener('click', function(e) {
            console.log('✅ Клик по кнопке!');
            e.preventDefault();

            // Находим ближайшую карточку услуги
            const serviceCard = this.closest('.service-card');
            //console.log('serviceCard:', serviceCard);
            if (!serviceCard) {
                console.error('❌ serviceCard не найден');
                return;
            }

            // Внутри кнопки:
            const serviceName = serviceCard.getAttribute('data-service');

            // Очищаем и заполняем список
            priceList.innerHTML = '';
            if (pricesData[serviceName]) {
                const li = document.createElement('li');
                // Вставляем HTML как HTML, а не как текст!
                li.innerHTML = pricesData[serviceName]; // ← вот так!
                priceList.appendChild(li);
            } else {
                priceList.innerHTML = '<li>Данные по данной услуге уточняются.</li>';
            }

            // Показываем блок
            priceBlock.style.display = 'block';
            console.log('✅ Блок с ценами показан (style.display = block)');
        });
    });

    // Скрытие при клике вне блока — ИСПРАВЛЕННЫЙ ВАРИАНТ
    document.addEventListener('click', function(e) {
        //console.log('Global click', e.target);
        const priceSection = document.getElementById('price');
        const priceBlock = document.getElementById('price-block');
        
        if (priceBlock && priceBlock.style.display === 'block') {
            // Если клик был на кнопке в #price, НЕ скрываем!
            const isClickOnPriceSection = priceSection && priceSection.contains(e.target);
            // Если клик был ВНУТРИ блока цен — не скрываем
            const isClickInsidePriceBlock = priceBlock.contains(e.target);
    
            if (!isClickOnPriceSection && !isClickInsidePriceBlock) {
                //console.log('Click outside → hiding');
                priceBlock.style.display = 'none';
            } else {
                //console.log('Click inside #price or #price-block → NOT hiding');
            }
        }
    });
});
</script-->
<?php get_footer(); ?>