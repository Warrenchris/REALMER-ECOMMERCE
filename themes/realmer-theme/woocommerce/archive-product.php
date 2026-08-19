<?php
/**
 * WooCommerce Product Archive Template (Shop & Category Pages)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="realmer-breadcrumb-container">
    <?php woocommerce_breadcrumb(); ?>
</div>

<div class="realmer-shop-wrapper">
    <div class="container">
        <!-- Left Filter Rail -->
        <aside class="filter-sidebar" id="filter-sidebar" aria-label="Product Filters">
            <div class="filter-group">
                <div class="filter-group__header">
                    <span class="filter-group__title">Categories</span>
                </div>
                <div class="filter-group__body">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                        'parent'     => 0,
                    ));
                    if (!is_wp_error($categories) && !empty($categories)) :
                        foreach ($categories as $cat) :
                            $is_current = is_product_category($cat->slug);
                    ?>
                        <label class="filter-option">
                            <a href="<?php echo esc_url(get_term_link($cat)); ?>" style="color: <?php echo $is_current ? 'var(--rm-obsidian); font-weight: 600;' : 'inherit'; ?>;">
                                <?php echo esc_html($cat->name); ?>
                            </a>
                            <span class="filter-option__count">(<?php echo esc_html($cat->count); ?>)</span>
                        </label>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </div>
            </div>

            <div class="filter-group">
                <div class="filter-group__header">
                    <span class="filter-group__title">Target Brand</span>
                </div>
                <div class="filter-group__body">
                    <?php
                    $top_brands = array('HP', 'Dell', 'Lenovo', 'Apple', 'TP-Link', 'Epson', 'Canon', 'APC', 'Logitech');
                    foreach ($top_brands as $brand_name) :
                    ?>
                        <label class="filter-option">
                            <input type="checkbox" name="filter_brand" value="<?php echo esc_attr(strtolower($brand_name)); ?>">
                            <span><?php echo esc_html($brand_name); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="filter-group">
                <div class="filter-group__header">
                    <span class="filter-group__title">Price Range (KSh)</span>
                </div>
                <div class="filter-group__body">
                    <label class="filter-option">
                        <input type="radio" name="price_range" value="0-30000">
                        <span>Under KSh 30,000</span>
                    </label>
                    <label class="filter-option">
                        <input type="radio" name="price_range" value="30000-60000">
                        <span>KSh 30,000 – 60,000</span>
                    </label>
                    <label class="filter-option">
                        <input type="radio" name="price_range" value="60000-100000">
                        <span>KSh 60,000 – 100,000</span>
                    </label>
                    <label class="filter-option">
                        <input type="radio" name="price_range" value="100000-plus">
                        <span>KSh 100,000+</span>
                    </label>
                </div>
            </div>

            <div class="filter-group">
                <div class="filter-group__header">
                    <span class="filter-group__title">Availability</span>
                </div>
                <div class="filter-group__body">
                    <label class="filter-option">
                        <input type="checkbox" name="in_stock" checked>
                        <span>In Stock in Nairobi</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox" name="same_day_delivery">
                        <span>Same-Day CBD Delivery</span>
                    </label>
                </div>
            </div>
        </aside>

        <!-- Right Product Catalog -->
        <main class="realmer-shop-content">
            <!-- Shop Toolbar -->
            <div class="shop-toolbar">
                <div class="shop-toolbar__count">
                    <?php
                    if (woocommerce_product_loop()) {
                        woocommerce_result_count();
                    } else {
                        echo '<span>Showing curated technology collection</span>';
                    }
                    ?>
                </div>

                <div class="shop-toolbar__actions">
                    <button type="button" class="btn btn-outline btn-sm mobile-filter-toggle" id="mobile-filter-btn" style="display:none;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                        Filters
                    </button>

                    <div class="shop-sort">
                        <?php woocommerce_catalog_ordering(); ?>
                    </div>
                </div>
            </div>

            <!-- Product Loop -->
            <?php if (woocommerce_product_loop()) : ?>
                <div class="realmer-product-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        wc_get_template_part('content', 'product');
                    endwhile;
                    ?>
                </div>

                <?php woocommerce_pagination(); ?>

            <?php else : ?>
                <div style="padding: var(--rm-space-12) 0; text-align: center;">
                    <h3>No products found</h3>
                    <p class="rm-text-muted">Try resetting your filters or searching for specific terms.</p>
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary" style="margin-top: var(--rm-space-4);">
                        Reset Catalog
                    </a>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php
get_footer('shop');
