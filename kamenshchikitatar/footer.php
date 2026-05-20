
    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__brand">
                    <a href="#" class="logo" aria-label="Каменщики Татарстана - на главную">
                        <img src="images/logo.png" alt="Каменщики Татарстана" loading="eager" width="190" height="60">
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
    <script src="scripts.js"></script>
    <?php wp_footer(); ?>
</body>

</html>