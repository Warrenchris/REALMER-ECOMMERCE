<?php
/**
 * Main Index Template
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="section-header">
                <h1 class="rm-heading-page"><?php single_post_title(); ?></h1>
            </div>

            <div class="journal-cards">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <div style="padding: var(--rm-space-12) 0; text-align: center;">
                <h2>No entries found</h2>
                <p class="rm-text-muted">There is currently no content published in this section.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Return Home</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
