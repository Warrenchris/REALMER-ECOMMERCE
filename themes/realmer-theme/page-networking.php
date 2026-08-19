<?php
/**
 * Template Name: Networking Specialty Page
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="networking-specialty">
    <div class="container">
        <header class="section-header">
            <span class="rm-overline" style="color: var(--rm-accent);">Connectivity Architecture</span>
            <h1 class="rm-heading-page">Build a Network That Works.</h1>
            <p class="section-subtitle">High-speed Wi-Fi, multi-WAN load balancing, and structured cabling engineered for Kenyan fiber providers and commercial buildings.</p>
        </header>

        <!-- 3 Guided Pathways -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--rm-space-6); margin-bottom: var(--rm-space-12);">
            <!-- Path 1: For Home -->
            <div style="padding: var(--rm-space-8); border: 1.5px solid var(--rm-border); border-radius: var(--rm-radius-md);">
                <span class="badge badge-accent" style="margin-bottom: var(--rm-space-3);">Residential</span>
                <h3 style="font-size: var(--rm-text-xl); margin-bottom: var(--rm-space-3);">For Modern Homes & Apartments</h3>
                <p class="rm-text-sm">Eliminate dead zones with dual-band mesh systems, high-gain antennas, and 4K video streaming optimization.</p>
                <ul class="rm-text-xs" style="margin: var(--rm-space-4) 0 var(--rm-space-6); list-style: none; display: flex; flex-direction: column; gap: 6px; color: var(--rm-muted);">
                    <li>• Wi-Fi 6 Mesh Routers (TP-Link Deco)</li>
                    <li>• Gigabit Unmanaged Switches</li>
                    <li>• Cat6 Patch Leads</li>
                </ul>
                <a href="<?php echo esc_url(get_term_link('routers', 'product_cat')); ?>" class="btn btn-outline btn-sm btn-full">Shop Home Wi-Fi</a>
            </div>

            <!-- Path 2: For SME -->
            <div style="padding: var(--rm-space-8); border: 2px solid var(--rm-obsidian); border-radius: var(--rm-radius-md); background: var(--rm-warm-white);">
                <span class="badge badge-dark" style="margin-bottom: var(--rm-space-3);">Most Popular</span>
                <h3 style="font-size: var(--rm-text-xl); margin-bottom: var(--rm-space-3);">For Small & Medium Offices</h3>
                <p class="rm-text-sm">Multi-WAN failover (Safaricom + Zuku fiber), isolated guest Wi-Fi networks, and PoE power for IP phones and CCTV.</p>
                <ul class="rm-text-xs" style="margin: var(--rm-space-4) 0 var(--rm-space-6); list-style: none; display: flex; flex-direction: column; gap: 6px; color: var(--rm-obsidian);">
                    <li>• Multi-WAN VPN Gateways (Omada/MikroTik)</li>
                    <li>• 16/24-Port Gigabit PoE Switches</li>
                    <li>• Ceiling & Wall Plate APs</li>
                </ul>
                <a href="<?php echo esc_url(get_term_link('networking', 'product_cat')); ?>" class="btn btn-primary btn-sm btn-full">Shop Office Networking</a>
            </div>

            <!-- Path 3: Enterprise -->
            <div style="padding: var(--rm-space-8); border: 1.5px solid var(--rm-border); border-radius: var(--rm-radius-md);">
                <span class="badge badge-dark" style="margin-bottom: var(--rm-space-3);">Data Center</span>
                <h3 style="font-size: var(--rm-text-xl); margin-bottom: var(--rm-space-3);">For Commercial Buildings</h3>
                <p class="rm-text-sm">Layer 2+ / Layer 3 managed switching, SFP+ 10Gbps uplinks, 42U server racks, and structured optical fiber termination.</p>
                <ul class="rm-text-xs" style="margin: var(--rm-space-4) 0 var(--rm-space-6); list-style: none; display: flex; flex-direction: column; gap: 6px; color: var(--rm-muted);">
                    <li>• 10G SFP+ Managed Switches</li>
                    <li>• Server Racks (9U to 42U) & PDU</li>
                    <li>• Optical Patch Panels & Cabling</li>
                </ul>
                <a href="<?php echo esc_url(home_url('/business')); ?>" class="btn btn-outline btn-sm btn-full">Request Site Survey</a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
