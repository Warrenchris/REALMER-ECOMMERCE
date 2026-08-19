<?php
/**
 * Template Part: Shop by Brand (Monochrome Marks)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

$brands = array(
    array('name' => 'Apple', 'slug' => 'apple'),
    array('name' => 'HP', 'slug' => 'hp'),
    array('name' => 'Dell', 'slug' => 'dell'),
    array('name' => 'Lenovo', 'slug' => 'lenovo'),
    array('name' => 'Samsung', 'slug' => 'samsung'),
    array('name' => 'TP-Link', 'slug' => 'tp-link'),
    array('name' => 'Logitech', 'slug' => 'logitech'),
    array('name' => 'Epson', 'slug' => 'epson'),
    array('name' => 'Canon', 'slug' => 'canon'),
    array('name' => 'APC by Schneider', 'slug' => 'apc'),
    array('name' => 'Kyocera', 'slug' => 'kyocera'),
    array('name' => 'Hikvision', 'slug' => 'hikvision'),
);
?>
<section class="section section--warm" id="brands">
    <div class="container">
        <div class="section-header section-header--center">
            <span class="rm-overline">Authorized Hardware</span>
            <h2 class="rm-heading-section">Curated brands you trust.</h2>
            <p class="section-subtitle">Zero gray market. Official manufacturer warranties across all major tech brands.</p>
        </div>

        <div class="brand-grid">
            <?php foreach ($brands as $brand) : ?>
                <a href="<?php echo esc_url(add_query_arg('brand', $brand['slug'], wc_get_page_permalink('shop'))); ?>" class="brand-item" title="Shop <?php echo esc_attr($brand['name']); ?> hardware">
                    <span style="font-weight: var(--rm-weight-bold); font-size: 1.1rem; letter-spacing: -0.02em; color: var(--rm-obsidian); opacity: 0.75; text-transform: uppercase;">
                        <?php echo esc_html($brand['name']); ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
