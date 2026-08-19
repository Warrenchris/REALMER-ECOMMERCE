<?php
/**
 * Template Part: Smart Search Overlay
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<div class="search-overlay" id="search-modal" role="dialog" aria-modal="true" aria-label="Smart Search">
    <div class="search-panel">
        <!-- Search Input -->
        <div class="search-input-wrapper">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="search" id="realmer-smart-search-input" placeholder="What are you looking for? e.g. MacBook, Wi-Fi router, Core i7..." autocomplete="off" autofocus>
            <button type="button" class="search-close-btn" id="search-close" aria-label="Close search">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
            </button>
        </div>

        <!-- Initial Suggestions & Quick Queries -->
        <div class="search-suggestions" id="search-default-view">
            <div class="search-section-title">Popular Searches</div>
            <div class="search-tags">
                <button type="button" class="search-tag" data-query="ThinkPad">ThinkPad</button>
                <button type="button" class="search-tag" data-query="MacBook Air">MacBook Air</button>
                <button type="button" class="search-tag" data-query="Wi-Fi 6 Router">Wi-Fi 6 Router</button>
                <button type="button" class="search-tag" data-query="EcoTank Printer">EcoTank Printer</button>
                <button type="button" class="search-tag" data-query="APC UPS">APC UPS</button>
                <button type="button" class="search-tag" data-query="Dell Latitude">Dell Latitude</button>
                <button type="button" class="search-tag" data-query="1TB SSD">1TB NVMe SSD</button>
            </div>

            <div class="search-section-title" style="margin-top: var(--rm-space-4);">Top Categories</div>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--rm-space-2);">
                <a href="<?php echo esc_url(get_term_link('laptops', 'product_cat')); ?>" class="search-result-category">
                    <span class="search-result-category__name">Laptops & Notebooks</span>
                    <span class="search-result-category__count">Curated Models →</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('networking', 'product_cat')); ?>" class="search-result-category">
                    <span class="search-result-category__name">Routers & Access Points</span>
                    <span class="search-result-category__count">High-Speed Wi-Fi →</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('printers', 'product_cat')); ?>" class="search-result-category">
                    <span class="search-result-category__name">Printers & Inks</span>
                    <span class="search-result-category__count">Epson, HP, Canon →</span>
                </a>
                <a href="<?php echo esc_url(get_term_link('desktops', 'product_cat')); ?>" class="search-result-category">
                    <span class="search-result-category__name">Desktops & Workstations</span>
                    <span class="search-result-category__count">Brand & EX-UK →</span>
                </a>
            </div>
        </div>

        <!-- Dynamic Live Results Container -->
        <div class="search-suggestions" id="search-live-results" style="display:none;">
            <div class="search-section-title">Matching Products</div>
            <div class="search-results-list" id="search-products-list"></div>

            <div class="search-section-title" style="margin-top: var(--rm-space-6);">Matching Categories</div>
            <div id="search-categories-list"></div>
        </div>
    </div>
</div>
