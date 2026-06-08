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
        <section class="services section" id="services" aria-labelledby="services-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title">Наши услуги</h2>
                    <p class="section__subtitle">
                        Реализуем проекты любой сложности с использованием различных видов кирпича: керамического, клинкерного, кирпича ручной формовки, ригельного и евроформата. Предоставляем услуги по замеру, расчету материалов, разработке проектов и 3D-визуализации. Гарантируем высокое качество кладочных работ и подберем специалиста в соответствии с вашими требованиями.
                    </p>
                </header>

                <div class="services__grid">
                    <!-- Service 1 -->
                    <article class="service-card glass service-card--featured">
                        <div class="service-card__icon service-card__icon--red">
                            <i class="fas fa-home" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Строительство домов из кирпича</h3>
                        <p class="service-card__desc">
                            Капитальные дома для постоянного проживания.
                        </p>
                        <ul class="service-card__features">
                            <li><i class="fas fa-check"></i> Осуществим Ваши фантазии из любого вида кирпича</li>
                            <li><i class="fas fa-check"></i> Керамика, клинкер, ручная формовка, ригельный, евро формат</li>
                            <li><i class="fas fa-check"></i> Высокое качество кладки</li>
                        </ul>
                        <div class="service-card__price">
                            от <span>1200 000 ₽</span>
                        </div>
                        <a href="#contacts" class="btn btn--primary">Заказать</a>
                    </article>
                    <!-- Service 2 -->
                    <article class="service-card glass">
                        <div class="service-card__icon service-card__icon--beige">
                            <i class="fa-solid fa-xmarks-lines" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Беседки. Столбы. Заборы.</h3>
                        <p class="service-card__desc">
                            Надёжные конструкции для участка, от эконом до премиум класса
                        </p>
                        <ul class="service-card__features">
                            <li><i class="fas fa-check"></i> Замер, расчёт материала</li>
                            <li><i class="fas fa-check"></i> Проект с учётом ландшафта и ваших пожеланий</li>
                            <li><i class="fas fa-check"></i> 3D визуализация + согласование до начала работ</li>
                        </ul>
                        <div class="service-card__price">
                            от <span>80 000 ₽</span>
                        </div>
                        <a href="#contacts" class="btn btn--primary">Заказать</a>
                    </article>
                    <!-- Service 3 -->
                    <article class="service-card glass">
                        <div class="service-card__icon service-card__icon--green">
                            <i class="fa-solid fa-shop" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Бани</h3>
                        <p class="service-card__desc">
                            Русские печи, отопительно-варочные, голландки, шведки.
                        </p>
                        <ul class="service-card__features">
                            <li><i class="fas fa-check"></i> Эффективное отопление и приготовление пищи.</li>
                            <li><i class="fas fa-check"></i> Высокий КПД</li>
                            <li><i class="fas fa-check"></i> Монтаж металических банных печей</li>
                            <li><i class="fas fa-check"></i> Оформление банных порталов</li>
                            <li><i class="fas fa-check"></i> Фигурная, точённая кладка</li>
                        </ul>
                        <div class="service-card__price">
                            от <span>80 000 ₽</span>
                        </div>
                        <a href="#contacts" class="btn btn--primary">Заказать</a>
                    </article>

                    <!-- Service 4 -->
                    <article class="service-card glass service-card--featured">
                        <div class="service-card__badge">Популярное</div>
                        <div class="service-card__icon service-card__icon--red">
                            <i class="fas fa-fire" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Камины</h3>
                        <p class="service-card__desc">
                            Дровяные, газовые, электрокамины. Классические и современные
                            дизайны для вашего интерьера.
                        </p>
                        <ul class="service-card__features">
                            <li><i class="fas fa-check"></i> Индивидуальный дизайн</li>
                            <li><i class="fas fa-check"></i> Безопасная эксплуатация</li>
                            <li><i class="fas fa-check"></i> Высокий КПД</li>
                        </ul>
                        <div class="service-card__price">
                            от <span>120 000 ₽</span>
                        </div>
                        <a href="#contacts" class="btn btn--primary">Заказать</a>
                    </article>

                    <!-- Service 5 -->
                    <article class="service-card glass">
                        <div class="service-card__icon service-card__icon--beige">
                            <i class="fas fa-utensils" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Барбекю комплексы под ключ</h3>
                        <p class="service-card__desc">
                            Уличные комплексы: барбекю, мангалы, коптильни. Идеально для дачи и загородного дома.
                        </p>
                        <ul class="service-card__features">
                            <li><i class="fas fa-check"></i> Погодоустойчивые материалы</li>
                            <li><i class="fas fa-check"></i> Многофункциональность</li>
                            <li><i class="fas fa-check"></i> Эргономичный дизайн</li>
                        </ul>
                        <div class="service-card__price">
                            от <span>150 000 ₽</span>
                        </div>
                        <a href="#contacts" class="btn btn--primary">Заказать</a>
                    </article>
                    <!-- Service 6 -->
                    <article class="service-card glass">
                        <div class="service-card__icon service-card__icon--green">
                            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Подбор специалиста</h3>
                        <p class="service-card__desc">
                            Предоставим специалиста под Ваш запрос.
                        </p>
                        <ul class="service-card__features">
                            <li><i class="fas fa-check"></i> Индивидуальный подбор под задачу</li>
                            <li><i class="fas fa-check"></i> Проверка квалификации и портфолио</li>
                            <li><i class="fas fa-check"></i> Сопровождение до сдачи объекта</li>
                        </ul>
                        <div class="service-card__price">
                            от <span>150 000 ₽</span>
                        </div>
                        <a href="#contacts" class="btn btn--primary">Заказать</a>
                    </article>
                </div>
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

                <!-- Фильтры -->
                <div class="portfolio__filter">
                    <button class="filter-btn active" data-filter="all">Все</button>
                    <button class="filter-btn" data-filter="kladka">Кладка</button>
                    <button class="filter-btn" data-filter="bbq">Барбекю</button>
                    <button class="filter-btn" data-filter="zab">Заборы</button>
                    <button class="filter-btn" data-filter="kamin">Камины</button>
                </div>
                <!--div class="portfolio__filter">
                    <button class="filter-btn active" data-filter="all">Все</button>

                    <?php
                    $choices = [];
                    $categories = [];

                    // Получаем ACF объект поля 'works'
                    $works_field = get_field_object('works');

                    if ($works_field && is_array($works_field) && !empty($works_field['sub_fields'])) {
                        foreach ($works_field['sub_fields'] as $sub_field) {
                            if (
                                is_array($sub_field) &&
                                isset($sub_field['name']) && 
                                $sub_field['name'] === 'vid' && 
                                in_array($sub_field['type'], ['select', 'checkbox']) && 
                                !empty($sub_field['choices']) && 
                                is_array($sub_field['choices'])
                            ) {
                                $choices = $sub_field['choices'];
                                break;
                            }
                        }
                    }

                    // Собираем уникальные категории
                    if (have_rows('works')) {
                        while (have_rows('works')) {
                            the_row();
                            $category = get_sub_field('vid');
                            if (!$category) continue;

                            if (is_array($category)) {
                                foreach ($category as $c) {
                                    if ($c && !in_array($c, $categories)) {
                                        $categories[] = $c;
                                    }
                                }
                            } else {
                                if (!in_array($category, $categories)) {
                                    $categories[] = $category;
                                }
                            }
                        }
                        rewind_posts();
                        the_post();
                    }
                    // Выводим кнопки фильтров
                foreach ($categories as $item) {
                    // Убедимся, что это массив с ключом 'value'
                    if (is_array($item) && isset($item['value'])) {
                        $cat = $item['value'];  // например: 'kamin'
                        $label = isset($item['label']) ? $item['label'] : ucfirst($cat);

                        echo '<button class="filter-btn" data-filter="' . esc_attr($cat) . '">' . esc_html($label) . '</button>';
                    }
                }
                    ?>
                </div-->

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
                                    <p><?php echo esc_html($title); ?>, <?php echo esc_html($location_year); ?></p>
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
        <!-- Reviews Section -->
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
                    <article class="service-card glass">
                        <div class="service-card__icon service-card__icon--green">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Черновая кладка</h3>
                        <a href="#contacts" class="btn btn--primary">Посмотреть</a>
                    </article>

                    <!-- Service 2 -->
                    <article class="service-card glass service-card--featured">
                        <div class="service-card__badge">Популярное</div>
                        <div class="service-card__icon service-card__icon--red">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Облицовочная кладка</h3>

                        <a href="#contacts" class="btn btn--primary">Посмотреть</a>
                    </article>

                    <!-- Service 3 -->
                    <article class="service-card glass">
                        <div class="service-card__icon service-card__icon--beige">
                            <i class="fa-solid fa-trowel-bricks" aria-hidden="true"></i>
                        </div>
                        <h3 class="service-card__title">Блоки</h3>
                        <a href="#contacts" class="btn btn--primary">Посмотреть</a>
                    </article>
                </div>
            </div>
        </section>

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
                                <a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
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
<?php get_footer(); ?>