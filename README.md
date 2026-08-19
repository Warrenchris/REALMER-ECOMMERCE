# Realmer Technology — Premium E-Commerce Platform

A premium, editorial, conversion-focused WordPress & WooCommerce e-commerce experience tailored for the Kenyan technology market.

> **Brand Positioning:** *REALMER — Technology, Curated.*

---

## 🚀 Key Features

- **Custom WordPress Theme (`realmer-theme`):** Pure PHP/CSS/JS with zero dependency on visual page builders like Elementor.
- **Design System:** Obsidian (`#111111`), graphite, warm-white (`#F7F5F0`), and soft-gray palette with the preserved Realmer yellow accent (`#FED800`) used with discipline.
- **Kenyan Commerce Ready:** KSh currency formatting, Safaricom M-Pesa STK Push UX, CBD free shipping, and nationwide courier delivery indicators.
- **Smart Search Overlay:** Fullscreen blurred modal with instant suggested queries and debounced live AJAX product & category search.
- **Interactive Slide-Out Cart Drawer:** Live subtotal, free CBD delivery notice, and quick checkout navigation.
- **Smart Recommendation Wizard:** Interactive 3-step decision tree answering *"What should I buy?"* based on use case and budget.
- **Editorial Technology Sections:** "Shop by Need" tiles, curated setups ("What's worth knowing"), horizontal product rails, B2B corporate section, and The Realmer Journal.
- **Mobile First:** Dedicated bottom navigation bar with thumb-accessible search, guide, and cart drawer.

---

## 🛠️ Quick Start with Docker

### 1. Clone the repository
```bash
git clone https://github.com/Warrenchris/REALMER-ECOMMERCE.git
cd REALMER-ECOMMERCE
```

### 2. Configure Environment
```bash
cp .env.example .env
```

### 3. Start Containers
```bash
docker compose up -d
```

### 4. Access URLs
- **Storefront:** [http://localhost:8080/](http://localhost:8080/)
- **WordPress Admin:** [http://localhost:8080/wp-admin/](http://localhost:8080/wp-admin/)
- **phpMyAdmin:** [http://localhost:8081/](http://localhost:8081/)

---

## 📂 Repository Structure

```
├── docker-compose.yml              # WordPress 6, MySQL 8 & phpMyAdmin stack
├── .env.example                    # Sample environment configuration
├── .gitignore                      # Git ignore rules
└── themes/
    └── realmer-theme/              # Custom WordPress Theme
        ├── style.css               # Theme declaration
        ├── functions.php           # Setup, hooks, AJAX endpoints & CPTs
        ├── header.php              # Utility bar & main navigation
        ├── footer.php              # Editorial footer & mobile bottom nav
        ├── front-page.php          # 10-section editorial homepage
        ├── index.php / page.php    # Standard page templates
        ├── page-deals.php          # Curated deals & clearance hub
        ├── page-bundles.php        # Hardware setups & bundle builder
        ├── page-business.php       # Enterprise B2B hardware solutions
        ├── page-networking.php     # Networking specialty pathways
        ├── page-about.php          # Realmer brand story & physical showroom
        ├── single-journal.php      # Editorial guide post template
        ├── seed-data.php           # Catalog seeder script
        ├── assets/
        │   ├── css/
        │   │   ├── design-system.css # Tokens, typography, reset, buttons
        │   │   ├── components.css    # Nav, search, drawer, cards, hero
        │   │   ├── woocommerce.css   # Shop archive, PDP, checkout overrides
        │   │   ├── responsive.css    # Breakpoints & mobile bottom nav
        │   └── js/
        │       └── main.js           # AJAX search, cart, wizard, gallery
        ├── template-parts/         # Reusable component partials
        └── woocommerce/            # WooCommerce template overrides
```
