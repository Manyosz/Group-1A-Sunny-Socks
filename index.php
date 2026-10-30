<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/images/Favicon-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <title>Sunny Socks</title>
</head>
<body class="home-body">
<div class="home-page-wrapper">
<!--  < ?php include __DIR__ . '/header.php'; ?>  
this will include the menu bar for every html page and we don't
have to copy paste it on every page and if we change it, it will automatically change in every page so 
         USE THIS!--> 

<!-- Menu bar -->
 
<?php include __DIR__ . '/header.php'; ?>


<!-- hero image section -->
    <section>
        <div class="hero-page">
            <h1><span class="home-yellow-text">Sunny</span> Socks</h1>
            <p>Colourful socks for work, home, sport & a greener <br> world.</p>
            <div class="hero-buttons">
                <a href="/Shop-page-folder/Shop-page-collections.php" class="home-shop-button">Shop the collection</a>
                <a href="/About_us.php" class="home-story-button">Our story</a>
            </div>
        </div>
    </section>

    <section class="home-discount-section">
        <div class="home-discount">
            <p>☀️ FREE SHIPPING OVER $45 • CODE: SUNNYSOCKS2026</p>
        </div>
    </section>

    <section class="home-categories-section">
        <div class="home-categories">
            <div class="category-heading">
                <p>Shop by Category</p>
                <a href="/Shop-page-folder/Shop-page-collections.php">View all→</a>
            </div>

            <div class="home-category-cards">
                <div class="home-category-card">
                    <a href="/Shop-page-folder/Shop-page-collections.php">
                        <img src="/images/athletic.jpg" alt="Athletic Socks">
                    </a> <!-- Here it need to go to the athletic styles in the shop page-->
                <div class="home-category-details">
                    <p id="detail-1">Athletic</p>
                    <p id="detail-2">5 styles →</p>
                </div>
                </div>

                <div class="home-category-card">
                    <a href="/Shop-page-folder/Shop-page-collections.php">
                        <img src="/images/no-show-tab.jpg" alt="Casual Socks">
                    </a> <!-- Here it need to go to the casual styles in the shop page-->
                <div class="home-category-details">
                    <p id="detail-1">Casual</p>
                    <p id="detail-2">7 styles →</p>
                </div>
                </div>

                <div class="home-category-card">
                    <a href="/Shop-page-folder/Shop-page-collections.php">
                        <img src="/images/hiking.jpg" alt="Hiking Socks">
                    </a> <!-- Here it need to go to the hiking styles in the shop page-->
                <div class="home-category-details">
                    <p id="detail-1">Hiking</p>
                    <p id="detail-2">3 styles →</p>
                </div>
                </div>

                <div class="home-category-card">
                    <a href="/Shop-page-folder/Shop-page-collections.php">
                        <img src="/images/cozy.jpg" alt="Cozy Socks">
                    </a> <!-- Here it need to go to the cozy styles in the shop page-->
                <div class="home-category-details">
                    <p id="detail-1">Cozy</p>
                    <p id="detail-2">10 styles →</p>
                </div>
                </div>

            </div>
        </div>
    </section>

    <section class="home-featured">
        <div class="home-bestsellers">
            <div class="home-bestsellers-heading">
                <h2>🔥 Bestsellers</h2>
                <a href="/Shop-page-folder/Shop-page-collections.php">Shop all →</a>
            </div>

            <div class="home-bestseller-cards">
                <a class="home-product-card" href="/Shop-page-folder/Shop-page-collections.php">
                    <img src="/images/merino-crew.jpg" alt="Merino Crew socks">

                    <div class="home-product-details">
                        <h3>Merino Crew</h3>
                        <span class="home-product-badge">Bestseller</span>
                        <p class="home-product-price">$18</p>

                        <div class="home-product-sizes">
                            <span>S</span>
                            <span>M</span>
                            <span>L</span>
                            <span>XL</span>
                        </div>
                    </div>
                </a>

                <a class="home-product-card" href="/Shop-page-folder/Shop-page-collections.php">
                    <img src="/images/athletic.jpg" alt="Ankle Sport socks">

                    <div class="home-product-details">
                        <h3>Ankle Sport</h3>
                        <span class="home-product-badge">New</span>
                        <p class="home-product-price">$12</p>

                        <div class="home-product-sizes">
                            <span>S</span>
                            <span>M</span>
                            <span>L</span>
                        </div>
                    </div>
                </a>

                <a class="home-product-card" href="/Shop-page-folder/Shop-page-collections.php">
                    <img src="/images/hiking.jpg" alt="Compression Run socks">

                    <div class="home-product-details">
                        <h3>Compression Run</h3>
                        <span class="home-product-badge">Sale</span>
                        <p class="home-product-price">$24</p>

                        <div class="home-product-sizes">
                            <span>M</span>
                            <span>L</span>
                            <span>XL</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="home-order-banner">
            <p class="home-order-label">Sunny Socks Order</p>

            <h2>Good Socks<br>Brighter<br>Days.</h2>

            <p class="home-order-description">
                Fill in your details and we'll get your socks to you.
            </p>

            <a class="home-order-link" href="/order.php"> <!-- Here need the order page -->
                Place an Order →
            </a>
        </div>
    </section>

<!-- Our story section -->

   <section class="home-our-story">
        <div class="home-our-story-content">
            <p class="home-our-story-label">Sunny Socks About</p>

            <h2 class="home-our-story-h2">Our Story ☀️</h2>

            <p class="home-our-story-description">
            We believe everyday things can make a brighter <br>
            world. That's why we create high-quality, colourful <br>
            socks, produced ethically and with care for people <br>
            and the planet.
            </p>

            <a href="About_us.php" class="home-our-story-button">
                Learn More →
            </a>
        </div>
    </section>

<!-- home info -->

    <section class="home-stats-section">
        <div class="home-stats">
            <div class="home-stats-box">
                <h2>2018</h2>
                <p>Founded</p>
            </div>

            <div class="home-stats-box">
                <h2>40k+</h2>
                <p>Happy Customers</p>
            </div>

            <div class="home-stats-box">
                <h2>100%</h2>
                <p>Merino Certified</p>
            </div>

            <div class="home-stats-box">
                <h2>12</h2>
                <p>Countries Shipped</p>
            </div>
        </div>
    </section>


<!-- < ?php include __DIR__ . '/footer.php'; ?>  
this will include the footer for every html page and we don't
have to copy paste it on every page and if we change it, it will automatically change in every page so 
         USE THIS!--> 

<!-- Footer -->
 
<?php include __DIR__ . '/footer.php'; ?>

</div>
</body>
</html>