<?php
/**
 * Template Part: Business Technology Section
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<section class="section section--dark business-section" id="business-tech">
    <div class="container">
        <div class="business-section__content">
            <span class="rm-overline" style="color: var(--rm-accent);">Enterprise & B2B Solutions</span>
            <h2 class="business-section__title">Technology engineered for business.</h2>
            <p class="business-section__desc">
                From a single workstation to an entire enterprise rack, get the hardware, volume pricing, and localized IT support your organization needs to stay ahead.
            </p>

            <div class="business-categories">
                <a href="<?php echo esc_url(get_term_link('desktops', 'product_cat')); ?>" class="business-category">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    <span>Desktops & AIOs</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('servers', 'product_cat')); ?>" class="business-category">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                    <span>Tower & Rack Servers</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('printers', 'product_cat')); ?>" class="business-category">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    <span>Printers & Heavy MFPs</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('networking', 'product_cat')); ?>" class="business-category">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>
                    <span>Managed Switches & APs</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('pos', 'product_cat')); ?>" class="business-category">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M7 15h0M2 9.5h20"/></svg>
                    <span>POS Systems & Scanners</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('security-cameras', 'product_cat')); ?>" class="business-category">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <span>CCTV & Surveillance</span>
                </a>
            </div>

            <div class="business-section__actions">
                <a href="<?php echo esc_url(home_url('/business')); ?>" class="btn btn-primary">
                    Explore Business Technology
                </a>
                <a href="https://wa.me/254728333220?text=Hello%20Realmer,%20we%20need%20a%20corporate%20B2B%20quotation" class="btn btn-outline" style="border-color: rgba(255,255,255,0.25); color: #fff;">
                    Request Proforma Quote
                </a>
            </div>
        </div>

        <div class="business-section__visual">
            <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: var(--rm-radius-lg); padding: var(--rm-space-8); width: 100%;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: var(--rm-space-6); border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: var(--rm-space-4);">
                    <span style="font-weight: 700; color: #fff;">Realmer Enterprise Concierge</span>
                    <span class="badge badge-accent">Direct B2B Pricing</span>
                </div>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: var(--rm-space-4); color: var(--rm-soft-gray); font-size: var(--rm-text-sm);">
                    <li style="display: flex; gap: 10px; align-items: center;">
                        <span style="color: var(--rm-accent);">✓</span> Formal KRA Tax Invoices & ETR compliance
                    </li>
                    <li style="display: flex; gap: 10px; align-items: center;">
                        <span style="color: var(--rm-accent);">✓</span> Custom RAM & SSD configuration on order
                    </li>
                    <li style="display: flex; gap: 10px; align-items: center;">
                        <span style="color: var(--rm-accent);">✓</span> On-site network setup and server deployment in Nairobi
                    </li>
                    <li style="display: flex; gap: 10px; align-items: center;">
                        <span style="color: var(--rm-accent);">✓</span> 30-day corporate payment terms for verified accounts
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
