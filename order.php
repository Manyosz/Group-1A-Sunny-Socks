<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css"/>
  <link rel="shortcut icon" href="/images/Favicon-logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <title>Sunny Socks | Order</title>
</head>
<body class="order-body article-bg-bt">
  <div class="order-page-wrapper">

    <?php include __DIR__ . '/header.php'; ?>

    <main class="order-main">
      <section class="order-shell">

        <div class="order-form-panel">
          <h1 class="order-title">Place your order</h1>
          <p class="order-subtitle">Fill in your details and we'll get your socks to you.</p>

          <form action="process.php" method="post" class="order-form">
            <div class="order-field">
              <label for="name">Full name</label>
              <input name="name" id="name" type="text" placeholder="Your full name" />
            </div>

            <div class="order-field">
              <label for="email">Email address</label>
              <input name="email" id="email" type="email" placeholder="you@example.com" />
            </div>

            <div class="order-field">
              <label for="address">Delivery address</label>
              <input name="address" id="address" type="text" placeholder="Street address" />
            </div>

            <div class="order-row">
              <div class="order-field">
                <label for="city">City</label>
                <input name="city" id="city" type="text" placeholder="City" />
              </div>
              <div class="order-field">
                <label for="zip">Postcode</label>
                <input name="zip" id="zip" type="text" placeholder="Postcode" />
              </div>
            </div>

            <div class="order-field">
              <label for="country">Country</label>
              <select name="country" id="country">
                <option value="" disabled selected>Select your shipping region</option>
                <option>United States</option>
                <option>Canada</option>
                <option>United Kingdom</option>
                <option>Europe</option>
                <option>Netherlands</option>
              </select>
            </div>

            <div class="order-section-heading">Your socks</div>

            <!-- The saved products will appear here. -->
            <div id="orderItems"></div>

            <p id="orderEmptyMessage" hidden>Your basket is empty.</p>

            <!-- JavaScript copies this card for each basket item. -->
            <template id="orderItemTemplate">
              <div class="order-item-card">
                <img alt="" />

                <div class="order-item-copy">
                  <div class="order-item-top">
                    <h3></h3>

                    <div class="order-item-price-actions">
                      <span data-item-price></span>
                      <button type="button" class="order-remove" data-remove-item>
                        Remove
                      </button>
                    </div>
                  </div>

                  <div class="order-item-meta">
                    <span data-item-size></span>
                    <span data-item-quantity></span>
                  </div>
                </div>
              </div>
            </template>


            <div class="order-actions">
              <button type="submit" class="order-submit">Place order</button>
              <a href="/Shop-page-folder/Shop-page-collections.php" class="order-cancel">Continue shopping</a>
            </div>
          </form>
        </div>

        <aside class="order-sidebar">
          <div class="order-hero-card">
            <div class="order-hero-overlay"></div>
            <div class="order-hero-text">
              <p>Your socks are waiting ☀️</p>
              <span>Fresh comfort, bright colors, quick delivery.</span>
            </div>
          </div>

          <div class="order-info-card mint">
            <h3>Fast delivery</h3>
            <p>Shipping in 2-4 business days.</p>
          </div>

          <div class="order-info-card yellow">
            <h3>Need help?</h3>
            <p>We're here if you have any questions about your order.</p>
          </div>
        </aside>

      </section>
    </main>

    <!-- Footer -->

    <?php include __DIR__ . '/footer.php'; ?>

  </div>
  <script>
  // Read the same basket that the shop saved.
  const basket = getBasket();

  const orderItems = document.querySelector("#orderItems");
  const template = document.querySelector("#orderItemTemplate");

  // Show the empty message only when there are no items.
  document.querySelector("#orderEmptyMessage").hidden =
    basket.length !== 0;

  // Create one card for each item.
  basket.forEach(function (item, index) {
    // Make a copy of the template.
    const card = template.content.cloneNode(true);

    // Fill the copied card with this item's information.
    card.querySelector("img").src = item.image;
    card.querySelector("img").alt = item.name;

    card.querySelector("h3").textContent = item.name;

    card.querySelector("[data-item-price]").textContent =
      "$" + (item.price * item.quantity).toFixed(2);

    card.querySelector("[data-item-size]").textContent =
      "Size " + item.size;

    card.querySelector("[data-item-quantity]").textContent =
      "Qty " + item.quantity;

      
    // Add the remove buttons click handler.
    card.querySelector("[data-remove-item]")
      .addEventListener("click", function () {
        basket.splice(index, 1);
        localStorage.setItem("basket", JSON.stringify(basket));
        window.location.reload();
      });

    // Put the completed card onto the page.
    orderItems.appendChild(card);
  });
</script>
</body>
</html>
