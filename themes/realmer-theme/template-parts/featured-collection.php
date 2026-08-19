<?php
/**
 * Template Part: Featured Collection (Editorial Product Stories)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<section class="section section--warm" id="featured-collections">
    <div class="container">
        <div class="section-header">
            <span class="rm-overline">Curated Setups</span>
            <h2 class="rm-heading-section">What's worth knowing.</h2>
            <p class="section-subtitle">Engineered hardware setups designed to solve specific challenges with zero guesswork.</p>
        </div>

        <div class="editorial-cards">
            <!-- Setup 1: Work From Anywhere -->
            <div class="editorial-card">
                <div class="editorial-card__icon">💻</div>
                <h3 class="editorial-card__title">Work From Anywhere</h3>
                <p class="editorial-card__desc">
                    Ultra-portable 14" Intel Core Ultra / Apple Silicon laptops paired with ANC headphones, GaN 65W chargers, and high-speed Wi-Fi 6 Mi-Fi for seamless mobility across Kenya.
                </p>
                <a href="<?php echo esc_url(home_url('/bundles#work-from-anywhere')); ?>" class="editorial-card__cta">
                    Explore Work Setup
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Setup 2: Home Office Command Center -->
            <div class="editorial-card">
                <div class="editorial-card__icon">🖥️</div>
                <h3 class="editorial-card__title">Build Your Home Office</h3>
                <p class="editorial-card__desc">
                    27" IPS USB-C Hub Monitor + Ergonomic Logitech MX keyboard & mouse + 1080p AI Webcam + APC Back-UPS to keep your power completely uninterrupted.
                </p>
                <a href="<?php echo esc_url(home_url('/bundles#home-office')); ?>" class="editorial-card__cta">
                    Build Your Setup
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Setup 3: Better Wi-Fi & Office Networking -->
            <div class="editorial-card">
                <div class="editorial-card__icon">📡</div>
                <h3 class="editorial-card__title">Better Wi-Fi That Never Drops</h3>
                <p class="editorial-card__desc">
                    Dual-Band Gigabit Mesh Routers + Gigabit PoE Switches + Ceiling-Mounted Access Points. Tested for concrete walls, multiple floors, and heavy fiber bandwidth.
                </p>
                <a href="<?php echo esc_url(home_url('/networking')); ?>" class="editorial-card__cta">
                    Explore Networking
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
