<?php
/**
 * Template Name: Deals Page
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="deals-page">
    <div class="container">
        <header class="section-header">
            <span class="rm-overline" style="color: var(--rm-accent);">Curated Value</span>
            <h1 class="rm-heading-page">Realmer Deals & Clearance</h1>
            <p class="section-subtitle">Genuine hardware at exceptional rates. No artificial markups or countdown gimmicks — just authentic value for work and business.</p>
        </header>

        <!-- Deals Subsections -->
        <div style="display: flex; gap: var(--rm-space-2); margin-bottom: var(--rm-space-8); flex-wrap: wrap;">
            <a href="#featured-deals" class="btn btn-sm btn-primary">Today's Highlights</a>
            <a href="#under-30k" class="btn btn-sm btn-outline">Under KSh 30,000</a>
            <a href="#business-deals" class="btn btn-sm btn-outline">B2B Volume Offers</a>
            <a href="#clearance" class="btn btn-sm btn-outline">EX-UK Clearance</a>
        </div>

        <div class="realmer-product-grid" id="featured-deals">
            <?php
            $deals_query = new WP_Query(array(
                'post_type'      => 'product',
                'posts_per_page' => 6,
                'meta_query'     => array(
                    'relation' => 'OR',
                    array(
                        'key'     => '_sale_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'NUMERIC',
                    ),
                ),
            ));

            if ($deals_query->have_posts()) :
                while ($deals_query->have_posts()) :
                    $deals_query->the_post();
                    wc_get_template_part('content', 'product');
                endwhile;
                wp_reset_postdata();
            else :
                // Sample deal cards
                $mock_deals = array(
                    array(
                        'brand'     => 'LENOVO',
                        'title'     => 'ThinkPad L14 Gen 2 (EX-UK Grade A)',
                        'desc'      => '14" FHD · Core i5 11th Gen · 16GB RAM · 512GB SSD · Backlit Keyboard',
                        'price'     => 'KSh 48,500',
                        'old_price' => 'KSh 56,000',
                        'savings'   => 'Save KSh 7,500',
                    ),
                    array(
                        'brand'     => 'HP',
                        'title'     => 'LaserJet MFP M141w Wireless Printer',
                        'desc'      => 'Print, Scan, Copy · High-yield HP 150A toner · Compact office footprint',
                        'price'     => 'KSh 24,999',
                        'old_price' => 'KSh 28,500',
                        'savings'   => 'Save KSh 3,501',
                    ),
                    array(
                        'brand'     => 'TP-LINK',
                        'title'     => 'Deco X50 AX3000 Mesh Wi-Fi (2-Pack)',
                        'desc'      => 'Whole-Home/Office Mesh · Covers up to 4,500 sq ft · AI-Driven Seamless Roaming',
                        'price'     => 'KSh 22,500',
                        'old_price' => 'KSh 26,000',
                        'savings'   => 'Save KSh 3,500',
                    ),
                );

                foreach ($mock_deals as $deal) :
            ?>
                <div class="product-card">
                    <div class="product-card__image-wrapper">
                        <div class="product-card__sale-badge">
                            <span class="realmer-sale-badge"><?php echo esc_html($deal['savings']); ?></span>
                        </div>
                        <div style="font-size: 3rem; opacity: 0.5;">💻</div>
                        <div class="product-card__quick-actions">
                            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="product-card__quick-action product-card__add-to-cart">
                                View Deal
                            </a>
                        </div>
                    </div>
                    <div class="product-card__body">
                        <span class="product-card__brand"><?php echo esc_html($deal['brand']); ?></span>
                        <h3 class="product-card__title">
                            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"><?php echo esc_html($deal['title']); ?></a>
                        </h3>
                        <p class="product-card__desc"><?php echo esc_html($deal['desc']); ?></p>
                        <div class="product-card__pricing">
                            <span class="product-card__price"><?php echo esc_html($deal['price']); ?></span>
                            <span class="product-card__price-old"><?php echo esc_html($deal['old_price']); ?></span>
                        </div>
                        <div class="product-card__availability in-stock">
                            ✓ In Stock · Nairobi CBD
                        </div>
                    </div>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
