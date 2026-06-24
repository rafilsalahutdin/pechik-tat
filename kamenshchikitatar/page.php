<?php
/**
 * Template Name: Главная страница
 */
get_header(); ?>
    <main id="main-content">
        <!-- Services Section -->
        <section class="services section" id="services" aria-labelledby="services-title">
            <div class="container">
                <header class="section__header">
                    <h2 id="services-title" class="section__title"><?php the_title(); ?></h2>
                </header>
                <!-- Content of the page -->

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <div class="container">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; endif; ?>
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
<script>
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
</script>
<?php get_footer(); ?>