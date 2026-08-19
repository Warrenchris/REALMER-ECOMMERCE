<?php
/**
 * Template Name: Payment Options & FAQs
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="payment-options-page">
    <div class="container container-sm">
        <header class="section-header">
            <span class="rm-overline" style="color: var(--rm-accent);">Seamless Checkout</span>
            <h1 class="rm-heading-page">M-Pesa & Payment Methods</h1>
            <p class="section-subtitle">Realmer Technology offers convenient and secure payment methods tailored for Kenyan individuals and corporate buyers.</p>
        </header>

        <div style="display: grid; gap: var(--rm-space-6); margin-bottom: var(--rm-space-8);">
            <div style="background: var(--rm-warm-white); padding: var(--rm-space-6); border-radius: var(--rm-radius-md); border-left: 4px solid #25D366;">
                <h3 style="margin-bottom: var(--rm-space-2);">📱 Safaricom M-Pesa STK Push</h3>
                <p>Pay instantly on checkout with automated STK Push directly to your phone. Simply confirm your PIN on your mobile screen for real-time order processing and instant SMS confirmation.</p>
            </div>

            <div style="background: var(--rm-warm-white); padding: var(--rm-space-6); border-radius: var(--rm-radius-md); border-left: 4px solid #0056b3;">
                <h3 style="margin-bottom: var(--rm-space-2);">💳 Credit / Debit Cards (Visa & MasterCard)</h3>
                <p>We accept local and international Visa and MasterCard payments processed via 3D-Secure encrypted payment gateways.</p>
            </div>

            <div style="background: var(--rm-warm-white); padding: var(--rm-space-6); border-radius: var(--rm-radius-md); border-left: 4px solid var(--rm-obsidian);">
                <h3 style="margin-bottom: var(--rm-space-2);">🏦 Corporate Bank EFT / RTGS Transfer</h3>
                <p>For corporate purchasing and bulk B2B orders, we issue official ETR tax invoices for direct bank transfer into our Realmer Technology Limited business accounts.</p>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
