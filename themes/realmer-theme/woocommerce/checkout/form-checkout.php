<?php
/**
 * WooCommerce Checkout Form (form-checkout.php)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'realmer')));
    return;
}
?>

<div class="realmer-checkout">
    <div class="container">
        <div class="realmer-checkout__header">
            <span class="rm-overline">Seamless Checkout</span>
            <h1 class="rm-heading-page">Complete Your Order</h1>
        </div>

        <!-- 4-Step Numbered Progress Flow -->
        <div class="checkout-steps" aria-label="Checkout steps">
            <div class="checkout-step completed">
                <div class="checkout-step__number">✓</div>
                <span class="checkout-step__label">01 Contact</span>
            </div>
            <div class="checkout-step__connector"></div>
            <div class="checkout-step active">
                <div class="checkout-step__number">02</div>
                <span class="checkout-step__label">Delivery</span>
            </div>
            <div class="checkout-step__connector"></div>
            <div class="checkout-step">
                <div class="checkout-step__number">03</div>
                <span class="checkout-step__label">Payment</span>
            </div>
            <div class="checkout-step__connector"></div>
            <div class="checkout-step">
                <div class="checkout-step__number">04</div>
                <span class="checkout-step__label">Confirm</span>
            </div>
        </div>

        <form name="checkout" method="post" class="checkout woocommerce-checkout realmer-checkout__layout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
            <!-- Left: Checkout Sections -->
            <div class="realmer-checkout__form">
                <?php if ($checkout->get_checkout_fields()) : ?>
                    <!-- Section 01: Contact & Delivery -->
                    <div class="checkout-section">
                        <div class="checkout-section__header">
                            <span class="checkout-section__number">01</span>
                            <h3 class="checkout-section__title">Contact & Delivery Details</h3>
                        </div>
                        <div class="checkout-section__body">
                            <?php do_action('woocommerce_checkout_billing'); ?>
                        </div>
                    </div>

                    <!-- Section 02: Additional Information -->
                    <div class="checkout-section">
                        <div class="checkout-section__header">
                            <span class="checkout-section__number">02</span>
                            <h3 class="checkout-section__title">Delivery Instructions / Location Notes</h3>
                        </div>
                        <div class="checkout-section__body">
                            <?php do_action('woocommerce_checkout_shipping'); ?>
                        </div>
                    </div>

                    <!-- Section 03: Payment Choice -->
                    <div class="checkout-section">
                        <div class="checkout-section__header">
                            <span class="checkout-section__number">03</span>
                            <h3 class="checkout-section__title">Payment Method (M-Pesa STK Push / Card)</h3>
                        </div>
                        <div class="checkout-section__body">
                            <div class="mpesa-payment-section" style="margin-bottom: var(--rm-space-6);">
                                <h4 class="mpesa-payment-section__title">Pay with Safaricom M-Pesa</h4>
                                <p class="mpesa-payment-section__desc">Enter your M-Pesa number below to receive an instant STK push prompt on your handset.</p>
                                <div class="mpesa-phone-input">
                                    <input type="tel" id="mpesa-checkout-phone" placeholder="e.g. 0728 333 220 or 2547..." pattern="[0-9]{10,12}">
                                </div>
                            </div>
                            <?php woocommerce_checkout_payment(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right: Order Summary Sidebar -->
            <aside class="realmer-order-summary" aria-label="Order Summary">
                <h3>Order Summary</h3>
                <div id="order_review" class="woocommerce-checkout-review-order">
                    <?php do_action('woocommerce_checkout_order_review'); ?>
                </div>
            </aside>
        </form>
    </div>
</div>
