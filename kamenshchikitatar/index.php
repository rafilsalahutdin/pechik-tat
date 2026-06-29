<?php
/**
 * Template Name: Главная страница
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
                        Строим для тех,<br>
                        <span class="hero__highlight">кто ценит качество!</span>
                    </h1>
                    <p class="hero__subtitle">
                        Мы — сообщество лучших мастеров-каменщиков и печников Татарстана.
                    </p>
                    <p class="hero__subtitle">
                        Работаем на строительном рынке много лет и знаем все нюансы своего дела.
                    </p>
                    <p class="hero__subtitle">
                        Предлагаем услуги высокого качества по разумным и обоснованным ценам.
                    </p>
                    <p class="hero__subtitle">
                        Наш практический опыт — гарантия надежности и долговечности.
                    </p>
                    <div class="hero__stats">
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
                    </div>
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
                        <img src="/wp-content/themes/kamenshchikitatar/images/IMG.jpeg" alt="Кирпичный камин" loading="eager" width="600" height="400">
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
        <section class="services section" id="services" aria-labelledby="services-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title">Наши услуги</h2>
                    <p class="section__subtitle">
                        Реализуем проекты любой сложности с использованием различных видов кирпича: керамического, клинкерного, кирпича ручной формовки, ригельного и евроформата. Предоставляем услуги по замеру, расчету материалов, разработке проектов и 3D-визуализации. Гарантируем высокое качество кладочных работ и подберем специалиста в соответствии с вашими требованиями.
                    </p>
                </header>
                    <?php if (have_rows('srv')) : ?>
                        <div class="services__grid">
                            <?php
                            $i = 0;
                            while (have_rows('srv')) : the_row();
                                $i++;
                                $title    = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                $desc     = get_sub_field('desc'); // WYSIWYG
                                $price    = get_sub_field('price');
                                $icon     = get_sub_field('icon'); // текстовое поле: "fa-home", "fa-fire" и т.д.

                                // Цвета по порядку (red → beige → green)
                                $colors = ['service-card__icon--red', 'service-card__icon--beige', 'service-card__icon--green'];
                                $color_class = $colors[($i - 1) % 3];

                                // 4-й элемент = "Популярное"
                                $featured_class = ($i === 4) ? 'service-card--featured' : '';
                                $badge = ($i === 4) ? '<div class="service-card__badge">Популярное</div>' : '';
                            ?>
                                <article class="service-card glass <?= $featured_class ?>">
                                    <?= $badge ?>
                                    <div class="service-card__icon <?= $color_class ?>">
                                        <?php if ($icon) : ?>
                                            <i class="fas <?= esc_attr($icon) ?>" aria-hidden="true"></i>
                                        <?php else : ?>
                                            <!-- Фолбэк, если icon пустой -->
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
                    <?php endif; ?>
            </div>
        </section>
        <!-- Add Section -->
        <section class="services section" id="masters" aria-labelledby="services-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title">Наши мастера</h2>
                    <!--p class="section__subtitle">
                        ...
                    </p-->
                </header>
                <div class="services__grid">
                    <?php
                    $query = new WP_Query([
                        'post_type'      => 'page',
                        'meta_key'       => '_wp_page_template',
                        'meta_value'     => 'template-ad.php',
                        'posts_per_page' => -1,
                    ]);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            // Получаем ACF-поля
                            $logo     = get_field('logo');
                            $title    = get_field('title');
                            $title_text = get_field('title_text');
                            $icon_class = 'fa-home'; // по умолчанию
                            $icon_color = 'service-card__icon--red';

                            // Пример логики выбора иконки и цвета (можно адаптировать под ваши данные)
                            $hash = abs(crc32(get_the_ID()));
                            $icon_classes = [
                                'fa-home', 'fa-xmarks-lines', 'fa-shop', 'fa-warehouse', 'fa-building'
                            ];
                            $icon_class = $icon_classes[$hash % count($icon_classes)];
                            $logo_img = '';
                            if ($logo && is_string($logo)) {
                                // logo — это URL
                                $logo_img = '<img style="max-width: 200px;" src="' . esc_url($logo) . '" alt="' . esc_attr($title ?: 'Логотип участника') . '">';
                            } elseif ($logo && is_array($logo)) {
                                // на случай, если вдруг вернёт массив (например, при смене настройки ACF)
                                $url = $logo['url'] ?? '';
                                $alt = $logo['alt'] ?? '';
                                $logo_img = $url ? '<img style="max-width: 200px;" src="' . esc_url($url) . '" alt="' . esc_attr($alt ?: $title) . '">' : '';
                            }

                            if (!$logo_img) {
                                // если нет логотипа — используем иконку FontAwesome
                                $logo_img = '<i class="fas ' . $icon_class . '" aria-hidden="true"></i>';
                            }
                    ?>
                            <article class="service-card glass">
                                <div class="service-card__icon">
                                    <a href="<?php the_permalink(); ?>"><?= $logo_img ?></a>
                                </div>
                                <h3 class="service-card__title"><a href="<?php the_permalink(); ?>"><?= esc_html($title ?: get_the_title()) ?></a></h3>
                                <p class="service-card__desc">
                                    <?= esc_html($title_text ?: get_the_excerpt()) ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn btn--primary">Подробнее</a>
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <p><?= esc_html__('На данный момент участники отсутствуют.', 'textdomain') ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container" style="text-align: center;margin-top: var(--space-xl);">
                <a target="_blank" href="https://forms.yandex.ru/u/6a4203ca02848ff8b3c717ab" class="btn btn--primary">Присоединитесь к нам</a>
            </div>
        </section>
        <!-- Advantages Section -->
        <section class="advantages section" id="advantages" aria-labelledby="advantages-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="advantages-title" class="section__title">Почему выбирают нас</h2>
                    <p class="section__subtitle">
                        Мы постоянно изучаем новые технологии и материалы, чтобы предлагать вам самые эффективные и красивые решения.
                    </p>
                </header>

                <div class="advantages__grid">
                    <div class="advantage-card">
                        <div class="advantage-card__number">01</div>
                        <div class="advantage-card__icon">
                            <i class="fas fa-certificate" aria-hidden="true"></i>
                        </div>
                        <h3 class="advantage-card__title">Гарантия 5 лет</h3>
                        <p>Полная гарантия на все виды работ и материалы. Бесплатное сервисное обслуживание.</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__number">02</div>
                        <div class="advantage-card__icon">
                            <i class="fas fa-users" aria-hidden="true"></i>
                        </div>
                        <h3 class="advantage-card__title">Опытные мастера</h3>
                        <p>Специалисты со стажем от 10 лет. Постоянное повышение квалификации.</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__number">03</div>
                        <div class="advantage-card__icon">
                            <i class="fas fa-ruler-combined" aria-hidden="true"></i>
                        </div>
                        <h3 class="advantage-card__title">Точный расчёт</h3>
                        <p>Выезд на объект, замер и составление сметы. Фиксированная цена.</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__number">04</div>
                        <div class="advantage-card__icon">
                            <i class="fas fa-clock" aria-hidden="true"></i>
                        </div>
                        <h3 class="advantage-card__title">Соблюдение сроков</h3>
                        <p>Чёткое соблюдение договорённостей и сроков</p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__number">05</div>
                        <div class="advantage-card__icon">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        </div>
                        <h3 class="advantage-card__title">Безопасность</h3>
                        <p>Строгое соблюдение СНиП и правил пожарной безопасности. </p>
                    </div>

                    <div class="advantage-card">
                        <div class="advantage-card__number">06</div>
                        <div class="advantage-card__icon">
                            <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                        </div>
                        <h3 class="advantage-card__title">Честные цены</h3>
                        <p>Прозрачное ценообразование без скрытых платежей.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section class="portfolio section" id="portfolio" aria-labelledby="portfolio-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="portfolio-title" class="section__title">Наши работы</h2>
                    <p class="section__subtitle">
                        Мы не просто строим, мы воплощаем ваши идеи. К каждой задаче, даже самой сложной, подходим творчески, чтобы результат превзошёл ожидания. Реализованные проекты в Казани и Республике Татарстане.
                    </p>
                </header>
                <?php
                // Список всех возможных категорий и их лейблы
                $all_filters = [
                    'bbq' => 'Барбекю',
                    'besedka' => 'Беседки',
                    'doma' => 'Строительство домов',
                    'f_kladka' => 'Фигурная кладка',
                    'garazh' => 'Гаражи',
                    'kladka' => 'Черновая кладка',
                    'kamin' => 'Камины',
                    'o_kladka' => 'Облицовочная кладка',
                    'pech' => 'Печи',
                    'stolb' => 'Столбы',
                    'zab' => 'Заборы',
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
        <!-- CTA Section -->
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
        </section>
        <!-- Price Section -->
        <section class="services section" id="price" aria-labelledby="price-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title">Стоимость</h2>
                    <p class="section__subtitle">
                        Мы предлагаем услуги высокого качества по разумным и обоснованным ценам.
                    </p>
                </header>

                <div class="services__grid">
                    <!-- Service 1 -->
                    <article class="service-card glass" data-service="service1">
                        <div class="service-card__icon service-card__icon--green">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Черновая кладка</h3>
                        <a href="<?php echo get_field('price_1');?>" id="price" class="fancybox btn btn--primary">Посмотреть</a>
                    </article>

                    <!-- Service 2 -->
                    <article class="service-card glass service-card--featured" data-service="service2">
                        <div class="service-card__badge">Популярное</div>
                        <div class="service-card__icon service-card__icon--red">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Облицовочная кладка</h3>

                        <a href="<?php echo get_field('price_2');?>" id="price" class="fancybox btn btn--primary">Посмотреть</a>
                    </article>

                    <!-- Service 3 -->
                    <article class="service-card glass" data-service="service3">
                        <div class="service-card__icon service-card__icon--beige">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Блоки</h3>
                        <a href="<?php echo get_field('price_3');?>" id="price" class="fancybox btn btn--primary">Посмотреть</a>
                    </article>

                </div>
            </div>
        </section>

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
                                <a href="tel:+79600352588">+7 (960) 035-25-88</a>
                                <p>Ежедневно с 9:00 до 20:00</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Email</h3>
                                <a href="mailto:info@kamenshchikitatar.com">info@kamenshchikitatar.com</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Адрес</h3>
                                <p>г. Казань</p>
                                <p>Работаем по всему Татарстану</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-item__icon">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                            </div>
                            <div class="contact-item__content">
                                <h3>Режим работы</h3>
                                <p>Пн-Пт: 9:00 - 18:00</p>
                                <p>Сб-Вс: по договорённости</p>
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
<?php get_footer(); ?>