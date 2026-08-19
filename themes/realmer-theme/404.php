<?php
/**
 * 404 Not Found Template
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" style="padding: var(--rm-space-24) 0; text-align: center;">
    <div class="container container-sm">
        <span class="rm-overline" style="color: var(--rm-accent);">Error 404</span>
        <h1 class="rm-display" style="margin-bottom: var(--rm-space-4);">Page not found.</h1>
        <p class="rm-text-md" style="margin-bottom: var(--rm-space-8);">
            The technology or page you are searching for might have moved, or the link may be outdated.
        </p>
        <div style="display: flex; gap: var(--rm-space-4); justify-content: center;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">Return to Homepage</a>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-outline btn-lg">Browse Catalog</a>
        </div>
    </div>
</div>

<?php
get_footer();
