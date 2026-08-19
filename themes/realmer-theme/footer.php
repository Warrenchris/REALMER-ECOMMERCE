<?php
/**
 * Theme Footer
 *
 * @package Realmer
 */

defined('ABSPATH') || exit;
?>
    </main><!-- #content -->

    <!-- Site Footer -->
    <footer class="site-footer" role="contentinfo">
        <!-- Editorial Statement -->
        <div class="footer-statement">
            <div class="container">
                <div class="footer-statement__text">
                    Technology, curated for modern life and business in Kenya.
                </div>
            </div>
        </div>

        <!-- Links Columns -->
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column">
                    <h5>Shop</h5>
                    <ul>
                        <li><a href="<?php echo esc_url(realmer_get_term_url('laptops')); ?>">Computers & Laptops</a></li>
                        <li><a href="<?php echo esc_url(realmer_get_term_url('phones-tablets')); ?>">Phones & Tablets</a></li>
                        <li><a href="<?php echo esc_url(realmer_get_term_url('networking')); ?>">Networking & Wi-Fi</a></li>
                        <li><a href="<?php echo esc_url(realmer_get_term_url('printers')); ?>">Printers & POS</a></li>
                        <li><a href="<?php echo esc_url(realmer_get_term_url('laptop-accessories')); ?>">Accessories & Audio</a></li>
                        <li><a href="<?php echo esc_url(home_url('/business')); ?>">Business Solutions</a></li>
                        <li><a href="<?php echo esc_url(home_url('/deals')); ?>">Curated Deals</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/track-order')); ?>">Track Your Order</a></li>
                        <li><a href="<?php echo esc_url(home_url('/warranty')); ?>">Warranty & Returns</a></li>
                        <li><a href="<?php echo esc_url(home_url('/delivery-information')); ?>">Delivery Coverage</a></li>
                        <li><a href="<?php echo esc_url(home_url('/payment-options')); ?>">M-Pesa & Payment FAQs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Technical Support</a></li>
                        <li><a href="https://wa.me/254728333220" target="_blank" rel="noopener">Chat on WhatsApp</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Realmer</a></li>
                        <li><a href="<?php echo esc_url(home_url('/journal')); ?>">The Realmer Journal</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Store Location: Bazaar Plaza, Nairobi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/business')); ?>">Corporate Sales & B2B</a></li>
                        <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms')); ?>">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h5>Connect & Contact</h5>
                    <ul>
                        <li><strong style="color: #fff;">0728 333 220</strong></li>
                        <li><strong style="color: #fff;">0745 398 800</strong></li>
                        <li><a href="mailto:sales@realmer.co.ke">sales@realmer.co.ke</a></li>
                        <li><span style="color: rgba(255,255,255,0.5);">Bazaar Plaza, 4th Flr, Door 3, Biashara St, Nairobi CBD</span></li>
                        <li style="margin-top: 10px;">
                            <a href="https://wa.me/254728333220" class="btn btn-sm btn-primary" style="display:inline-flex; width:auto; text-decoration:none;">
                                WhatsApp Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom__left">
                    <span>&copy; <?php echo date('Y'); ?> Realmer Technology Limited. All rights reserved.</span>
                    <span>•</span>
                    <span>Nairobi, Kenya</span>
                </div>
                <div class="footer-payment-methods">
                    <span>M-Pesa</span>
                    <span>Visa</span>
                    <span>Mastercard</span>
                    <span>Bank Transfer</span>
                    <span>Cash on Delivery (CBD)</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp CTA -->
    <a href="https://wa.me/254728333220?text=Hi%20Realmer%20Technology,%20I'd%20like%20guidance%20on%20a%20product" class="whatsapp-float" target="_blank" rel="noopener" aria-label="Chat with a Realmer Technology Expert on WhatsApp">
        <svg viewBox="0 0 24 24" fill="currentColor" width="28" height="28">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
    </a>

    <!-- Mobile Bottom Sticky Navigation -->
    <nav class="mobile-bottom-nav" aria-label="Mobile Navigation">
        <ul class="mobile-bottom-nav__items">
            <li>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-bottom-nav__item <?php echo is_front_page() ? 'active' : ''; ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="mobile-bottom-nav__item <?php echo (function_exists('is_shop') && is_shop()) ? 'active' : ''; ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    <span>Shop</span>
                </a>
            </li>
            <li>
                <button class="mobile-bottom-nav__item" id="mobile-search-trigger" style="background:none; border:none; cursor:pointer;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <span>Search</span>
                </button>
            </li>
            <li>
                <button class="mobile-bottom-nav__item" id="mobile-wizard-trigger" style="background:none; border:none; cursor:pointer;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="12 8 8 12 12 16 12 8"/></svg>
                    <span>Guide</span>
                </button>
            </li>
            <li>
                <button class="mobile-bottom-nav__item" id="mobile-cart-trigger" style="background:none; border:none; cursor:pointer;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    <span>Cart</span>
                    <?php if (class_exists('WooCommerce') && WC()->cart) : ?>
                        <?php $m_cart_count = WC()->cart->get_cart_contents_count(); ?>
                        <span class="count-badge cart-count" <?php echo $m_cart_count === 0 ? 'style="display:none;"' : ''; ?>>
                            <?php echo esc_html($m_cart_count); ?>
                        </span>
                    <?php endif; ?>
                </button>
            </li>
        </ul>
    </nav>

    <!-- Product Recommendation Wizard Overlay -->
    <?php get_template_part('template-parts/recommendation-wizard'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
