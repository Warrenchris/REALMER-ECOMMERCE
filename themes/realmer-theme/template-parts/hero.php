<?php
/**
 * Template Part: Hero Section
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content">
            <span class="hero__tagline">Technology, Curated</span>
            <h1 class="hero__title">
                The right technology for work, play and <span>everything</span> in between.
            </h1>
            <p class="hero__description">
                Experience high-performance computing, enterprise networking, and modern workplace essentials — curated with precision and delivered across Kenya.
            </p>
            <div class="hero__actions">
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-primary btn-lg">
                    Shop Technology
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <button type="button" class="btn btn-outline btn-lg" id="hero-wizard-btn">
                    Find What Fits You
                </button>
            </div>
        </div>
        <div class="hero__image">
            <img src="<?php echo esc_url(REALMER_URI . '/assets/images/hero-product.jpg'); ?>" alt="Curated Technology by Realmer — High performance laptop, mouse, and audio setup" width="800" height="533" loading="eager">
        </div>
    </div>
</section>
