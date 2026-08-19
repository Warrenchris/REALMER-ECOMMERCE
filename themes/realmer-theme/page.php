<?php
/**
 * Standard Page Template
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;

get_header();

while (have_posts()) :
    the_post();
?>

<div class="section">
    <div class="container container-sm">
        <header class="section-header" style="margin-bottom: var(--rm-space-8);">
            <h1 class="rm-heading-page"><?php the_title(); ?></h1>
        </header>

        <div class="page-content" style="line-height: 1.8; color: var(--rm-obsidian);">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
endwhile;

get_footer();
