/**
 * Realmer Technology — Main Frontend Interactions
 *
 * Handles:
 * - Smart Search Overlay + Debounced AJAX
 * - Cart Drawer + AJAX Add/Remove/Update
 * - Recommendation Wizard (3-step decision tree)
 * - Product Comparison List
 * - Single Product Gallery
 * - Mobile Navigation & Drawers
 *
 * @package Realmer
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * =================================================================
         * 1. STICKY HEADER SCROLL SHADOW
         * =================================================================
         */
        const $mainNav = $('#main-nav');
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 30) {
                $mainNav.addClass('is-scrolled');
            } else {
                $mainNav.removeClass('is-scrolled');
            }
        });

        /**
         * =================================================================
         * 2. SMART SEARCH OVERLAY & AJAX
         * =================================================================
         */
        const $searchModal    = $('#search-modal');
        const $searchInput    = $('#realmer-smart-search-input');
        const $searchDefault  = $('#search-default-view');
        const $searchLive     = $('#search-live-results');
        const $productsList   = $('#search-products-list');
        const $categoriesList = $('#search-categories-list');

        // Open search
        $('#search-toggle, #mobile-search-trigger').on('click', function(e) {
            e.preventDefault();
            $searchModal.addClass('is-active');
            $('body').addClass('overlay-open');
            setTimeout(function() {
                $searchInput.focus();
            }, 100);
        });

        // Close search
        $('#search-close, #search-modal').on('click', function(e) {
            if (e.target === this || $(e.target).closest('#search-close').length) {
                $searchModal.removeClass('is-active');
                $('body').removeClass('overlay-open');
            }
        });

        // Quick Tag Click
        $('.search-tag').on('click', function() {
            const query = $(this).data('query');
            $searchInput.val(query).trigger('input');
        });

        // Debounced & Cancellable Search Input
        let searchTimer = null;
        let activeSearchXhr = null;

        $searchInput.on('input', function() {
            const query = $.trim($(this).val());

            clearTimeout(searchTimer);
            if (activeSearchXhr) {
                activeSearchXhr.abort();
            }

            if (query.length < 2) {
                $searchLive.hide();
                $searchDefault.show();
                return;
            }

            searchTimer = setTimeout(function() {
                activeSearchXhr = $.ajax({
                    url: (typeof realmerAjax !== 'undefined') ? realmerAjax.ajaxurl : '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        action: 'realmer_search',
                        query: query,
                        nonce: (typeof realmerAjax !== 'undefined') ? realmerAjax.nonce : ''
                    },
                    beforeSend: function() {
                        $productsList.html('<div class="rm-text-sm" style="padding: 10px; color: var(--rm-muted);">Searching curated hardware...</div>');
                        $searchDefault.hide();
                        $searchLive.show();
                    },
                    success: function(response) {
                        activeSearchXhr = null;
                        if (response.success && response.data) {
                            let prodHtml = '';
                            let catHtml = '';

                            // Render products
                            if (response.data.products && response.data.products.length > 0) {
                                response.data.products.forEach(function(item) {
                                    prodHtml += `
                                        <a href="${item.url}" class="search-result-item">
                                            ${item.image ? `<img src="${item.image}" alt="${item.title}">` : '<div style="width:52px;height:52px;background:#eee;border-radius:4px;display:flex;align-items:center;justify-content:center;">💻</div>'}
                                            <div class="search-result-item__info">
                                                <div class="search-result-item__brand">${item.brand || 'REALMER'}</div>
                                                <div class="search-result-item__title">${item.title}</div>
                                            </div>
                                            <div class="search-result-item__price">${item.price}</div>
                                        </a>
                                    `;
                                });
                            } else {
                                prodHtml = '<div class="rm-text-sm" style="padding: 10px; color: var(--rm-muted);">No products found. Try a broader search term.</div>';
                            }

                            // Render categories
                            if (response.data.categories && response.data.categories.length > 0) {
                                response.data.categories.forEach(function(cat) {
                                    catHtml += `
                                        <a href="${cat.url}" class="search-result-category">
                                            <span class="search-result-category__name">${cat.name}</span>
                                            <span class="search-result-category__count">${cat.count} items →</span>
                                        </a>
                                    `;
                                });
                            }

                            $productsList.html(prodHtml);
                            $categoriesList.html(catHtml);
                        }
                    },
                    error: function(xhr, status) {
                        if (status !== 'abort') {
                            activeSearchXhr = null;
                            $productsList.html('<div class="rm-text-sm" style="padding: 10px; color: var(--rm-muted);">Unable to process search right now.</div>');
                        }
                    }
                });
            }, 250);
        });

        /**
         * =================================================================
         * 3. CART DRAWER (SLIDE-OUT PANEL)
         * =================================================================
         */
        const $cartDrawer  = $('#cart-drawer');
        const $cartOverlay = $('#cart-drawer-overlay');

        function openCartDrawer() {
            $cartDrawer.addClass('is-active');
            $cartOverlay.addClass('is-active');
            $('body').addClass('overlay-open');
        }

        function closeCartDrawer() {
            $cartDrawer.removeClass('is-active');
            $cartOverlay.removeClass('is-active');
            $('body').removeClass('overlay-open');
        }

        $('#cart-toggle, #mobile-cart-trigger').on('click', function(e) {
            e.preventDefault();
            openCartDrawer();
        });

        $('#cart-drawer-close, #cart-drawer-overlay, #cart-continue-btn, #cart-start-shopping').on('click', function(e) {
            e.preventDefault();
            closeCartDrawer();
        });

        // AJAX Add to Cart (interception)
        $(document).on('click', '.ajax_add_to_cart, .product-card__add-to-cart', function(e) {
            const $btn = $(this);
            const productId = $btn.data('product_id') || $btn.closest('.product-card').data('product-id');

            if (productId) {
                setTimeout(function() {
                    openCartDrawer();
                }, 400);
            }
        });

        /**
         * =================================================================
         * 4. RECOMMENDATION WIZARD
         * =================================================================
         */
        const $wizardModal = $('#wizard-modal');
        let wizardData = {
            purpose: '',
            budget: ''
        };

        const recommendationsDB = {
            'work_under-30k': {
                cat: 'Refurbished Grade A Computing',
                title: 'HP ProBook 430 G5 EX-UK',
                desc: 'Core i5 8th Gen · 8GB RAM · 256GB SSD · Solid aluminum chassis for daily office tasks.',
                price: 'KSh 24,999'
            },
            'work_30k-60k': {
                cat: 'Business Laptop',
                title: 'Lenovo ThinkPad L14 Gen 2',
                desc: 'Core i5 11th Gen · 16GB RAM · 512GB SSD · Renowned ThinkPad keyboard comfort and longevity.',
                price: 'KSh 48,500'
            },
            'work_60k-100k': {
                cat: 'Modern Productivity',
                title: 'Lenovo ThinkPad E14 Gen 6',
                desc: '14" WUXGA IPS · Intel Core Ultra 5 · 16GB DDR5 · 512GB NVMe · 12hr battery life.',
                price: 'KSh 89,999'
            },
            'work_100k-plus': {
                cat: 'Executive Ultraportable',
                title: 'Apple MacBook Air M3 (16GB RAM)',
                desc: 'Liquid Retina Display · Apple M3 8-core CPU · Silent fanless design · All-day battery.',
                price: 'KSh 149,999'
            },
            'gaming_60k-100k': {
                cat: 'High Refresh Gaming',
                title: 'HP Victus 15 Gaming Laptop',
                desc: 'Core i5 13th Gen · 16GB RAM · 512GB SSD · NVIDIA RTX 3050 6GB · 144Hz IPS Screen.',
                price: 'KSh 94,999'
            },
            'business_100k-plus': {
                cat: 'Enterprise Server & Network',
                title: 'Dell PowerEdge T150 Tower Server',
                desc: 'Intel Xeon E-2314 · 32GB ECC RAM · 2x 2TB Enterprise SATA · Redundant Power.',
                price: 'KSh 185,000'
            }
        };

        $('#hero-wizard-btn, #mobile-wizard-trigger').on('click', function(e) {
            e.preventDefault();
            $wizardModal.addClass('is-active');
            $('body').addClass('overlay-open');
        });

        $('#wizard-close, #wizard-modal').on('click', function(e) {
            if (e.target === this || $(e.target).closest('#wizard-close').length) {
                $wizardModal.removeClass('is-active');
                $('body').removeClass('overlay-open');
            }
        });

        // Step 1 Click
        $('#wizard-step-1 .wizard-option').on('click', function() {
            wizardData.purpose = $(this).data('purpose');
            $('#wizard-step-1').removeClass('is-active');
            $('#wizard-step-2').addClass('is-active');
            $('.wizard-progress__dot[data-step="2"]').addClass('is-active');
        });

        // Back to Step 1
        $('#wizard-back-1').on('click', function() {
            $('#wizard-step-2').removeClass('is-active');
            $('#wizard-step-1').addClass('is-active');
            $('.wizard-progress__dot[data-step="2"]').removeClass('is-active');
        });

        // Step 2 Click
        $('#wizard-step-2 .wizard-option').on('click', function() {
            wizardData.budget = $(this).data('budget');
            $('#wizard-step-2').removeClass('is-active');
            $('#wizard-step-3').addClass('is-active');
            $('.wizard-progress__dot[data-step="3"]').addClass('is-active');

            // Render Recommendation
            const key = wizardData.purpose + '_' + wizardData.budget;
            const match = recommendationsDB[key] || recommendationsDB['work_60k-100k'];

            $('#wizard-rec-category').text(match.cat);
            $('#wizard-rec-title').text(match.title);
            $('#wizard-rec-desc').text(match.desc);
            $('#wizard-rec-price').text(match.price);
        });

        // Restart Wizard
        $('#wizard-restart').on('click', function() {
            $('#wizard-step-3').removeClass('is-active');
            $('#wizard-step-1').addClass('is-active');
            $('.wizard-progress__dot').removeClass('is-active');
            $('.wizard-progress__dot[data-step="1"]').addClass('is-active');
            wizardData = { purpose: '', budget: '' };
        });

        /**
         * =================================================================
         * 5. SINGLE PRODUCT GALLERY THUMBNAILS
         * =================================================================
         */
        $('.realmer-product-gallery__thumb').on('click', function() {
            const newSrc = $(this).data('src');
            if (newSrc) {
                $('#main-product-image').attr('src', newSrc);
                $('.realmer-product-gallery__thumb').removeClass('active');
                $(this).addClass('active');
            }
        });

        /**
         * =================================================================
         * 6. MOBILE MENU TOGGLE
         * =================================================================
         */
        const $mobileMenu = $('#mobile-menu');
        $('#mobile-menu-toggle').on('click', function() {
            $mobileMenu.addClass('is-active');
            $('body').addClass('overlay-open');
        });

        $('#mobile-menu-close').on('click', function() {
            $mobileMenu.removeClass('is-active');
            $('body').removeClass('overlay-open');
        });

        /**
         * =================================================================
         * 7. COLLAPSIBLE ACCORDIONS & FILTERS
         * =================================================================
         */
        $('.realmer-spec-group__header').on('click', function() {
            $(this).closest('.realmer-spec-group').toggleClass('is-open');
        });

        $('.filter-group__header').on('click', function() {
            $(this).closest('.filter-group').toggleClass('is-collapsed');
        });

    });
})(jQuery);
