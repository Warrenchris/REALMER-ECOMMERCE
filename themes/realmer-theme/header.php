<?php
/**
 * Theme Header
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Realmer Technology — Kenya's curated technology destination. Premium laptops, phones, networking, printers & accessories. M-Pesa accepted. Nationwide delivery.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <!-- Utility Bar -->
    <div class="utility-bar" id="utility-bar">
        <div class="container">
            <div class="utility-bar__messages">
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    Free Nairobi CBD Delivery
                </span>
                <span class="separator">·</span>
                <span>Nationwide Delivery Available</span>
                <span class="separator">·</span>
                <span>M-Pesa Accepted</span>
            </div>
            <div class="utility-bar__actions">
                <a href="<?php echo esc_url(home_url('/track-order')); ?>">Track Order</a>
                <a href="<?php echo esc_url(home_url('/help')); ?>">Help</a>
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>">My Account</a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">Sign In</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main-nav" id="main-nav" role="navigation" aria-label="Main navigation">
        <div class="container">
            <!-- Logo -->
            <div class="main-nav__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="Realmer Technology - Home">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <span class="logo-text">REALMER</span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Primary Menu -->
            <ul class="main-nav__menu" id="primary-menu">
                <li><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">Shop</a></li>
                <li><a href="<?php echo esc_url(realmer_get_term_url('laptops')); ?>">Computers</a></li>
                <li><a href="<?php echo esc_url(realmer_get_term_url('phones-tablets')); ?>">Phones</a></li>
                <li><a href="<?php echo esc_url(home_url('/business')); ?>">Business</a></li>
                <li><a href="<?php echo esc_url(realmer_get_term_url('networking')); ?>">Networking</a></li>
                <li><a href="<?php echo esc_url(realmer_get_term_url('laptop-accessories')); ?>">Accessories</a></li>
                <li><a href="<?php echo esc_url(realmer_get_term_url('televisions')); ?>">Home Tech</a></li>
                <li>
                    <a href="<?php echo esc_url(home_url('/deals')); ?>">
                        Deals
                        <span class="nav-deals-badge">New</span>
                    </a>
                </li>
            </ul>

            <!-- Nav Actions -->
            <div class="main-nav__actions">
                <!-- Search -->
                <button class="nav-action-btn nav-search-btn" id="search-toggle" aria-label="Search">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>

                <!-- Account -->
                <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="nav-action-btn" aria-label="My Account">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </a>

                <!-- Wishlist -->
                <button class="nav-action-btn" id="wishlist-toggle" aria-label="Wishlist">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                    <span class="count-badge wishlist-count" style="display:none;">0</span>
                </button>

                <!-- Cart -->
                <button class="nav-action-btn nav-cart-btn" id="cart-toggle" aria-label="Cart">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 0 1-8 0"/>
                    </svg>
                    <?php if (class_exists('WooCommerce') && WC()->cart) : ?>
                        <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                        <span class="count-badge cart-count" <?php echo $cart_count === 0 ? 'style="display:none;"' : ''; ?>>
                            <?php echo esc_html($cart_count); ?>
                        </span>
                    <?php endif; ?>
                </button>

                <!-- Mobile Toggle -->
                <button class="nav-mobile-toggle" id="mobile-menu-toggle" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Search Overlay -->
    <?php get_template_part('template-parts/search-overlay'); ?>

    <!-- Cart Drawer -->
    <?php get_template_part('template-parts/cart-drawer'); ?>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu__header">
            <span class="logo-text" style="font-size:1.2rem; font-weight:700;">REALMER</span>
            <button class="search-close-btn" id="mobile-menu-close" aria-label="Close menu">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <ul class="mobile-menu__nav">
            <li><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">Shop All</a></li>
            <li><a href="<?php echo esc_url(realmer_get_term_url('laptops')); ?>">Computers</a></li>
            <li><a href="<?php echo esc_url(realmer_get_term_url('phones-tablets')); ?>">Phones & Tablets</a></li>
            <li><a href="<?php echo esc_url(home_url('/business')); ?>">Business</a></li>
            <li><a href="<?php echo esc_url(realmer_get_term_url('networking')); ?>">Networking</a></li>
            <li><a href="<?php echo esc_url(realmer_get_term_url('laptop-accessories')); ?>">Accessories</a></li>
            <li><a href="<?php echo esc_url(realmer_get_term_url('televisions')); ?>">Home Tech</a></li>
            <li><a href="<?php echo esc_url(home_url('/deals')); ?>">Deals</a></li>
            <li><a href="<?php echo esc_url(home_url('/journal')); ?>">Journal</a></li>
            <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Realmer</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
        </ul>
    </div>

    <main id="content" role="main">
