/**
 * Каменщики Татарстана - Main JavaScript (jQuery)
 * Compatible with jQuery 3.x+
 */

// Global variables
var $header = $('#header');
var $burger = $('#burger');
var $nav = $('#nav');
var $modal = $('#modal');
var $modalBody = $('#modalBody');
var $contactForm = $('#contactForm');

// State
var isMenuOpen = false;
var currentReviewIndex = 0;

// ============================================
// Initialization
// ============================================
$(document).ready(function() {
    initHeader();
    initMobileMenu();
    initSmoothScroll();
    initPortfolioFilter();
    initReviewsSlider();
    initContactForm();
    initModal();
    initScrollAnimations();
    initLazyLoading();
    initPhoneMask();
});

// ============================================
// Header Scroll Effect
// ============================================
function initHeader() {
    var lastScroll = 0;
    
    $(window).on('scroll', function() {
        var currentScroll = $(this).scrollTop();
        
        if (currentScroll > 100) {
            $header.addClass('header--scrolled');
        } else {
            $header.removeClass('header--scrolled');
        }
        
        lastScroll = currentScroll;
    });
}

// ============================================
// Mobile Menu
// ============================================
function initMobileMenu()
{
    if (!$burger.length || !$nav.length) return;
    
    $burger.on('click', toggleMenu);
    
    // Close menu on link click
    $nav.find('.nav__link').on('click', function() {
        if (isMenuOpen) {
            toggleMenu();
        }
    });
    
    // Close menu on escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            toggleMenu();
            $burger.focus();
        }
    });
    
    // Close menu on outside click
    $(document).on('click', function(e) {
        if (isMenuOpen && !$(e.target).closest($nav).length && !$(e.target).closest($burger).length) {
            toggleMenu();
        }
    });
}

function toggleMenu() {
    isMenuOpen = !isMenuOpen;
    $burger.attr('aria-expanded', isMenuOpen);
    $nav.toggleClass('active', isMenuOpen);
    
    if (isMenuOpen) {
        $('body').css('overflow', 'hidden');
    } else {
        $('body').css('overflow', '');
    }
}

// ============================================
// Smooth Scroll
// ============================================
function initSmoothScroll() {
    $('a[href^="#"]').on('click', function(e) {
        var href = $(this).attr('href');
        if (href === '#') return;
        
        var $target = $(href);
        if ($target.length) {
            e.preventDefault();
            var headerHeight = $header.outerHeight();
            var targetPosition = $target.offset().top - headerHeight;
            
            $('html, body').animate({
                scrollTop: targetPosition
            }, 800, 'swing');
            
            // Update URL without page jump
            history.pushState(null, '', href);
        }
    });
}

// ============================================
// Portfolio Filter
// ============================================
function initPortfolioFilter() {
    var $filterBtns = $('.filter-btn');
    var $portfolioItems = $('.portfolio-item');
    
    $filterBtns.on('click', function() {
        // Update active button
        $filterBtns.removeClass('active');
        $(this).addClass('active');
        
        var filter = $(this).data('filter');
        
        // Filter items with animation
        $portfolioItems.each(function() {
            var $item = $(this);
            var category = $item.data('category');
            
            if (filter === 'all' || category === filter) {
                $item.show();
                setTimeout(function() {
                    $item.css({
                        'opacity': '1',
                        'transform': 'scale(1)'
                    });
                }, 10);
            } else {
                $item.css({
                    'opacity': '0',
                    'transform': 'scale(0.8)'
                });
                setTimeout(function() {
                    $item.hide();
                }, 300);
            }
        });
    });
}

// ============================================
// Reviews Slider
// ============================================
function initReviewsSlider() {
    var $track = $('.reviews__track');
    var $prevBtn = $('.reviews__btn--prev');
    var $nextBtn = $('.reviews__btn--next');
    var $reviews = $('.review-card');
    
    if (!$track.length || $reviews.length === 0) return;
    
    function updateSlider() {
        var cardWidth = $reviews.first().outerWidth() + 32; // including gap
        var offset = -currentReviewIndex * cardWidth;
        $track.css('transform', 'translateX(' + offset + 'px)');
    }
    
    $prevBtn.on('click', function() {
        currentReviewIndex = Math.max(0, currentReviewIndex - 1);
        updateSlider();
    });
    
    $nextBtn.on('click', function() {
        var maxIndex = $reviews.length - getVisibleCards();
        currentReviewIndex = Math.min(maxIndex, currentReviewIndex + 1);
        updateSlider();
    });
    
    function getVisibleCards() {
        if ($(window).width() <= 768) return 1;
        if ($(window).width() <= 1024) return 2;
        return 3;
    }
    
    // Update on resize
    var resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            currentReviewIndex = 0;
            updateSlider();
        }, 250);
    });
}

// ============================================
// Contact Form
// ============================================
function initContactForm() {
    if (!$contactForm.length) return;
    
    $contactForm.on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var data = {};
        formData.forEach(function(value, key) {
            data[key] = value;
        });
        
        // Validation
        var errors = validateForm(data);
        
        if (Object.keys(errors).length === 0) {
            // Show loading state
            var $submitBtn = $contactForm.find('button[type="submit"]');
            var originalText = $submitBtn.html();
            $submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Отправка...');
            $submitBtn.prop('disabled', true);
            
            // Simulate API call
            $.when(simulateApiCall()).done(function() {
                // Show success message
                showNotification('Спасибо! Ваша заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.', 'success');
                $contactForm[0].reset();
            }).fail(function() {
                showNotification('Произошла ошибка при отправке. Пожалуйста, попробуйте позже.', 'error');
            }).always(function() {
                $submitBtn.html(originalText);
                $submitBtn.prop('disabled', false);
            });
        } else {
            // Show errors
            displayErrors(errors);
        }
    });
    
    // Real-time validation
    $contactForm.find('.form-input').on('blur', function() {
        validateField($(this));
    }).on('input', function() {
        var $input = $(this);
        var $errorElement = $('#' + $input.attr('name') + 'Error');
        if ($errorElement.length) {
            $errorElement.text('');
        }
        $input.removeClass('error');
    });
}

function validateForm(data) {
    var errors = {};
    
    if (!data.name || $.trim(data.name).length < 2) {
        errors.name = 'Пожалуйста, введите ваше имя';
    }
    
    if (!data.phone || data.phone.replace(/\D/g, '').length < 11) {
        errors.phone = 'Пожалуйста, введите корректный номер телефона';
    }
    
    if (!data.consent) {
        errors.consent = 'Необходимо согласие на обработку данных';
    }
    
    return errors;
}

function validateField($input) {
    var value = $.trim($input.val());
    var error = '';
    var name = $input.attr('name');
    
    if ($input.prop('required') && !value) {
        error = 'Это поле обязательно для заполнения';
    } else if ($input.attr('type') === 'tel' && value) {
        var phoneDigits = value.replace(/\D/g, '');
        if (phoneDigits.length < 11) {
            error = 'Введите корректный номер телефона';
        }
    } else if ($input.attr('type') === 'email' && value) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            error = 'Введите корректный email';
        }
    }
    
    var $errorElement = $('#' + name + 'Error');
    if ($errorElement.length) {
        $errorElement.text(error);
    }
    
    if (error) {
        $input.addClass('error');
    } else {
        $input.removeClass('error');
    }
    
    return error;
}

function displayErrors(errors) {
    $.each(errors, function(field, message) {
        var $errorElement = $('#' + field + 'Error');
        if ($errorElement.length) {
            $errorElement.text(message);
        }
        
        var $input = $contactForm.find('[name="' + field + '"]');
        if ($input.length) {
            $input.addClass('error');
            $input.focus();
        }
    });
}

function simulateApiCall() {
    var deferred = $.Deferred();
    setTimeout(function() {
        deferred.resolve();
    }, 1500);
    return deferred.promise();
}

function showNotification(message, type) {
    type = type || 'info';
    
    // Create notification element
    var $notification = $('<div>', {
        'class': 'notification notification--' + type,
        'css': {
            'position': 'fixed',
            'bottom': '20px',
            'right': '20px',
            'padding': '16px 24px',
            'background': type === 'success' ? '#2E7D32' : '#C62828',
            'color': 'white',
            'borderRadius': '12px',
            'boxShadow': '0 10px 30px rgba(0,0,0,0.3)',
            'display': 'flex',
            'alignItems': 'center',
            'gap': '12px',
            'zIndex': '1000',
            'animation': 'slideIn 0.3s ease',
            'maxWidth': '400px'
        }
    });
    
    var iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
    $notification.html('<i class="fas ' + iconClass + '"></i><span>' + message + '</span>');
    
    $('body').append($notification);
    
    // Remove after 5 seconds
    setTimeout(function() {
        $notification.css('animation', 'slideOut 0.3s ease');
        setTimeout(function() {
            $notification.remove();
        }, 300);
    }, 5000);
}

// ============================================
// Modal
// ============================================
function initModal() {
    if (!$modal.length) return;
    
    var $closeBtn = $modal.find('.modal__close');
    var $overlay = $modal.find('.modal__overlay');
    
    $closeBtn.on('click', closeModal);
    $overlay.on('click', closeModal);
    
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $modal.attr('aria-hidden') === 'false') {
            closeModal();
        }
    });
}

function openModal(content) {
    if (!$modal.length || !$modalBody.length) return;
    
    $modalBody.html(content);
    $modal.attr('aria-hidden', 'false');
    $('body').css('overflow', 'hidden');
    
    // Focus trap
    var $focusableElements = $modal.find('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    if ($focusableElements.length) {
        $focusableElements.first().focus();
    }
}

function closeModal() {
    if (!$modal.length) return;
    
    $modal.attr('aria-hidden', 'true');
    $('body').css('overflow', '');
}

// ============================================
// Scroll Animations (Intersection Observer fallback)
// ============================================
function initScrollAnimations() {
    // Check if IntersectionObserver is supported
    if ('IntersectionObserver' in window) {
        var observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements
        $('.service-card, .advantage-card, .portfolio-item, .review-card').each(function() {
            $(this).addClass('animate-on-scroll');
            observer.observe(this);
        });
    } else {
        // Fallback for older browsers
        $(window).on('scroll', function() {
            $('.animate-on-scroll').each(function() {
                var $element = $(this);
                var elementTop = $element.offset().top;
                var viewportBottom = $(window).scrollTop() + $(window).height();
                
                if (elementTop < viewportBottom) {
                    $element.addClass('animated');
                }
            });
        }).trigger('scroll');
    }
}

// ============================================
// Lazy Loading Images
// ============================================
function initLazyLoading() {
    // Check if browser supports native lazy loading
    if ('loading' in HTMLImageElement.prototype) {
        return;
    }
    
    var $images = $('img[loading="lazy"]');
    
    // Use IntersectionObserver if available
    if ('IntersectionObserver' in window) {
        var imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var $img = $(entry.target);
                    var src = $img.data('src') || $img.attr('src');
                    $img.attr('src', src);
                    $img.removeClass('lazy');
                    imageObserver.unobserve(entry.target);
                }
            });
        });
        
        $images.each(function() {
            imageObserver.observe(this);
        });
    } else {
        // Fallback: load all images immediately
        $images.each(function() {
            var $img = $(this);
            var src = $img.data('src') || $img.attr('src');
            $img.attr('src', src);
            $img.removeClass('lazy');
        });
    }
}

// ============================================
// Phone Mask
// ============================================
function initPhoneMask() {
    var $phoneInput = $('#phone');
    if (!$phoneInput.length) return;
    
    $phoneInput.on('input', function(e) {
        var value = e.target.value.replace(/\D/g, '');
        
        if (value.startsWith('7') || value.startsWith('8')) {
            value = value.substring(1);
        }
        
        var formattedValue = '+7';
        
        if (value.length > 0) {
            formattedValue += ' (' + value.substring(0, 3);
        }
        if (value.length >= 3) {
            formattedValue += ') ' + value.substring(3, 6);
        }
        if (value.length >= 6) {
            formattedValue += '-' + value.substring(6, 8);
        }
        if (value.length >= 8) {
            formattedValue += '-' + value.substring(8, 10);
        }
        
        e.target.value = formattedValue;
    });
}

// ============================================
// Utility Functions
// ============================================

// Debounce function
function debounce(func, wait) {
    var timeout;
    return function executedFunction() {
        var context = this;
        var args = arguments;
        var later = function() {
            timeout = null;
            func.apply(context, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function
function throttle(func, limit) {
    var inThrottle;
    return function() {
        var context = this;
        var args = arguments;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(function() {
                inThrottle = false;
            }, limit);
        }
    };
}

// Add CSS animations for notifications
var style = document.createElement('style');
style.textContent = '\
    @keyframes slideIn {\
        from {\
            transform: translateX(100%);\
            opacity: 0;\
        }\
        to {\
            transform: translateX(0);\
            opacity: 1;\
        }\
    }\
    \
    @keyframes slideOut {\
        from {\
            transform: translateX(0);\
            opacity: 1;\
        }\
        to {\
            transform: translateX(100%);\
            opacity: 0;\
        }\
    }\
';
document.head.appendChild(style);

// Console greeting
console.log('%cКаменщики Татарстана', 'color: #D4A574; font-size: 24px; font-weight: bold;');
console.log('%cСоздаём тепло и уют с 2011 года', 'color: #2E7D32; font-size: 14px;');