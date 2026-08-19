<?php
/**
 * Template Name: About Realmer
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="about-page">
    <div class="container container-sm">
        <header class="section-header" style="margin-bottom: var(--rm-space-12);">
            <span class="rm-overline" style="color: var(--rm-accent);">Our Purpose</span>
            <h1 class="rm-display" style="margin-bottom: var(--rm-space-6);">Technology should make life easier, not more confusing.</h1>
            <p class="rm-text-lg" style="color: var(--rm-muted); line-height: 1.7;">
                Realmer Technology was founded with a singular conviction: buying technology in Kenya shouldn't be a gamble of counterfeit products, misleading specifications, and unverified warranties.
            </p>
        </header>

        <div style="line-height: 1.8; color: var(--rm-obsidian); font-size: var(--rm-text-md);">
            <h2 style="font-size: var(--rm-text-2xl); margin: var(--rm-space-8) 0 var(--rm-space-4);">From Catalogue to Curation</h2>
            <p>
                Too many electronics stores overwhelm you with thousands of confusing product SKUs. We take the opposite approach: we rigorously test, benchmark, and curate hardware that excels in Kenyan operating environments — factoring in local electrical stability, fiber internet speeds, and real-world durability.
            </p>

            <h2 style="font-size: var(--rm-text-2xl); margin: var(--rm-space-8) 0 var(--rm-space-4);">Physical Presence in Nairobi CBD</h2>
            <p>
                We operate both online and through our physical showroom at <strong>Bazaar Plaza, 4th Floor, Door 3 on Biashara Street, Nairobi CBD</strong>. Customers are welcome to test laptops, inspect motherboards, or discuss multi-seat enterprise networking architecture face-to-face.
            </p>

            <h2 style="font-size: var(--rm-text-2xl); margin: var(--rm-space-8) 0 var(--rm-space-4);">Our 4 Uncompromising Standards</h2>
            <ul style="margin-left: 20px; display: flex; flex-direction: column; gap: var(--rm-space-3); color: var(--rm-muted);">
                <li><strong>1. Zero Counterfeits:</strong> Every HP, Dell, Lenovo, Apple, Epson, and TP-Link unit is 100% genuine with verifiable serial numbers.</li>
                <li><strong>2. Transparent KSh Pricing:</strong> All prices include VAT. No hidden checkout fees or currency conversion penalties.</li>
                <li><strong>3. Instant M-Pesa Integration:</strong> Frictionless, safe payments powered directly by Safaricom STK Push.</li>
                <li><strong>4. Lifetime Technical Support:</strong> We don't disappear after the sale. If you need driver updates, RAM upgrades, or network troubleshooting, our technicians are one call away.</li>
            </ul>

            <div style="margin-top: var(--rm-space-12); padding: var(--rm-space-8); background: var(--rm-warm-white); border-radius: var(--rm-radius-md); text-align: center;">
                <h3 style="margin-bottom: var(--rm-space-2);">Want to discuss a custom build or corporate order?</h3>
                <p class="rm-text-sm" style="margin-bottom: var(--rm-space-6);">Visit our store on Biashara Street or start a direct WhatsApp conversation.</p>
                <div style="display: flex; gap: var(--rm-space-3); justify-content: center;">
                    <a href="https://wa.me/254728333220" class="btn btn-primary" target="_blank" rel="noopener">WhatsApp Our Engineers</a>
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-outline">Browse Catalog</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
