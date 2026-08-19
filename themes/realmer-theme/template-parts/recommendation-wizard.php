<?php
/**
 * Template Part: Recommendation Wizard ("Not sure what to buy?")
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<div class="wizard-overlay" id="wizard-modal" role="dialog" aria-modal="true" aria-label="Product Recommendation Wizard">
    <div class="wizard-panel">
        <div style="display: flex; justify-content: flex-end; margin-bottom: var(--rm-space-4);">
            <button type="button" class="search-close-btn" id="wizard-close" aria-label="Close Advisor">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="6"/></svg>
            </button>
        </div>

        <div class="wizard-progress">
            <div class="wizard-progress__dot is-active" data-step="1"></div>
            <div class="wizard-progress__dot" data-step="2"></div>
            <div class="wizard-progress__dot" data-step="3"></div>
        </div>

        <!-- Step 1: Purpose -->
        <div class="wizard-step is-active" id="wizard-step-1">
            <h3 class="wizard-step__title">What are you buying for?</h3>
            <p class="wizard-step__subtitle">Select your primary use case so we can narrow down specs.</p>

            <div class="wizard-options">
                <button type="button" class="wizard-option" data-purpose="work">
                    <div class="wizard-option__icon">💼</div>
                    <div class="wizard-option__label">Work & Office</div>
                </button>
                <button type="button" class="wizard-option" data-purpose="university">
                    <div class="wizard-option__icon">🎓</div>
                    <div class="wizard-option__label">School / University</div>
                </button>
                <button type="button" class="wizard-option" data-purpose="gaming">
                    <div class="wizard-option__icon">🎮</div>
                    <div class="wizard-option__label">Gaming & 3D</div>
                </button>
                <button type="button" class="wizard-option" data-purpose="creator">
                    <div class="wizard-option__icon">🎨</div>
                    <div class="wizard-option__label">Content Creation</div>
                </button>
                <button type="button" class="wizard-option" data-purpose="business">
                    <div class="wizard-option__icon">🏢</div>
                    <div class="wizard-option__label">Business & Server</div>
                </button>
                <button type="button" class="wizard-option" data-purpose="home">
                    <div class="wizard-option__icon">🏠</div>
                    <div class="wizard-option__label">Home Tech & TV</div>
                </button>
            </div>
        </div>

        <!-- Step 2: Budget -->
        <div class="wizard-step" id="wizard-step-2">
            <h3 class="wizard-step__title">What is your target budget?</h3>
            <p class="wizard-step__subtitle">We curate the best value per shilling across each tier.</p>

            <div class="wizard-options">
                <button type="button" class="wizard-option" data-budget="under-30k">
                    <div class="wizard-option__icon">💰</div>
                    <div class="wizard-option__label">Under KSh 30,000</div>
                </button>
                <button type="button" class="wizard-option" data-budget="30k-60k">
                    <div class="wizard-option__icon">💳</div>
                    <div class="wizard-option__label">KSh 30,000 – 60,000</div>
                </button>
                <button type="button" class="wizard-option" data-budget="60k-100k">
                    <div class="wizard-option__icon">⭐</div>
                    <div class="wizard-option__label">KSh 60,000 – 100,000</div>
                </button>
                <button type="button" class="wizard-option" data-budget="100k-plus">
                    <div class="wizard-option__icon">🚀</div>
                    <div class="wizard-option__label">KSh 100,000+</div>
                </button>
            </div>

            <div style="margin-top: var(--rm-space-6); text-align: center;">
                <button type="button" class="btn btn-ghost btn-sm" id="wizard-back-1">← Back to Purpose</button>
            </div>
        </div>

        <!-- Step 3: Recommendation Result -->
        <div class="wizard-step" id="wizard-step-3">
            <h3 class="wizard-step__title">Our Recommendation for You</h3>
            <p class="wizard-step__subtitle" id="wizard-result-subtitle">Based on your selection, here is the curated match.</p>

            <div id="wizard-result-card" style="padding: var(--rm-space-6); background: var(--rm-warm-white); border-radius: var(--rm-radius-md); text-align: left; margin-bottom: var(--rm-space-6);">
                <span class="rm-label" id="wizard-rec-category" style="color: var(--rm-accent);">Recommended Match</span>
                <h4 id="wizard-rec-title" style="font-size: 1.25rem; margin: var(--rm-space-2) 0;">Lenovo ThinkPad E14 Gen 6</h4>
                <p id="wizard-rec-desc" style="font-size: var(--rm-text-sm); color: var(--rm-muted); margin-bottom: var(--rm-space-4);">
                    Unmatched keyboard comfort, 16GB DDR5 for intensive multitasking, military-grade durability for commuting in Nairobi.
                </p>
                <div class="flex-between">
                    <span id="wizard-rec-price" style="font-size: 1.25rem; font-weight: 700;">KSh 89,999</span>
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary btn-sm" id="wizard-rec-link">View Product Specs</a>
                </div>
            </div>

            <div style="display: flex; gap: var(--rm-space-3); justify-content: center;">
                <button type="button" class="btn btn-outline btn-sm" id="wizard-restart">Start Over</button>
                <a href="https://wa.me/254728333220?text=Hi%20Realmer,%20I%20used%20your%20Buying%20Guide%20and%20want%20to%20verify%20a%20recommendation" class="btn btn-secondary btn-sm" target="_blank" rel="noopener">
                    Confirm with an Expert
                </a>
            </div>
        </div>
    </div>
</div>
