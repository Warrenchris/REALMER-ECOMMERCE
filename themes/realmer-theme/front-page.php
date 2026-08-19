<?php
/**
 * Front Page Template (Homepage)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<!-- 1. Editorial Hero Section -->
<?php get_template_part('template-parts/hero'); ?>

<!-- 2. Trust Signals Bar -->
<?php get_template_part('template-parts/trust-signals'); ?>

<!-- 3. Shop by Need (Editorial Tiles) -->
<?php get_template_part('template-parts/shop-by-need'); ?>

<!-- 4. Featured Collections (Product Stories) -->
<?php get_template_part('template-parts/featured-collection'); ?>

<!-- 5. Popular Right Now (Horizontal Product Rail) -->
<?php get_template_part('template-parts/product-rail'); ?>

<!-- 6. Shop by Brand (Monochrome Marks) -->
<?php get_template_part('template-parts/brand-grid'); ?>

<!-- 7. Business Technology Section -->
<?php get_template_part('template-parts/business-section'); ?>

<!-- 8. Realmer Expertise Section -->
<?php get_template_part('template-parts/expertise-section'); ?>

<!-- 9. The Realmer Journal (Editorial Articles) -->
<?php get_template_part('template-parts/journal-preview'); ?>

<!-- 10. Why Realmer (Trust Architecture) -->
<section class="section section--warm" id="why-realmer">
    <div class="container">
        <div class="section-header section-header--center">
            <span class="rm-overline">Trust & Confidence</span>
            <h2 class="rm-heading-section">Why Kenya Trusts Realmer Technology</h2>
            <p class="section-subtitle">We remove the guesswork from buying technology with verified genuine products, transparent KSh pricing, and dedicated local technical support.</p>
        </div>

        <div class="trust-grid">
            <div class="trust-card">
                <div class="trust-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h4 class="trust-card__title">100% Genuine Hardware</h4>
                <p class="trust-card__desc">Direct sourcing from authorized distributors: HP, Dell, Lenovo, Apple, TP-Link, Canon, and Epson. Zero counterfeit tolerance.</p>
            </div>

            <div class="trust-card">
                <div class="trust-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <h4 class="trust-card__title">Familiar M-Pesa Checkout</h4>
                <p class="trust-card__desc">Instant STK Push to your phone. Pay securely via Safaricom M-Pesa with real-time verification and automated SMS receipts.</p>
            </div>

            <div class="trust-card">
                <div class="trust-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                </div>
                <h4 class="trust-card__title">Free CBD & Nationwide Delivery</h4>
                <p class="trust-card__desc">Same-day delivery within Nairobi CBD and environs. Next-day tracked courier to Mombasa, Kisumu, Nakuru, Eldoret & across Kenya.</p>
            </div>

            <div class="trust-card">
                <div class="trust-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                </div>
                <h4 class="trust-card__title">Valid Local Warranty</h4>
                <p class="trust-card__desc">Every laptop, desktop, printer, and network appliance is backed by 1-to-3 years official warranty support and repair services.</p>
            </div>

            <div class="trust-card">
                <div class="trust-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <h4 class="trust-card__title">Physical Store in Nairobi</h4>
                <p class="trust-card__desc">Visit our showroom at Bazaar Plaza, 4th Floor, Door 3 on Biashara Street. Inspect hardware and test setups in person.</p>
            </div>

            <div class="trust-card">
                <div class="trust-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <h4 class="trust-card__title">Bespoke Enterprise Quoting</h4>
                <p class="trust-card__desc">Need bulk hardware for your company, school, or data center? Get official Proforma invoices and dedicated B2B account managers.</p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
