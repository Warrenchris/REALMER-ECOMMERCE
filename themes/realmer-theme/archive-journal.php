<?php
/**
 * Archive Template for Realmer Journal (Articles)
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section" id="journal-archive">
    <div class="container">
        <header class="section-header">
            <span class="rm-overline" style="color: var(--rm-accent);">Tech Insights & Buying Guides</span>
            <h1 class="rm-heading-page">The Realmer Journal</h1>
            <p class="section-subtitle">Deep dives, hardware reviews, network setup guides, and buying advice from tech specialists in Nairobi, Kenya.</p>
        </header>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--rm-space-8);">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                <article style="background: var(--rm-warm-white); border-radius: var(--rm-radius-md); overflow: hidden; border: 1px solid var(--rm-border-color); display: flex; flex-direction: column;">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('realmer-journal', array('style' => 'width:100%; height:200px; object-fit:cover;')); ?>
                        </a>
                    <?php else : ?>
                        <div style="height:200px; background:var(--rm-soft-gray); display:flex; align-items:center; justify-content:center; color:var(--rm-muted); font-size:2rem;">💻</div>
                    <?php endif; ?>
                    <div style="padding: var(--rm-space-6); display: flex; flex-direction: column; flex-grow: 1;">
                        <span class="rm-overline" style="font-size:0.75rem; margin-bottom: var(--rm-space-2);"><?php echo get_the_date(); ?></span>
                        <h3 style="font-size: var(--rm-text-lg); margin-bottom: var(--rm-space-3); line-height: 1.4;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--rm-obsidian); text-decoration: none;"><?php the_title(); ?></a>
                        </h3>
                        <p class="rm-text-sm" style="color: var(--rm-muted); margin-bottom: var(--rm-space-4); flex-grow: 1;">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="rm-text-sm" style="font-weight: 600; color: var(--rm-accent);">Read Article →</a>
                    </div>
                </article>
            <?php
                endwhile;
            else :
            ?>
                <p>No articles found. Check back soon for new technical guides.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
