<?php
/**
 * Template Name: Business & Corporate Technology
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="business-page">
    <div class="container">
        <header class="section-header">
            <span class="rm-overline" style="color: var(--rm-accent);">Enterprise Procurement</span>
            <h1 class="rm-heading-page">Hardware & Solutions for Kenyan Enterprises</h1>
            <p class="section-subtitle">Official tax invoices, bulk volume discounts, custom component configurations, and on-site hardware deployment in Nairobi.</p>
        </header>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--rm-space-6); margin-bottom: var(--rm-space-12);">
            <div style="padding: var(--rm-space-8); background: var(--rm-warm-white); border-radius: var(--rm-radius-md);">
                <h3 style="font-size: var(--rm-text-xl); margin-bottom: var(--rm-space-3);">Workstations & Fleets</h3>
                <p class="rm-text-sm">Pre-configured fleets of HP ProBook, Dell Latitude, and Lenovo ThinkPad laptops with company-standard OS images and security encryption.</p>
                <a href="<?php echo esc_url(get_term_link('laptops', 'product_cat')); ?>" class="rm-text-sm" style="font-weight: 600;">Explore Laptop Fleets →</a>
            </div>

            <div style="padding: var(--rm-space-8); background: var(--rm-warm-white); border-radius: var(--rm-radius-md);">
                <h3 style="font-size: var(--rm-text-xl); margin-bottom: var(--rm-space-3);">Servers & Data Storage</h3>
                <p class="rm-text-sm">Tower and Rackmount Dell PowerEdge & HP ProLiant servers configured with RAID arrays, ECC RAM, and redundant power supplies.</p>
                <a href="<?php echo esc_url(get_term_link('servers', 'product_cat')); ?>" class="rm-text-sm" style="font-weight: 600;">Explore Servers →</a>
            </div>

            <div style="padding: var(--rm-space-8); background: var(--rm-warm-white); border-radius: var(--rm-radius-md);">
                <h3 style="font-size: var(--rm-text-xl); margin-bottom: var(--rm-space-3);">Network Infrastructure</h3>
                <p class="rm-text-sm">Structured cabling, patch panels, 24/48-port PoE Gigabit switches, server cabinets, and centralized Wi-Fi 6 controllers.</p>
                <a href="<?php echo esc_url(get_term_link('networking', 'product_cat')); ?>" class="rm-text-sm" style="font-weight: 600;">Explore Networking →</a>
            </div>
        </div>

        <!-- Quote Request Form Card -->
        <div style="background: var(--rm-obsidian); color: var(--rm-white); padding: var(--rm-space-12); border-radius: var(--rm-radius-lg);">
            <div style="max-width: 600px;">
                <span class="rm-overline" style="color: var(--rm-accent);">Direct B2B Desk</span>
                <h2 style="font-size: var(--rm-text-3xl); color: #fff; margin-bottom: var(--rm-space-4);">Request a Formal Corporate Quotation</h2>
                <p style="color: var(--rm-soft-gray); margin-bottom: var(--rm-space-8);">
                    Submit your Bill of Quantities (BOQ) or hardware specifications. Our enterprise specialists will generate a competitive KRA ETR-compliant Proforma within 2 hours.
                </p>
                <div style="display: flex; gap: var(--rm-space-4); flex-wrap: wrap;">
                    <a href="https://wa.me/254728333220?text=Hello%20Realmer%20Enterprise,%20we%20would%20like%20a%20formal%20B2B%20quote" class="btn btn-primary btn-lg" target="_blank" rel="noopener">
                        WhatsApp B2B Desk
                    </a>
                    <a href="mailto:sales@realmer.co.ke?subject=Corporate%20Hardware%20Quotation%20Request" class="btn btn-outline btn-lg" style="border-color: rgba(255,255,255,0.3); color: #fff;">
                        Email sales@realmer.co.ke
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
