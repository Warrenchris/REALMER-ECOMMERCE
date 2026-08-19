<?php
/**
 * Template Part: Shop by Need (Editorial Tiles)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<section class="section" id="shop-by-need">
    <div class="container">
        <div class="section-header">
            <span class="rm-overline">Intuitive Discovery</span>
            <h2 class="rm-heading-section">Technology for the way you work & live.</h2>
            <p class="section-subtitle">Skip catalog clutter. Explore hardware architected around real outcomes.</p>
        </div>

        <div class="need-tiles">
            <!-- Work -->
            <a href="<?php echo esc_url(get_term_link('laptops', 'product_cat')); ?>" class="need-tile">
                <div class="need-tile__content">
                    <span class="rm-label" style="color: var(--rm-accent);">Productivity & Performance</span>
                    <h3 class="need-tile__label">Work</h3>
                    <p class="need-tile__categories">Laptops · 4K Monitors · Workstations · Laser Printers</p>
                </div>
            </a>

            <!-- Create -->
            <a href="<?php echo esc_url(get_term_link('cameras', 'product_cat')); ?>" class="need-tile">
                <div class="need-tile__content">
                    <span class="rm-label" style="color: var(--rm-accent);">Design & Production</span>
                    <h3 class="need-tile__label">Create</h3>
                    <p class="need-tile__categories">Cameras · Studio Microphones · Color-Calibrated Displays · Fast NVMe Storage</p>
                </div>
            </a>

            <!-- Play -->
            <a href="<?php echo esc_url(get_term_link('games', 'product_cat')); ?>" class="need-tile">
                <div class="need-tile__content">
                    <span class="rm-label" style="color: var(--rm-accent);">Immersive Entertainment</span>
                    <h3 class="need-tile__label">Play</h3>
                    <p class="need-tile__categories">RTX Gaming Rigs · 165Hz Monitors · Mechanical Keyboards · Wireless Headsets</p>
                </div>
            </a>

            <!-- Connect -->
            <a href="<?php echo esc_url(get_term_link('networking', 'product_cat')); ?>" class="need-tile">
                <div class="need-tile__content">
                    <span class="rm-label" style="color: var(--rm-accent);">High-Speed Infrastructure</span>
                    <h3 class="need-tile__label">Connect</h3>
                    <p class="need-tile__categories">Wi-Fi 6/7 Routers · PoE Switches · Long-Range APs · Server Racks</p>
                </div>
            </a>

            <!-- Power -->
            <a href="<?php echo esc_url(get_term_link('laptop-accessories', 'product_cat')); ?>" class="need-tile">
                <div class="need-tile__content">
                    <span class="rm-label" style="color: var(--rm-accent);">Uninterrupted Uptime</span>
                    <h3 class="need-tile__label">Power</h3>
                    <p class="need-tile__categories">Line-Interactive UPS · High-Cap Power Banks · Replacement Batteries · GaN Chargers</p>
                </div>
            </a>

            <!-- Home -->
            <a href="<?php echo esc_url(get_term_link('televisions', 'product_cat')); ?>" class="need-tile">
                <div class="need-tile__content">
                    <span class="rm-label" style="color: var(--rm-accent);">Smart Living</span>
                    <h3 class="need-tile__label">Home</h3>
                    <p class="need-tile__categories">Smart 4K QLED TVs · Soundbars · Security Cameras · Modern Appliances</p>
                </div>
            </a>
        </div>
    </div>
</section>
