<?php
/**
 * Realmer Technology — Theme Functions
 *
 * Premium e-commerce theme for Realmer Technology.
 * Technology, Curated.
 *
 * @package Realmer
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

define('REALMER_VERSION', '1.0.0');
define('REALMER_DIR', get_template_directory());
define('REALMER_URI', get_template_directory_uri());

/**
 * =================================================================
 * THEME SETUP
 * =================================================================
 */
function realmer_setup() {
    // Document title
    add_theme_support('title-tag');

    // Post thumbnails
    add_theme_support('post-thumbnails');

    // Custom image sizes
    add_image_size('realmer-hero', 1920, 1080, true);
    add_image_size('realmer-product-card', 600, 600, true);
    add_image_size('realmer-product-large', 1200, 1200, false);
    add_image_size('realmer-editorial', 800, 500, true);
    add_image_size('realmer-brand-logo', 200, 100, false);
    add_image_size('realmer-journal', 640, 400, true);

    // HTML5 support
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ));

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // WooCommerce support
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 600,
        'gallery_thumbnail_image_width' => 200,
        'single_image_width' => 1200,
        'product_grid' => array(
            'default_rows'    => 4,
            'min_rows'        => 1,
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 4,
        ),
    ));
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Menus
    register_nav_menus(array(
        'primary'   => __('Primary Navigation', 'realmer'),
        'utility'   => __('Utility Bar Menu', 'realmer'),
        'footer-shop'    => __('Footer Shop', 'realmer'),
        'footer-support' => __('Footer Support', 'realmer'),
        'footer-company' => __('Footer Company', 'realmer'),
        'footer-connect' => __('Footer Connect', 'realmer'),
    ));

    // Disable Gutenberg block editor for a cleaner frontend
    add_theme_support('editor-styles');

    // Selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'realmer_setup');


/**
 * =================================================================
 * ENQUEUE STYLES & SCRIPTS
 * =================================================================
 */
function realmer_enqueue_assets() {
    // Google Fonts — Inter
    wp_enqueue_style(
        'realmer-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Design System
    wp_enqueue_style(
        'realmer-design-system',
        REALMER_URI . '/assets/css/design-system.css',
        array('realmer-google-fonts'),
        REALMER_VERSION
    );

    // Components
    wp_enqueue_style(
        'realmer-components',
        REALMER_URI . '/assets/css/components.css',
        array('realmer-design-system'),
        REALMER_VERSION
    );

    // WooCommerce overrides
    if (class_exists('WooCommerce')) {
        wp_enqueue_style(
            'realmer-woocommerce',
            REALMER_URI . '/assets/css/woocommerce.css',
            array('realmer-components'),
            REALMER_VERSION
        );
    }

    // Responsive
    wp_enqueue_style(
        'realmer-responsive',
        REALMER_URI . '/assets/css/responsive.css',
        array('realmer-components'),
        REALMER_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'realmer-main',
        REALMER_URI . '/assets/js/main.js',
        array('jquery'),
        REALMER_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('realmer-main', 'realmerAjax', array(
        'ajaxurl'   => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('realmer_nonce'),
        'cartUrl'   => wc_get_cart_url(),
        'shopUrl'   => wc_get_page_permalink('shop'),
    ));
}
add_action('wp_enqueue_scripts', 'realmer_enqueue_assets');


/**
 * =================================================================
 * WIDGET AREAS
 * =================================================================
 */
function realmer_widgets_init() {
    register_sidebar(array(
        'name'          => __('Shop Sidebar', 'realmer'),
        'id'            => 'shop-sidebar',
        'description'   => __('Filters and widgets for the shop page.', 'realmer'),
        'before_widget' => '<div id="%1$s" class="realmer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'realmer_widgets_init');


/**
 * Safe Term Link Resolver
 *
 * Prevents WP_Error objects from breaking esc_url() when category terms are absent or modified.
 */
function realmer_get_term_url($slug, $taxonomy = 'product_cat') {
    if (empty($slug)) return home_url('/shop/');

    $term = get_term_by('slug', $slug, $taxonomy);
    if (!$term || is_wp_error($term)) {
        $term = get_term_by('name', $slug, $taxonomy);
    }

    if ($term && !is_wp_error($term)) {
        $link = get_term_link($term, $taxonomy);
        if (!is_wp_error($link)) {
            return $link;
        }
    }

    return home_url('/product-category/' . sanitize_title($slug) . '/');
}

/**
 * =================================================================
 * AJAX: SMART SEARCH
 * =================================================================
 */
function realmer_ajax_search() {
    // Verify nonce if provided; fail silently on guest cache miss to allow public read-only search
    if (isset($_POST['nonce']) && !empty($_POST['nonce'])) {
        wp_verify_nonce($_POST['nonce'], 'realmer_nonce');
    }

    $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

    if (strlen($query) < 2) {
        wp_send_json_success(array('products' => [], 'categories' => [], 'brands' => []));
        return;
    }

    // Search products
    $products = new WP_Query(array(
        'post_type'      => 'product',
        'posts_per_page' => 6,
        's'              => $query,
        'post_status'    => 'publish',
    ));

    $product_results = array();
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            $product = wc_get_product(get_the_ID());
            $product_results[] = array(
                'id'        => get_the_ID(),
                'title'     => get_the_title(),
                'url'       => get_permalink(),
                'price'     => $product ? $product->get_price_html() : '',
                'image'     => get_the_post_thumbnail_url(get_the_ID(), 'realmer-product-card'),
                'brand'     => realmer_get_product_brand($product),
            );
        }
        wp_reset_postdata();
    }

    // Search categories
    $categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'name__like' => $query,
        'number'     => 5,
        'hide_empty' => true,
    ));

    $category_results = array();
    if (!is_wp_error($categories) && !empty($categories)) {
        foreach ($categories as $cat) {
            $category_results[] = array(
                'name'  => $cat->name,
                'count' => $cat->count,
                'url'   => realmer_get_term_url($cat->slug, 'product_cat'),
            );
        }
    }

    wp_send_json_success(array(
        'products'   => $product_results,
        'categories' => $category_results,
    ));
}
add_action('wp_ajax_realmer_search', 'realmer_ajax_search');
add_action('wp_ajax_nopriv_realmer_search', 'realmer_ajax_search');


/**
 * =================================================================
 * AJAX: CART DRAWER
 * =================================================================
 */
function realmer_update_cart_drawer() {
    check_ajax_referer('realmer_nonce', 'nonce');

    ob_start();
    get_template_part('template-parts/cart-drawer-content');
    $html = ob_get_clean();

    $cart_count = WC()->cart->get_cart_contents_count();
    $cart_total = WC()->cart->get_cart_total();

    wp_send_json_success(array(
        'html'       => $html,
        'cart_count'  => $cart_count,
        'cart_total'  => $cart_total,
    ));
}
add_action('wp_ajax_realmer_cart_drawer', 'realmer_update_cart_drawer');
add_action('wp_ajax_nopriv_realmer_cart_drawer', 'realmer_update_cart_drawer');


/**
 * =================================================================
 * AJAX: ADD TO CART
 * =================================================================
 */
function realmer_ajax_add_to_cart() {
    check_ajax_referer('realmer_nonce', 'nonce');

    $product_id = absint($_POST['product_id']);
    $quantity   = absint($_POST['quantity'] ?? 1);

    if (!$product_id) {
        wp_send_json_error('Invalid product.');
        return;
    }

    $added = WC()->cart->add_to_cart($product_id, $quantity);

    if ($added) {
        ob_start();
        get_template_part('template-parts/cart-drawer-content');
        $html = ob_get_clean();

        wp_send_json_success(array(
            'html'       => $html,
            'cart_count'  => WC()->cart->get_cart_contents_count(),
            'cart_total'  => WC()->cart->get_cart_total(),
        ));
    } else {
        wp_send_json_error('Could not add to cart.');
    }
}
add_action('wp_ajax_realmer_add_to_cart', 'realmer_ajax_add_to_cart');
add_action('wp_ajax_nopriv_realmer_add_to_cart', 'realmer_ajax_add_to_cart');


/**
 * =================================================================
 * HELPERS
 * =================================================================
 */

/**
 * Get product brand (from pa_brand attribute or custom taxonomy)
 */
function realmer_get_product_brand($product) {
    if (!$product) return '';

    // Try WooCommerce brand attribute
    $brand = $product->get_attribute('pa_brand');
    if ($brand) return $brand;

    // Try brand taxonomy
    $brands = get_the_terms($product->get_id(), 'product_brand');
    if ($brands && !is_wp_error($brands)) {
        return $brands[0]->name;
    }

    return '';
}

/**
 * Format KSh price display
 */
function realmer_format_price($price) {
    return 'KSh ' . number_format((float)$price, 0, '.', ',');
}

/**
 * Get product savings amount
 */
function realmer_get_savings($product) {
    if (!$product->is_on_sale()) return false;

    $regular = (float) $product->get_regular_price();
    $sale    = (float) $product->get_sale_price();

    if ($regular && $sale && $regular > $sale) {
        return $regular - $sale;
    }

    return false;
}

/**
 * Custom excerpt for products
 */
function realmer_product_short_desc($product, $length = 80) {
    $desc = $product->get_short_description();
    if (!$desc) $desc = $product->get_description();
    $desc = wp_strip_all_tags($desc);
    if (strlen($desc) > $length) {
        $desc = substr($desc, 0, $length) . '…';
    }
    return $desc;
}


/**
 * =================================================================
 * JOURNAL CUSTOM POST TYPE
 * =================================================================
 */
function realmer_register_journal_cpt() {
    register_post_type('journal', array(
        'labels' => array(
            'name'          => __('Journal', 'realmer'),
            'singular_name' => __('Article', 'realmer'),
            'add_new_item'  => __('Add New Article', 'realmer'),
            'edit_item'     => __('Edit Article', 'realmer'),
            'all_items'     => __('All Articles', 'realmer'),
            'menu_name'     => __('Journal', 'realmer'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'journal'),
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'menu_icon'    => 'dashicons-welcome-write-blog',
        'show_in_rest' => true,
    ));

    register_taxonomy('journal_category', 'journal', array(
        'labels' => array(
            'name'          => __('Journal Categories', 'realmer'),
            'singular_name' => __('Category', 'realmer'),
        ),
        'hierarchical' => true,
        'rewrite'      => array('slug' => 'journal-category'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'realmer_register_journal_cpt');


/**
 * =================================================================
 * WOOCOMMERCE CUSTOMIZATIONS
 * =================================================================
 */

// Remove default WooCommerce styles
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Custom WooCommerce wrapper
function realmer_wc_wrapper_start() {
    echo '<div class="realmer-shop-wrapper">';
}
function realmer_wc_wrapper_end() {
    echo '</div>';
}
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'realmer_wc_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'realmer_wc_wrapper_end', 10);

// Remove default sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Customize products per page
add_filter('loop_shop_per_page', function() { return 24; });

// Remove default product meta
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Change sale flash to show savings
add_filter('woocommerce_sale_flash', 'realmer_custom_sale_flash', 10, 3);
function realmer_custom_sale_flash($html, $post, $product) {
    $savings = realmer_get_savings($product);
    if ($savings) {
        return '<span class="realmer-sale-badge">Save ' . realmer_format_price($savings) . '</span>';
    }
    return '';
}

// Currency formatting
add_filter('woocommerce_currency_symbol', function($symbol, $currency) {
    if ($currency === 'KES') return 'KSh ';
    return $symbol;
}, 10, 2);

// Remove "Add to Cart" text and use icon on archive pages
add_filter('woocommerce_product_add_to_cart_text', function() {
    return __('Add to Cart', 'realmer');
});


/**
 * =================================================================
 * PRODUCT COMPARISON (stored in session/cookie)
 * =================================================================
 */
function realmer_ajax_toggle_compare() {
    check_ajax_referer('realmer_nonce', 'nonce');

    $product_id = absint($_POST['product_id']);
    $compare = isset($_COOKIE['realmer_compare']) ? json_decode(stripslashes($_COOKIE['realmer_compare']), true) : array();

    if (!is_array($compare)) $compare = array();

    if (in_array($product_id, $compare)) {
        $compare = array_diff($compare, array($product_id));
        $action = 'removed';
    } else {
        if (count($compare) >= 4) {
            wp_send_json_error('Maximum 4 products can be compared.');
            return;
        }
        $compare[] = $product_id;
        $action = 'added';
    }

    setcookie('realmer_compare', json_encode(array_values($compare)), time() + 86400, '/');

    wp_send_json_success(array(
        'action' => $action,
        'compare_list' => $compare,
        'count' => count($compare),
    ));
}
add_action('wp_ajax_realmer_toggle_compare', 'realmer_ajax_toggle_compare');
add_action('wp_ajax_nopriv_realmer_toggle_compare', 'realmer_ajax_toggle_compare');


/**
 * =================================================================
 * BREADCRUMB CUSTOMIZATION
 * =================================================================
 */
add_filter('woocommerce_breadcrumb_defaults', function($defaults) {
    $defaults['delimiter']   = ' <span class="breadcrumb-sep">›</span> ';
    $defaults['wrap_before'] = '<nav class="realmer-breadcrumb" aria-label="Breadcrumb"><div class="container">';
    $defaults['wrap_after']  = '</div></nav>';
    return $defaults;
});


/**
 * =================================================================
 * DISABLE UNNECESSARY FEATURES
 * =================================================================
 */

// Remove WordPress emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove WP embed
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove shortlink
remove_action('wp_head', 'wp_shortlink_wp_head');

// Clean up head
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
