<?php
/**
 * Single Journal Article Template
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();

while (have_posts()) :
    the_post();
?>

<article id="journal-<?php the_ID(); ?>" class="section">
    <div class="container container-sm">
        <header class="section-header" style="margin-bottom: var(--rm-space-8);">
            <span class="rm-overline" style="color: var(--rm-accent);">The Realmer Journal</span>
            <h1 class="rm-heading-page" style="margin-bottom: var(--rm-space-4);"><?php the_title(); ?></h1>
            <div class="rm-text-sm" style="color: var(--rm-muted);">
                Published on <?php echo get_the_date('F j, Y'); ?> by Realmer Technology Editorial Desk
            </div>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div style="border-radius: var(--rm-radius-md); overflow: hidden; margin-bottom: var(--rm-space-8);">
                <?php the_post_thumbnail('realmer-hero', array('style' => 'width:100%; height:auto;')); ?>
            </div>
        <?php endif; ?>

        <div class="page-content" style="line-height: 1.8; color: var(--rm-obsidian); font-size: var(--rm-text-md);">
            <?php the_content(); ?>
        </div>

        <div style="margin-top: var(--rm-space-12); padding-top: var(--rm-space-8); border-top: 1px solid var(--rm-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--rm-space-4);">
            <div>
                <strong>Need hardware mentioned in this guide?</strong>
                <div class="rm-text-sm" style="color: var(--rm-muted);">Contact our technical desk on Biashara Street for pricing.</div>
            </div>
            <a href="https://wa.me/254728333220?text=Hi%20Realmer,%20I'm%20reading%20your%20article%20on%20<?php echo urlencode(get_the_title()); ?>" class="btn btn-primary btn-sm" target="_blank" rel="noopener">
                Ask an Engineer
            </a>
        </div>
    </div>
</article>

<?php
endwhile;

get_footer();
