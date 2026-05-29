
    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__brand">
                    <a href="#" class="logo" aria-label="Каменщики Татарстана - на главную">
                        <img src="/wp-content/themes/kamenshchikitatar/images/logo.png" alt="Каменщики Татарстана" loading="eager" width="190" height="60">
                    </a>
                    <p class="footer__desc">
                        Cообщество лучших мастеров-каменщиков и печников Татарстана
                    </p>
                    <div class="footer__social">
                        <a href="https://wa.me/c/79600352588" target="_blank" class="social-link" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" target="_blank" class="social-link" aria-label="Telegram">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                        <a href="#" target="_blank" class="social-link" aria-label="ВКонтакте">
                            <i class="fab fa-vk"></i>
                        </a>
                        <a href="#" target="_blank" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div class="footer__nav">
                    <h4 class="footer__title">Услуги</h4>
                    <ul class="footer__list">
                        <li><a href="#services">Печи</a></li>
                        <li><a href="#services">Камины</a></li>
                        <li><a href="#services">Барбекю</a></li>
                        <li><a href="#portfolio">Портфолио</a></li>
                    </ul>
                </div>

                <div class="footer__nav">
                    <h4 class="footer__title">Информация</h4>
                    <ul class="footer__list">
                        <li><a href="#advantages">Преимущества</a></li>
                        <li><a href="#reviews">Отзывы</a></li>
                        <li><a href="#">Цены</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </div>

                <div class="footer__contacts">
                    <h4 class="footer__title">Контакты</h4>
                    <ul class="footer__list footer__list--contacts">
                        <li>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+79600352588">+7 (960) 035-25-88</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@kamenshchikitatar.com">info@kamenshchikitatar.com</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>г. Казань, ул. Примерная, д. 123</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__bottom">
                <p>&copy; 2011-2026 Каменщики Татарстана. Все права защищены.</p>
                <div class="footer__legal">
                    <a href="#">Политика конфиденциальности</a>
                    <a href="#">Договор оферты</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal" id="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1"></div>
        <div class="modal__content">
            <button class="modal__close" aria-label="Закрыть модальное окно">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal__body" id="modalBody">
                <!-- Content will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <?php wp_footer(); ?>
    <!--script src="/wp-content/themes/kamenshchikitatar/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/kamenshchikitatar/css/slick.css" />
    <link rel="stylesheet" href="/wp-content/themes/kamenshchikitatar/css/slick-theme.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script src="/wp-content/themes/kamenshchikitatar/js/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".portfolio__grid").slick({
                infinite: true,
                speed: 300,
                fade: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                swipe: true,
                draggable: true,
                arrows: true,
                dots: false,
                adaptiveHeight: true,
            });
        });
    </script-->
<!--script>
document.addEventListener('DOMContentLoaded', function () {
    const link = document.querySelector('.btn-load-more');
    if (!link) return;

    link.addEventListener('click', function (e) {
        e.preventDefault(); // Предотвращаем переход по ссылке

        const offset = parseInt(link.getAttribute('data-offset'), 10);
        const filter = document.querySelector('.portfolio__filter .active')?.dataset?.filter || 'all';

        // Меняем текст на "Загрузка..."
        const originalText = link.textContent;
        link.textContent = 'Загрузка...';
        link.disabled = true; // Условная блокировка

        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=load_more_portfolio&offset=${offset}&filter=${filter}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.html) {
                const grid = document.querySelector('.portfolio__grid');
                const fragment = document.createRange().createContextualFragment(data.data.html);
                grid.appendChild(fragment);

                // Обновляем счётчик
                const newOffset = offset + data.data.loaded;
                link.setAttribute('data-offset', newOffset);

                // Если больше нет — скрываем ссылку
                if (!data.data.has_more) {
                    link.style.display = 'none';
                } else {
                    link.textContent = originalText; // Восстанавливаем текст
                }
            } else {
                link.textContent = 'Ошибка загрузки';
                console.error('Ошибка:', data);
            }
        })
        .catch(err => {
            link.textContent = 'Повторить';
            console.error('AJAX ошибка:', err);
        })
        .finally(() => {
            link.disabled = false;
        });
    });
});
</script-->
</body>

</html>