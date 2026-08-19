<?php
/**
 * Template Name: Track Order
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="track-order-page">
    <div class="container container-sm">
        <header class="section-header section-header--center">
            <span class="rm-overline" style="color: var(--rm-accent);">Order Verification</span>
            <h1 class="rm-heading-page">Track Your Order Status</h1>
            <p class="section-subtitle">Enter your Order ID (found on your SMS/Email receipt) and billing email address to check real-time courier dispatch status.</p>
        </header>

        <div style="background: var(--rm-warm-white); padding: var(--rm-space-8); border-radius: var(--rm-radius-lg); border: 1px solid var(--rm-border-color); margin-bottom: var(--rm-space-8);">
            <?php
            if (class_exists('WooCommerce')) {
                echo do_shortcode('[woocommerce_order_tracking]');
            } else {
            ?>
                <form action="<?php echo esc_url(home_url('/track-order')); ?>" method="post" style="display: grid; gap: var(--rm-space-4);">
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom: 4px;">Order ID</label>
                        <input type="text" name="orderid" placeholder="e.g. 14205" style="width:100%; padding:12px; border:1px solid #ccc; border-radius:4px;" required>
                    </div>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom: 4px;">Billing Email</label>
                        <input type="email" name="order_email" placeholder="Email used during checkout" style="width:100%; padding:12px; border:1px solid #ccc; border-radius:4px;" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:8px;">Track Order →</button>
                </form>
            <?php } ?>
        </div>

        <div style="text-align: center; color: var(--rm-muted); font-size: var(--rm-text-sm);">
            Need immediate help with a dispatch? Call our logistics team directly: <strong style="color:var(--rm-obsidian);">0728 333 220</strong> or <a href="https://wa.me/254728333220" target="_blank" rel="noopener">WhatsApp Support</a>.
        </div>
    </div>
</div>

<?php
get_footer();
