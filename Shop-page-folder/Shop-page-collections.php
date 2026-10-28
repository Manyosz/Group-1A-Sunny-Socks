<?php
declare(strict_types=1);

/**
 * SOCK SHOP PRODUCT CATALOG
 * Keep product names, prices, categories, sizes, descriptions, features, and image paths here.
 * Product images are stored in the assets/ directory with product-specific filenames.
 */
$sockShopProducts = [
    [
        'id' => 1,
        'name' => "Merino Crew",
        'price' => 18,
        'category' => "Casual",
        'badge' => "BESTSELLER",
        'sizes' => ["S", "M", "L", "XL"],
        'image' => "assets/sock-product-merino-crew-main-image.jpg",
        'date' => 6,
        'material' => "100% Merino Wool",
        'description' => "Our most loved sock. Crafted from 100% merino wool, the Merino Crew delivers all-day warmth without bulk. Naturally moisture-wicking and odour-resistant, it works just as well in the office as on a winter walk. Reinforced heel and toe for lasting durability.",
        'features' => ["Temperature regulating", "Odour resistant", "Machine washable", "Reinforced heel & toe"]
    ],
    [
        'id' => 2,
        'name' => "Ankle Sport",
        'price' => 12,
        'category' => "Athletic",
        'badge' => "NEW",
        'sizes' => ["S", "M", "L"],
        'image' => "assets/sock-product-ankle-sport-main-image.jpg",
        'date' => 5,
        'material' => "Breathable cotton blend",
        'description' => "Lightweight ankle socks for active days, workouts and everyday trainers. Soft, breathable fabric and a secure fit keep you comfortable on the move.",
        'features' => ["Breathable fabric", "Cushioned sole", "Secure arch fit", "Everyday comfort"]
    ],
    [
        'id' => 3,
        'name' => "Compression Run",
        'price' => 24,
        'category' => "Athletic",
        'badge' => "SALE",
        'sizes' => ["M", "L", "XL"],
        'image' => "assets/sock-product-compression-run-main-image.jpg",
        'date' => 4,
        'sale' => true,
        'material' => "Performance nylon blend",
        'description' => "Supportive performance socks for running, training and longer active days. A close-fitting design helps keep the sock in place while you move.",
        'features' => ["Supportive compression", "Moisture management", "Stay-put fit", "Built for running"]
    ],
    [
        'id' => 4,
        'name' => "Cozy Cabin Knit",
        'price' => 22,
        'category' => "Cozy",
        'badge' => "",
        'sizes' => ["S", "M", "L", "XL"],
        'image' => "assets/sock-product-cozy-cabin-knit-main-image.jpg",
        'date' => 3,
        'material' => "Soft chunky knit blend",
        'description' => "Your cosy companion for quiet mornings and chilly evenings. A plush knitted texture wraps your feet in softness when it is time to slow down.",
        'features' => ["Soft knitted texture", "Warm and cosy", "Relaxed comfort fit", "Great for lounging"]
    ],
    [
        'id' => 5,
        'name' => "Hiking Quarter",
        'price' => 28,
        'category' => "Hiking",
        'badge' => "NEW",
        'sizes' => ["M", "L", "XL"],
        'image' => "assets/sock-product-hiking-quarter-main-image.jpg",
        'date' => 2,
        'material' => "Wool performance blend",
        'description' => "Trail-ready comfort for weekend hikes and outdoor adventures. A supportive feel and practical quarter height pair well with hiking shoes and boots.",
        'features' => ["Trail-ready comfort", "Cushioned footbed", "Moisture management", "Reinforced heel & toe"]
    ],
    [
        'id' => 6,
        'name' => "No-Show Tab",
        'price' => 10,
        'category' => "Casual",
        'badge' => "",
        'sizes' => ["S", "M", "L"],
        'image' => "assets/sock-product-no-show-tab-main-image.jpg",
        'date' => 1,
        'material' => "Soft cotton blend",
        'description' => "Low-profile socks that sit discreetly inside trainers while adding a small flash of colour. Made for casual outfits, everyday errands and sunny days.",
        'features' => ["Low-profile design", "Soft breathable feel", "Trainer-friendly fit", "Colourful style"]
    ]
];

/** Safely expose the PHP product catalog to the front-end JavaScript. */
$sockShopProductsJson = json_encode(
    $sockShopProducts,
    JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_SLASHES
);
if ($sockShopProductsJson === false) {
    $sockShopProductsJson = '[]';
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shop Socks</title>
  <link rel="stylesheet" href="shop-page-style.css">
</head>
<body>
  <main class="sock-shop-page">
    <header class="sock-shop-heading">
      <div>
        <p class="sock-shop-eyebrow">THE SOCK SHOP</p>
        <h1 class="sock-shop-main-heading">Find your happy feet.</h1>
        <p class="sock-shop-intro">Everyday comfort, with a little personality.</p>
      </div>
      <div class="sock-shop-heading-actions">
        <span class="sock-shop-item-count" id="sockShopItemCount" aria-live="polite">6 products</span>
        <span class="sock-shop-bag-indicator">Bag <span id="sockShopBagCount">0</span></span>
      </div>
    </header>

    <section class="sock-shop-filter-bar" aria-label="Shop filters">
      <div class="sock-shop-category-list" id="sockShopCategoryList">
        <button class="sock-shop-filter-chip is-active" data-sock-shop-category="All" aria-pressed="true">All</button>
        <button class="sock-shop-filter-chip" data-sock-shop-category="Athletic" aria-pressed="false">Athletic</button>
        <button class="sock-shop-filter-chip" data-sock-shop-category="Casual" aria-pressed="false">Casual</button>
        <button class="sock-shop-filter-chip" data-sock-shop-category="Hiking" aria-pressed="false">Hiking</button>
        <button class="sock-shop-filter-chip" data-sock-shop-category="Cozy" aria-pressed="false">Cozy</button>
        <button class="sock-shop-filter-chip" data-sock-shop-category="Sale" aria-pressed="false">Sale</button>
      </div>
      <label class="sock-shop-sort-wrap">
        <span class="sock-shop-sr-only">Sort products</span>
        <select id="sockShopSortSelect" aria-label="Sort products">
          <option value="newest">Sort: Newest</option>
          <option value="name-asc">Name: A–Z</option>
          <option value="name-desc">Name: Z–A</option>
          <option value="price-asc">Price: Low–High</option>
          <option value="price-desc">Price: High–Low</option>
        </select>
      </label>
    </section>

    <section class="sock-shop-product-panel" aria-label="Products">
      <div class="sock-shop-product-grid" id="sockShopProductGrid"></div>
      <p class="sock-shop-empty-state" id="sockShopEmptyState" hidden>No products in this category yet.</p>
      <nav class="sock-shop-pagination" id="sockShopPagination" aria-label="Product pages"></nav>
    </section>
    <footer class="sock-shop-footer">Made for every step, every day <span aria-hidden="true">♥</span></footer>
  </main>

  <!-- Product detail popup -->
  <section class="sock-product-detail-overlay" id="sockProductDetailModal" role="dialog"
    aria-modal="true" aria-labelledby="sockProductDetailName" hidden>
    <div class="sock-product-detail-modal">
      <header class="sock-product-detail-header">
        <span>PRODUCT DETAIL</span>
        <button class="sock-product-detail-close" id="sockProductDetailClose" type="button"
          aria-label="Close product details">× CLOSE</button>
      </header>

      <div class="sock-product-detail-main">
        <div class="sock-product-detail-image-wrap">
          <img class="sock-product-detail-image" id="sockProductDetailImage" src="" alt="">
        </div>

        <div class="sock-product-detail-content">
          <div class="sock-product-detail-labels">
            <span class="sock-product-detail-category" id="sockProductDetailCategory"></span>
            <span class="sock-product-detail-badge" id="sockProductDetailBadge"></span>
          </div>
          <h2 class="sock-product-detail-name" id="sockProductDetailName"></h2>
          <p class="sock-product-detail-price" id="sockProductDetailPrice"></p>
          <p class="sock-product-detail-material" id="sockProductDetailMaterial"></p>
          <p class="sock-product-detail-description" id="sockProductDetailDescription"></p>

          <p class="sock-product-detail-features-heading">FEATURES</p>
          <ul class="sock-product-detail-features" id="sockProductDetailFeatures"></ul>

          <p class="sock-product-detail-size-heading">SIZE</p>
          <div class="sock-product-detail-sizes" id="sockProductDetailSizes"></div>

          <button class="sock-product-detail-add-to-bag" id="sockProductDetailAddToBag" type="button" disabled>
            ORDER THIS SOCK →
          </button>
          <p class="sock-product-detail-size-message" id="sockProductDetailSizeMessage" aria-live="polite">
            Choose a size to continue.
          </p>
        </div>
      </div>
    </div>
  </section>

  <script>window.sockShopProducts = <?= $sockShopProductsJson ?>;</script>
  <script src="shop-page-collections-script.js"></script>
</body>
</html>
