<?php
/**
 * WooCommerce Single Product Template
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header('shop');

while (have_posts()) :
    the_post();
    global $product;
    $brand   = realmer_get_product_brand($product);
    $savings = realmer_get_savings($product);
?>

<div class="realmer-breadcrumb-container">
    <?php woocommerce_breadcrumb(); ?>
</div>

<article id="product-<?php the_ID(); ?>" <?php wc_product_class('realmer-single-product', $product); ?>>
    <div class="container">
        <!-- Left: Product Image Gallery -->
        <div class="realmer-product-gallery">
            <div class="realmer-product-gallery__main" id="main-product-image-container">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('realmer-product-large', array('id' => 'main-product-image'));
                } else {
                    echo '<div style="font-size: 5rem; opacity: 0.4;">💻</div>';
                }
                ?>
            </div>

            <?php
            $attachment_ids = $product->get_gallery_image_ids();
            if ($attachment_ids && has_post_thumbnail()) :
            ?>
                <div class="realmer-product-gallery__thumbs">
                    <div class="realmer-product-gallery__thumb active" data-src="<?php echo esc_url(wp_get_attachment_image_url(get_post_thumbnail_id(), 'realmer-product-large')); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <?php foreach ($attachment_ids as $attachment_id) : ?>
                        <div class="realmer-product-gallery__thumb" data-src="<?php echo esc_url(wp_get_attachment_image_url($attachment_id, 'realmer-product-large')); ?>">
                            <?php echo wp_get_attachment_image($attachment_id, 'thumbnail'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right: Purchasing & Specifications Summary -->
        <div class="realmer-product-summary">
            <?php if (!empty($brand)) : ?>
                <span class="realmer-product-summary__brand"><?php echo esc_html($brand); ?></span>
            <?php endif; ?>

            <h1 class="realmer-product-summary__title"><?php the_title(); ?></h1>

            <div class="realmer-product-summary__short-desc">
                <?php echo apply_filters('woocommerce_short_description', $product->get_short_description()); ?>
            </div>

            <!-- Price Block -->
            <div class="realmer-price-block">
                <span class="realmer-price-block__current"><?php echo $product->get_price_html(); ?></span>
                <?php if ($savings) : ?>
                    <span class="realmer-price-block__savings">Save <?php echo esc_html(realmer_format_price($savings)); ?></span>
                <?php endif; ?>
            </div>

            <!-- Stock Availability -->
            <div class="realmer-availability <?php echo $product->is_in_stock() ? 'realmer-availability--in-stock' : 'realmer-availability--out-of-stock'; ?>">
                <span class="realmer-availability__dot"></span>
                <span><?php echo $product->is_in_stock() ? 'In Stock · Ready for Immediate Dispatch in Nairobi' : 'Currently Out of Stock'; ?></span>
            </div>

            <!-- Add to Cart Form -->
            <div class="realmer-add-to-cart-form">
                <?php if ($product->is_in_stock()) : ?>
                    <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                        <div class="realmer-cart-buttons" style="display:flex; gap:var(--rm-space-3); margin-top:var(--rm-space-2);">
                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn btn-primary btn-lg" style="flex:2;">
                                Add to Cart
                            </button>
                            <a href="<?php echo esc_url(add_query_arg('add-to-cart', $product->get_id(), wc_get_checkout_url())); ?>" class="btn btn-secondary btn-lg" style="flex:1;">
                                Buy Now
                            </a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

            <!-- M-Pesa Payment Notice -->
            <div class="realmer-mpesa-badge">
                <div class="realmer-mpesa-badge__icon">M-PESA</div>
                <div class="realmer-mpesa-badge__text">
                    Pay securely with Safaricom M-Pesa STK Push
                    <span>Instant checkout directly from your mobile phone</span>
                </div>
            </div>

            <!-- Delivery & Warranty Signals -->
            <div class="realmer-delivery-info">
                <div class="realmer-delivery-info__item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    <span><strong>Free Nairobi CBD Delivery</strong> · Same-day delivery on orders before 3 PM</span>
                </div>
                <div class="realmer-delivery-info__item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                    <span><strong>1-Year Realmer Official Warranty</strong> · Full hardware & replacement backing</span>
                </div>
                <div class="realmer-delivery-info__item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    <span><strong>Questions on this hardware?</strong> <a href="https://wa.me/254728333220?text=Hi%20Realmer,%20I'm%20inquiring%20about%20<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener">WhatsApp an Expert →</a></span>
                </div>
            </div>

            <!-- At a Glance Specifications -->
            <div class="realmer-at-a-glance">
                <h4>Hardware At a Glance</h4>
                <div class="realmer-specs-grid">
                    <?php
                    $attributes = $product->get_attributes();
                    if (!empty($attributes)) :
                        foreach ($attributes as $attribute) :
                    ?>
                        <div class="realmer-spec-item">
                            <span class="realmer-spec-item__label"><?php echo wc_attribute_label($attribute->get_name()); ?></span>
                            <span class="realmer-spec-item__value">
                                <?php
                                if ($attribute->is_taxonomy()) {
                                    $values = wc_get_product_terms($product->get_id(), $attribute->get_name(), array('fields' => 'names'));
                                    echo esc_html(implode(', ', $values));
                                } else {
                                    echo esc_html(implode(', ', $attribute->get_options()));
                                }
                                ?>
                            </span>
                        </div>
                    <?php 
                        endforeach;
                    else : 
                    ?>
                        <div class="realmer-spec-item">
                            <span class="realmer-spec-item__label">Condition</span>
                            <span class="realmer-spec-item__value">Brand New / Sealed Box</span>
                        </div>
                        <div class="realmer-spec-item">
                            <span class="realmer-spec-item__label">Warranty</span>
                            <span class="realmer-spec-item__value">1 Year Limited Hardware</span>
                        </div>
                        <div class="realmer-spec-item">
                            <span class="realmer-spec-item__label">Origin</span>
                            <span class="realmer-spec-item__value">Authorized Distributor Stock</span>
                        </div>
                        <div class="realmer-spec-item">
                            <span class="realmer-spec-item__label">Payment</span>
                            <span class="realmer-spec-item__value">M-Pesa / Visa / Cash (CBD)</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Full Description Accordion -->
            <div class="realmer-full-specs">
                <div class="realmer-spec-group is-open">
                    <div class="realmer-spec-group__header">
                        <span>Overview & Detailed Technical Description</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                    <div class="realmer-spec-group__body" style="display:block; padding-top:var(--rm-space-3); line-height:1.7; color:var(--rm-muted);">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Sticky Purchase Bar -->
    <div class="mobile-purchase-bar" id="mobile-purchase-bar">
        <div class="mobile-purchase-bar__inner">
            <div class="mobile-purchase-bar__price">
                <?php echo $product->get_price_html(); ?>
            </div>
            <?php if ($product->is_in_stock()) : ?>
                <a href="<?php echo esc_url(add_query_arg('add-to-cart', $product->get_id(), wc_get_checkout_url())); ?>" class="btn btn-primary btn-sm">
                    Buy with M-Pesa
                </a>
            <?php else : ?>
                <button type="button" class="btn btn-outline btn-sm" disabled>Out of Stock</button>
            <?php endif; ?>
        </div>
    </div>
</article>

<?php
endwhile;

get_footer('shop');
