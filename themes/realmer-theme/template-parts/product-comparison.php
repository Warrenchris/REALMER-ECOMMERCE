<?php
/**
 * Template Part: Product Comparison Table
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<div class="product-comparison-wrapper" id="comparison-drawer" style="display:none;">
    <div class="comparison-bar" style="position: fixed; bottom: 0; left: 0; right: 0; background: var(--rm-obsidian); color: var(--rm-white); padding: var(--rm-space-4) var(--rm-space-6); z-index: var(--rm-z-sticky); display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center; gap: var(--rm-space-4);">
            <span style="font-weight: 600;">Compare Products (<span id="compare-count">0</span>/4)</span>
            <span class="rm-text-sm" style="color: var(--rm-soft-gray);">Select up to 4 items to compare specs side by side</span>
        </div>
        <div style="display: flex; gap: var(--rm-space-3);">
            <button type="button" class="btn btn-primary btn-sm" id="open-compare-modal">Compare Now</button>
            <button type="button" class="btn btn-ghost btn-sm" id="clear-compare" style="color: var(--rm-soft-gray);">Clear</button>
        </div>
    </div>
</div>
