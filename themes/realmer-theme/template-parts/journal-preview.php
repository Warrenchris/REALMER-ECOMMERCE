<?php
/**
 * Template Part: The Realmer Journal Preview
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

// Query recent journal posts or fallback to rich editorial samples
$journal_query = new WP_Query(array(
    'post_type'      => array('journal', 'post'),
    'posts_per_page' => 3,
    'post_status'    => 'publish',
));
?>
<section class="section" id="journal-preview">
    <div class="container">
        <div class="flex-between" style="margin-bottom: var(--rm-space-8); flex-wrap: wrap; gap: var(--rm-space-4);">
            <div>
                <span class="rm-overline">Editorial & Insights</span>
                <h2 class="rm-heading-section" style="margin-bottom: 0;">The Realmer Journal</h2>
            </div>
            <a href="<?php echo esc_url(home_url('/journal')); ?>" class="btn btn-outline btn-sm">
                View All Articles
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="journal-cards">
            <?php
            if ($journal_query->have_posts()) :
                while ($journal_query->have_posts()) :
                    $journal_query->the_post();
            ?>
                <a href="<?php the_permalink(); ?>" class="journal-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="journal-card__image">
                            <?php the_post_thumbnail('realmer-journal'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="journal-card__body">
                        <span class="journal-card__category">Hardware Guide</span>
                        <h3 class="journal-card__title"><?php the_title(); ?></h3>
                        <p class="journal-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                        <span class="journal-card__meta"><?php echo get_the_date('M j, Y'); ?></span>
                    </div>
                </a>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                $mock_articles = array(
                    array(
                        'cat'     => 'Buying Guide',
                        'title'   => 'Which laptop should you buy for university & remote work in Kenya?',
                        'excerpt' => 'A breakdown of battery longevity, keyboard durability, and budget tiers from KSh 40,000 to KSh 120,000.',
                        'date'    => 'August 2026',
                    ),
                    array(
                        'cat'     => 'Networking',
                        'title'   => 'Wi-Fi 6 vs Wi-Fi 7: What actually matters for home & office fiber?',
                        'excerpt' => 'Cutting through marketing jargon: channel width, MU-MIMO, and real-world throughput through concrete walls.',
                        'date'    => 'August 2026',
                    ),
                    array(
                        'cat'     => 'Power Protection',
                        'title'   => 'How to size a UPS and surge protector for your Nairobi office setup',
                        'excerpt' => 'Calculating VA vs Wattage requirements to protect high-end laptops, iMacs, and enterprise NAS servers.',
                        'date'    => 'July 2026',
                    ),
                );

                foreach ($mock_articles as $article) :
            ?>
                <a href="<?php echo esc_url(home_url('/journal')); ?>" class="journal-card">
                    <div class="journal-card__body">
                        <span class="journal-card__category"><?php echo esc_html($article['cat']); ?></span>
                        <h3 class="journal-card__title"><?php echo esc_html($article['title']); ?></h3>
                        <p class="journal-card__excerpt"><?php echo esc_html($article['excerpt']); ?></p>
                        <span class="journal-card__meta"><?php echo esc_html($article['date']); ?> · 4 min read</span>
                    </div>
                </a>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
