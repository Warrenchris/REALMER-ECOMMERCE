<?php
/**
 * WooCommerce Product Card Content (content-product.php)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}

$brand   = realmer_get_product_brand($product);
$savings = realmer_get_savings($product);
$short_desc = realmer_product_short_desc($product, 65);
?>
<div <?php wc_product_class('product-card', $product); ?> data-product-id="<?php echo esc_attr($product->get_id()); ?>">
    <div class="product-card__image-wrapper">
        <?php if ($savings) : ?>
            <div class="product-card__sale-badge">
                <span class="realmer-sale-badge">Save <?php echo esc_html(realmer_format_price($savings)); ?></span>
            </div>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="product-card__image-link" style="display:flex; width:100%; height:100%; align-items:center; justify-content:center;">
            <?php
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail($product->get_id(), 'realmer-product-card', array('class' => 'product-card__image'));
            } else {
                echo '<div style="font-size: 3rem; opacity: 0.5;">💻</div>';
            }
            ?>
        </a>

        <div class="product-card__quick-actions">
            <?php
            woocommerce_template_loop_add_to_cart(array(
                'class' => 'product-card__quick-action product-card__add-to-cart',
            ));
            ?>
            <button type="button" class="product-card__quick-action product-card__compare-btn" data-product-id="<?php echo esc_attr($product->get_id()); ?>" title="Compare specs">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 3h5v5M4 20L21 3M21 16v5h-5M15 15l6 6M4 4l5 5"/></svg>
            </button>
        </div>
    </div>

    <div class="product-card__body">
        <?php if (!empty($brand)) : ?>
            <span class="product-card__brand"><?php echo esc_html($brand); ?></span>
        <?php endif; ?>

        <h3 class="product-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if (!empty($short_desc)) : ?>
            <p class="product-card__desc"><?php echo esc_html($short_desc); ?></p>
        <?php endif; ?>

        <div class="product-card__pricing">
            <span class="product-card__price"><?php echo $product->get_price_html(); ?></span>
        </div>

        <div class="product-card__availability <?php echo $product->is_in_stock() ? 'in-stock' : 'out-of-stock'; ?>">
            <?php echo $product->is_in_stock() ? '✓ In Stock · Nairobi CBD' : '✕ Backorder / Out of stock'; ?>
        </div>
    </div>
</div>
