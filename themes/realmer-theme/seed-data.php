if (!defined('ABSPATH')) {
    $wp_load = '/var/www/html/wp-load.php';
    if (file_exists($wp_load)) {
        require_once($wp_load);
    }
}

// 1. Set WooCommerce Currency
update_option('woocommerce_currency', 'KES');
update_option('woocommerce_currency_pos', 'left_space');
update_option('woocommerce_price_thousand_sep', ',');
update_option('woocommerce_price_decimal_sep', '.');
update_option('woocommerce_price_num_decimals', 0);
update_option('woocommerce_enable_ajax_add_to_cart', 'yes');

// 2. Set Front Page
$front_page_id = get_option('page_on_front');
if (!$front_page_id) {
    $existing_front = get_page_by_path('home');
    if ($existing_front) {
        $front_page_id = $existing_front->ID;
    } else {
        $front_page_id = wp_insert_post(array(
            'post_title'   => 'Home',
            'post_name'    => 'home',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ));
    }
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id);
}

// 3. Create Custom Pages (Idempotent)
$custom_pages = array(
    array('title' => 'Deals', 'slug' => 'deals', 'template' => 'page-deals.php'),
    array('title' => 'Bundles', 'slug' => 'bundles', 'template' => 'page-bundles.php'),
    array('title' => 'Business Solutions', 'slug' => 'business', 'template' => 'page-business.php'),
    array('title' => 'Networking', 'slug' => 'networking', 'template' => 'page-networking.php'),
    array('title' => 'About Realmer', 'slug' => 'about', 'template' => 'page-about.php'),
    array('title' => 'Track Order', 'slug' => 'track-order', 'template' => 'page-track-order.php'),
    array('title' => 'Warranty Policy', 'slug' => 'warranty', 'template' => 'page-warranty.php'),
    array('title' => 'Delivery Information', 'slug' => 'delivery-information', 'template' => 'page-delivery-information.php'),
    array('title' => 'Payment Options', 'slug' => 'payment-options', 'template' => 'page-payment-options.php'),
    array('title' => 'Help & FAQs', 'slug' => 'help', 'template' => 'page.php'),
);

foreach ($custom_pages as $cp) {
    $page = get_page_by_path($cp['slug']);
    if (!$page) {
        $page = get_page_by_title($cp['title'], OBJECT, 'page');
    }

    if (!$page) {
        $pid = wp_insert_post(array(
            'post_title'   => $cp['title'],
            'post_name'    => $cp['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ));
    } else {
        $pid = $page->ID;
    }

    if ($pid && $cp['template'] !== 'page.php') {
        update_post_meta($pid, '_wp_page_template', $cp['template']);
    }
}

// 4. Create Product Categories
$cats = array(
    'Laptops' => 'laptops',
    'Desktops' => 'desktops',
    'Phones & Tablets' => 'phones-tablets',
    'Networking' => 'networking',
    'Printers' => 'printers',
    'Accessories' => 'laptop-accessories',
    'Servers' => 'servers',
    'Televisions' => 'televisions',
    'Cameras' => 'cameras',
    'Games' => 'games',
    'POS' => 'pos',
    'Security Cameras' => 'security-cameras',
);

$cat_ids = array();
foreach ($cats as $name => $slug) {
    $term = get_term_by('slug', $slug, 'product_cat');
    if (!$term) {
        $res = wp_insert_term($name, 'product_cat', array('slug' => $slug));
        if (!is_wp_error($res)) {
            $cat_ids[$slug] = $res['term_id'];
        }
    } else {
        $cat_ids[$slug] = $term->term_id;
    }
}

// 5. Create Sample Curated Products
$sample_products = array(
    array(
        'name' => 'Lenovo ThinkPad E14 Gen 6',
        'cat' => 'laptops',
        'regular' => 98000,
        'sale' => 89999,
        'short' => '14" WUXGA IPS · Intel Core Ultra 5 · 16GB DDR5 · 512GB NVMe SSD · 12-hour Battery',
        'desc' => 'The Lenovo ThinkPad E14 Gen 6 delivers enterprise-grade reliability, military-tested aluminum durability, and the legendary ThinkPad backlit keyboard with TrackPoint. Powered by the Intel Core Ultra 5 processor with integrated AI acceleration.',
        'brand' => 'Lenovo',
    ),
    array(
        'name' => 'HP ProBook 450 G10',
        'cat' => 'laptops',
        'regular' => 115000,
        'sale' => 104999,
        'short' => '15.6" FHD · Intel Core i7 13th Gen · 16GB RAM · 512GB SSD · Numeric Keypad',
        'desc' => 'Engineered for commercial productivity, the HP ProBook 450 G10 offers commercial-grade security with HP Wolf Security, durable aluminum-reinforced keyboard deck, and fast Wi-Fi 6E connectivity.',
        'brand' => 'HP',
    ),
    array(
        'name' => 'Dell Latitude 5440 Enterprise',
        'cat' => 'laptops',
        'regular' => 94500,
        'sale' => '',
        'short' => '14" FHD Non-Touch · Intel Core i5-1335U · 16GB DDR5 · 512GB NVMe SSD · Thunderbolt 4',
        'desc' => 'Work from anywhere with Dell\'s most scalable Latitude laptop. Featuring advanced thermal design, intelligent battery charging, and dual USB-C Thunderbolt 4 ports.',
        'brand' => 'Dell',
    ),
    array(
        'name' => 'TP-Link Archer AX73 Wi-Fi 6 Router',
        'cat' => 'networking',
        'regular' => 21000,
        'sale' => 18500,
        'short' => 'AX5400 Dual-Band Gigabit · 6 High-Gain Antennas · OneMesh Support · HomeShield Security',
        'desc' => 'Equipped with top-structure 4T4R and HE160 on the 5 GHz band to enable 4.8 Gbps ultra-fast connections. Connects up to 200+ devices simultaneously without latency spikes.',
        'brand' => 'TP-Link',
    ),
    array(
        'name' => 'Epson EcoTank L3250 Wi-Fi All-in-One',
        'cat' => 'printers',
        'regular' => 31000,
        'sale' => 27999,
        'short' => 'Print, Scan, Copy · Wireless Wi-Fi Direct · Ultra-low cost ink tank (up to 4,500 black pages)',
        'desc' => 'Designed for home and small business efficiency, the Epson EcoTank L3250 features mess-free ink refilling bottles and wireless printing via the Epson Smart Panel app.',
        'brand' => 'Epson',
    ),
    array(
        'name' => 'APC Easy UPS BVX 1200VA 230V',
        'cat' => 'laptop-accessories',
        'regular' => 19800,
        'sale' => '',
        'short' => '6 Universal Battery & Surge Outlets · Automatic Voltage Regulation (AVR) · 650 Watts',
        'desc' => 'Protects critical desktop PCs, NAS storage, routers, and POS systems from damaging power surges, spikes, and blackout outages in Kenya.',
        'brand' => 'APC',
    ),
    array(
        'name' => 'Apple MacBook Air 13" M3 (16GB / 512GB)',
        'cat' => 'laptops',
        'regular' => 165000,
        'sale' => 149999,
        'short' => 'Liquid Retina Display · Apple M3 8-core CPU / 10-core GPU · MagSafe 3 · Space Gray',
        'desc' => 'Supercharged by the next-generation M3 chip, the MacBook Air delivers incredible power efficiency, fanless silent operation, and up to 18 hours of battery life.',
        'brand' => 'Apple',
    ),
    array(
        'name' => 'Logitech MX Master 3S Performance Mouse',
        'cat' => 'laptop-accessories',
        'regular' => 16000,
        'sale' => 14500,
        'short' => '8K DPI Any-Surface Tracking · Quiet Clicks · MagSpeed Electromagnetic Scroll · Bluetooth/Bolt',
        'desc' => 'An icon remastered. Feel every moment of your workflow with even more precision, tactility, and performance, thanks to Quiet Clicks and an 8,000 DPI track-on-glass sensor.',
        'brand' => 'Logitech',
    )
);

foreach ($sample_products as $sp) {
    $existing = get_page_by_title($sp['name'], OBJECT, 'product');
    if (!$existing) {
        $product = new WC_Product_Simple();
        $product->set_name($sp['name']);
        $product->set_status('publish');
        $product->set_catalog_visibility('visible');
        $product->set_description($sp['desc']);
        $product->set_short_description($sp['short']);
        $product->set_regular_price($sp['regular']);
        if (!empty($sp['sale'])) {
            $product->set_sale_price($sp['sale']);
            $product->set_price($sp['sale']);
        } else {
            $product->set_price($sp['regular']);
        }
        $product->set_manage_stock(false);
        $product->set_stock_status('instock');

        if (isset($cat_ids[$sp['cat']])) {
            $product->set_category_ids(array($cat_ids[$sp['cat']]));
        }

        $pid = $product->save();

        if ($pid) {
            update_post_meta($pid, 'pa_brand', $sp['brand']);
        }
    }
}

// 6. Create Sample Journal Posts
$sample_articles = array(
    array(
        'title'   => 'Which laptop should you buy for university & remote work in Kenya?',
        'excerpt' => 'A breakdown of battery longevity, keyboard durability, and budget tiers from KSh 40,000 to KSh 120,000.',
        'content' => '<p>Choosing the right laptop in Kenya requires considering local factors: frequent travel, battery endurance during commutes, keyboard durability, and availability of genuine replacement components.</p><p>For engineering and computer science students, we strongly recommend a minimum of 16GB RAM and a high-efficiency Intel Core Ultra 5 or AMD Ryzen 7 processor. For business executives, the ThinkPad E-series and HP ProBook series offer the best price-to-durability ratio.</p>',
    ),
    array(
        'title'   => 'Wi-Fi 6 vs Wi-Fi 7: What actually matters for home & office fiber?',
        'excerpt' => 'Cutting through marketing jargon: channel width, MU-MIMO, and real-world throughput through concrete walls.',
        'content' => '<p>With Kenyan fiber internet speeds reaching 100Mbps to 1Gbps, standard ISP-provided routers often become the primary bottleneck. Upgrading to a Wi-Fi 6 or Wi-Fi 7 mesh architecture ensures ultra-low latency and consistent coverage across multi-story buildings and concrete partitions.</p>',
    ),
    array(
        'title'   => 'How to size a UPS and surge protector for your Nairobi office setup',
        'excerpt' => 'Calculating VA vs Wattage requirements to protect high-end laptops, iMacs, and enterprise NAS servers.',
        'content' => '<p>Power fluctuations and surges can damage delicate PCB components on motherboards and storage drives. A line-interactive UPS with Automatic Voltage Regulation (AVR) from trusted brands like APC and Mercury smooths out voltage spikes and provides crucial runtime to save active work.</p>',
    )
);

foreach ($sample_articles as $art) {
    $existing = get_page_by_title($art['title'], OBJECT, 'journal');
    if (!$existing) {
        wp_insert_post(array(
            'post_title'   => $art['title'],
            'post_excerpt' => $art['excerpt'],
            'post_content' => $art['content'],
            'post_status'  => 'publish',
            'post_type'    => 'journal',
        ));
    }
}

echo "REALMER_SETUP_COMPLETE\n";
