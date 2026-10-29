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
<body class="order-body">
  <div class="order-page-wrapper">

    <?php include __DIR__ . '/header.php'; ?>

    <main class="order-main">
      <section class="order-shell">

        <div class="order-form-panel">
          <h1 class="order-title">Place your order</h1>
          <p class="order-subtitle">Fill in your details and we’ll get your socks to you.</p>

          <form class="order-form">
            <div class="order-field">
              <label for="name">Full name</label>
              <input id="name" type="text" placeholder="Your full name" />
            </div>

            <div class="order-field">
              <label for="email">Email address</label>
              <input id="email" type="email" placeholder="you@example.com" />
            </div>

            <div class="order-field">
              <label for="address">Delivery address</label>
              <input id="address" type="text" placeholder="Street address" />
            </div>

            <div class="order-row">
              <div class="order-field">
                <label for="city">City</label>
                <input id="city" type="text" placeholder="City" />
              </div>
              <div class="order-field">
                <label for="zip">Postcode</label>
                <input id="zip" type="text" placeholder="Postcode" />
              </div>
            </div>

            <div class="order-field">
              <label for="country">Country</label>
              <select id="country">
                <option>United States</option>
                <option>Canada</option>
                <option>United Kingdom</option>
              </select>
            </div>

            <div class="order-section-heading">Your socks</div>

            <div class="order-item-card">
              <img src="/images/merino-crew.jpg" alt="Merino Crew" />
              <div class="order-item-copy">
                <div class="order-item-top">
                  <h3>Merino Crew</h3>
                  <span>$18</span>
                </div>
                <p>Warm, soft everyday comfort.</p>
                <div class="order-item-meta">
                  <span>Size M</span>
                  <span>Qty 1</span>
                </div>
              </div>
            </div>

            <div class="order-item-card">
              <img src="/images/athletic.jpg" alt="Ankle Sport" />
              <div class="order-item-copy">
                <div class="order-item-top">
                  <h3>Ankle Sport</h3>
                  <span>$12</span>
                </div>
                <p>Lightweight and breathable.</p>
                <div class="order-item-meta">
                  <span>Size L</span>
                  <span>Qty 2</span>
                </div>
              </div>
            </div>

            <div class="order-note">
              <input type="checkbox" id="gift" />
              <label for="gift">This is a gift order</label>
            </div>

            <div class="order-actions">
              <button type="submit" class="order-submit">Place order</button>
              <a href="Shop-page-collections.html" class="order-cancel">Continue shopping</a>
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
            <p>Shipping in 2–4 business days.</p>
          </div>

          <div class="order-info-card yellow">
            <h3>Need help?</h3>
            <p>We’re here if you have any questions about your order.</p>
          </div>
        </aside>

      </section>
    </main>

    <!-- Footer -->

    <?php include __DIR__ . '/footer.php'; ?>

  </div>
</body>
</html>
