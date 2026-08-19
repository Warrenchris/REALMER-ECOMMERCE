<?php
/**
 * Template Part: Cart Drawer Shell
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<!-- Cart Drawer Overlay -->
<div class="cart-drawer-overlay" id="cart-drawer-overlay"></div>

<!-- Cart Drawer Panel -->
<aside class="cart-drawer" id="cart-drawer" aria-label="Shopping Cart Drawer">
    <div class="cart-drawer__header">
        <h3>Your Cart (<?php echo (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?>)</h3>
        <button type="button" class="cart-drawer__close" id="cart-drawer-close" aria-label="Close Cart">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>

    <div class="cart-drawer__body" id="cart-drawer-body">
        <?php get_template_part('template-parts/cart-drawer-content'); ?>
    </div>
</aside>
