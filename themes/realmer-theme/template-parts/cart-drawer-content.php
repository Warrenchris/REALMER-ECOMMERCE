<?php
/**
 * Template Part: Cart Drawer Live Content
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

if (!function_exists('WC') || !WC()->cart || WC()->cart->is_empty()) :
?>
    <div class="cart-drawer__empty">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 0 1-8 0"/>
        </svg>
        <h4>Your cart is empty</h4>
        <p class="rm-text-sm">Explore our curated collection of computers, networking and tech essentials.</p>
        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary btn-sm" id="cart-start-shopping">
            Explore Hardware
        </a>
    </div>
<?php
else :
    $cart_subtotal = WC()->cart->get_cart_subtotal();
    $cart_total    = WC()->cart->get_cart_total();
?>
    <div class="cart-items-list">
        <?php
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
            $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
        ?>
            <div class="cart-item" data-cart-key="<?php echo esc_attr($cart_item_key); ?>">
                <div class="cart-item__image">
                    <?php
                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                    if (!$product_permalink) {
                        echo $thumbnail;
                    } else {
                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                    }
                    ?>
                </div>

                <div class="cart-item__info">
                    <span class="cart-item__brand"><?php echo esc_html(realmer_get_product_brand($_product)); ?></span>
                    <div class="cart-item__title">
                        <?php
                        if (!$product_permalink) {
                            echo wp_kses_post($_product->get_name());
                        } else {
                            echo wp_kses_post(sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()));
                        }
                        ?>
                    </div>

                    <div class="cart-item__price">
                        <?php echo WC()->cart->get_product_price($_product); ?>
                    </div>

                    <div class="cart-item__qty">
                        <span style="font-size: var(--rm-text-xs); color: var(--rm-muted); margin-right: 6px;">Qty: <?php echo esc_html($cart_item['quantity']); ?></span>
                        <?php
                        echo apply_filters(
                            'woocommerce_cart_item_remove_link',
                            sprintf(
                                '<a href="%s" class="cart-item__remove" aria-label="%s" data-product_id="%s" data-cart_item_key="%s">Remove</a>',
                                esc_url(wc_get_cart_remove_url($cart_item_key)),
                                esc_html__('Remove this item', 'realmer'),
                                esc_attr($product_id),
                                esc_attr($cart_item_key)
                            ),
                            $cart_item_key
                        );
                        ?>
                    </div>
                </div>
            </div>
        <?php
            endif;
        endforeach;
        ?>
    </div>

    <div class="cart-drawer__footer">
        <div class="cart-drawer__subtotal">
            <span class="cart-drawer__subtotal-label">Subtotal:</span>
            <span class="cart-drawer__subtotal-amount"><?php echo $cart_subtotal; ?></span>
        </div>

        <div class="cart-drawer__delivery">
            ✓ Free Delivery within Nairobi CBD<br>
            ✓ M-Pesa STK Push ready at checkout
        </div>

        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="btn btn-primary btn-full cart-drawer__checkout-btn">
            Proceed to Checkout
        </a>

        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="cart-drawer__continue" id="cart-continue-btn">
            ← Continue Shopping
        </a>
    </div>
<?php endif; ?>
