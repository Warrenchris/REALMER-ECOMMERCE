<?php
/**
 * Template Name: Bundles & Setups Page
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="bundles-page">
    <div class="container">
        <header class="section-header">
            <span class="rm-overline" style="color: var(--rm-accent);">Engineered Setups</span>
            <h1 class="rm-heading-page">Curated Technology Bundles</h1>
            <p class="section-subtitle">Save time and money by purchasing coordinated hardware packages architected to work seamlessly together.</p>
        </header>

        <div class="editorial-cards" style="grid-template-columns: 1fr; gap: var(--rm-space-8);">
            <!-- Bundle 1: Complete Home Office -->
            <div class="editorial-card" style="padding: var(--rm-space-10); background: var(--rm-warm-white);">
                <div class="flex-between" style="flex-wrap: wrap; gap: var(--rm-space-4); margin-bottom: var(--rm-space-4);">
                    <div>
                        <span class="badge badge-accent" style="margin-bottom: 8px;">Popular Bundle</span>
                        <h2 style="font-size: var(--rm-text-2xl);">Complete Home Office Command Center</h2>
                    </div>
                    <div style="text-align: right;">
                        <span style="font-size: var(--rm-text-2xl); font-weight: 700;">KSh 142,000</span>
                        <div class="rm-text-sm" style="color: var(--rm-success); font-weight: 600;">Save KSh 18,000 vs individual items</div>
                    </div>
                </div>
                <p class="rm-text-md">
                    Designed for remote software engineers, executives, and financial analysts in Nairobi.
                </p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--rm-space-4); margin: var(--rm-space-6) 0;">
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>💻 HP ProBook 450 G10</strong><br>
                        <span class="rm-text-xs">Core i7 · 16GB RAM · 512GB SSD</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>🖥️ Dell 27" IPS Monitor</strong><br>
                        <span class="rm-text-xs">FHD · USB-C Hub · 75Hz</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>⌨️ Logitech MK295 Silent</strong><br>
                        <span class="rm-text-xs">Wireless Keyboard & Mouse Combo</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>⚡ APC 650VA UPS</strong><br>
                        <span class="rm-text-xs">Surge & Power Outage Protection</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>📹 1080p Wide Webcam</strong><br>
                        <span class="rm-text-xs">With Dual Noise-Cancelling Mic</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>🚚 Free CBD Setup</strong><br>
                        <span class="rm-text-xs">On-site delivery & cable tidying</span>
                    </div>
                </div>
                <a href="https://wa.me/254728333220?text=Hi%20Realmer,%20I'm%20interested%20in%20the%20Complete%20Home%20Office%20Bundle" class="btn btn-primary btn-lg" style="align-self: flex-start;">
                    Order This Bundle (KSh 142,000)
                </a>
            </div>

            <!-- Bundle 2: Small Business Networking Starter -->
            <div class="editorial-card" style="padding: var(--rm-space-10); background: var(--rm-warm-white);">
                <div class="flex-between" style="flex-wrap: wrap; gap: var(--rm-space-4); margin-bottom: var(--rm-space-4);">
                    <div>
                        <span class="badge badge-dark" style="margin-bottom: 8px;">Commercial Infrastructure</span>
                        <h2 style="font-size: var(--rm-text-2xl);">SME Office Networking Starter Pack</h2>
                    </div>
                    <div style="text-align: right;">
                        <span style="font-size: var(--rm-text-2xl); font-weight: 700;">KSh 78,500</span>
                        <div class="rm-text-sm" style="color: var(--rm-success); font-weight: 600;">Save KSh 9,500 bundled</div>
                    </div>
                </div>
                <p class="rm-text-md">
                    Provides rock-solid Wi-Fi coverage for up to 30 simultaneous staff and guests across up to 3,000 sq ft.
                </p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--rm-space-4); margin: var(--rm-space-6) 0;">
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>📡 TP-Link Omada ER605</strong><br>
                        <span class="rm-text-xs">Multi-WAN Gigabit VPN Router</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>🔌 16-Port Gigabit PoE Switch</strong><br>
                        <span class="rm-text-xs">Supplies power to all access points</span>
                    </div>
                    <div style="padding: var(--rm-space-3); background: #fff; border-radius: var(--rm-radius-sm);">
                        <strong>📶 2x EAP610 Wi-Fi 6 APs</strong><br>
                        <span class="rm-text-xs">Ceiling mount · Seamless roaming</span>
                    </div>
                </div>
                <a href="https://wa.me/254728333220?text=Hi%20Realmer,%20I'm%20interested%20in%20the%20SME%20Networking%20Starter%20Bundle" class="btn btn-primary btn-lg" style="align-self: flex-start;">
                    Order Networking Bundle (KSh 78,500)
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
