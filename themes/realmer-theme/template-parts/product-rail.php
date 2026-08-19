<?php
/**
 * Template Part: Popular Right Now (Horizontal Product Rail)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

// Fetch popular products via WooCommerce query or fallback to sample curated hardware
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
);

$popular_query = new WP_Query($args);
?>
<section class="section" id="popular-products">
    <div class="container">
        <div class="flex-between" style="margin-bottom: var(--rm-space-8); flex-wrap: wrap; gap: var(--rm-space-4);">
            <div>
                <span class="rm-overline">Curated Commerce</span>
                <h2 class="rm-heading-section" style="margin-bottom: 0;">Popular right now.</h2>
            </div>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-outline btn-sm">
                View All Hardware
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="product-rail">
            <?php
            if ($popular_query->have_posts()) :
                while ($popular_query->have_posts()) :
                    $popular_query->the_post();
                    wc_get_template_part('content', 'product');
                endwhile;
                wp_reset_postdata();
            else :
                // High-fidelity fallback cards matching Realmer's real stock
                $mock_products = array(
                    array(
                        'brand'     => 'LENOVO',
                        'title'     => 'ThinkPad E14 Gen 6',
                        'desc'      => '14" WUXGA IPS · Intel Core Ultra 5 · 16GB DDR5 · 512GB NVMe SSD',
                        'price'     => 'KSh 89,999',
                        'old_price' => 'KSh 98,000',
                        'savings'   => 'Save KSh 8,001',
                        'avail'     => 'In Stock · Nairobi CBD',
                    ),
                    array(
                        'brand'     => 'HP',
                        'title'     => 'ProBook 450 G10',
                        'desc'      => '15.6" FHD · Intel Core i7 13th Gen · 16GB RAM · 512GB SSD · Fingerprint',
                        'price'     => 'KSh 104,999',
                        'old_price' => 'KSh 115,000',
                        'savings'   => 'Save KSh 10,001',
                        'avail'     => 'In Stock · Nairobi CBD',
                    ),
                    array(
                        'brand'     => 'DELL',
                        'title'     => 'Latitude 5440 Enterprise',
                        'desc'      => '14" FHD Non-Touch · Core i5-1335U · 16GB RAM · 512GB SSD · vPro Capable',
                        'price'     => 'KSh 94,500',
                        'old_price' => '',
                        'savings'   => '',
                        'avail'     => 'In Stock · Nairobi CBD',
                    ),
                    array(
                        'brand'     => 'TP-LINK',
                        'title'     => 'Archer AX73 Wi-Fi 6 Router',
                        'desc'      => 'AX5400 Dual-Band Gigabit · 6 High-Gain Antennas · OneMesh Support',
                        'price'     => 'KSh 18,500',
                        'old_price' => 'KSh 21,000',
                        'savings'   => 'Save KSh 2,500',
                        'avail'     => 'In Stock · Nairobi CBD',
                    ),
                    array(
                        'brand'     => 'EPSON',
                        'title'     => 'EcoTank L3250 Wi-Fi All-in-One',
                        'desc'      => 'Print, Scan, Copy · Wireless Mobile Printing · Ultra-low-cost per page',
                        'price'     => 'KSh 27,999',
                        'old_price' => 'KSh 31,000',
                        'savings'   => 'Save KSh 3,001',
                        'avail'     => 'In Stock · Nairobi CBD',
                    ),
                    array(
                        'brand'     => 'APC',
                        'title'     => 'Easy UPS BVX 1200VA 230V',
                        'desc'      => '6 Universal Outlets · AVR Battery Backup for PCs, Routers & Workstations',
                        'price'     => 'KSh 19,800',
                        'old_price' => '',
                        'savings'   => '',
                        'avail'     => 'In Stock · Nairobi CBD',
                    ),
                );

                foreach ($mock_products as $item) :
            ?>
                <div class="product-card">
                    <div class="product-card__image-wrapper">
                        <?php if (!empty($item['savings'])) : ?>
                            <div class="product-card__sale-badge">
                                <span class="realmer-sale-badge"><?php echo esc_html($item['savings']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <div style="font-size: 3rem; opacity: 0.8; user-select: none;">
                            <?php 
                            if ($item['brand'] === 'TP-LINK') echo '📡';
                            elseif ($item['brand'] === 'EPSON') echo '🖨️';
                            elseif ($item['brand'] === 'APC') echo '⚡';
                            else echo '💻';
                            ?>
                        </div>

                        <div class="product-card__quick-actions">
                            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="product-card__quick-action product-card__add-to-cart">
                                View Specs
                            </a>
                        </div>
                    </div>

                    <div class="product-card__body">
                        <span class="product-card__brand"><?php echo esc_html($item['brand']); ?></span>
                        <h3 class="product-card__title">
                            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"><?php echo esc_html($item['title']); ?></a>
                        </h3>
                        <p class="product-card__desc"><?php echo esc_html($item['desc']); ?></p>

                        <div class="product-card__pricing">
                            <span class="product-card__price"><?php echo esc_html($item['price']); ?></span>
                            <?php if (!empty($item['old_price'])) : ?>
                                <span class="product-card__price-old"><?php echo esc_html($item['old_price']); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="product-card__availability">
                            ✓ <?php echo esc_html($item['avail']); ?>
                        </div>
                    </div>
                </div>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>
    </div>
</section>
