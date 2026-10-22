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
<body>

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
                <a href="Shop-page-collections.html" class="home-shop-button">Shop the collection</a>
                <a href="About_us.php" class="home-story-button">Our story</a>
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
                <a href="Shop-page-collections.html">View all→</a>
            </div>

            <div class="home-category-cards">
                <div class="home-category-card">
                    <a href="Shop-page-collections.html">
                        <img src="/images/athletic.jpg" alt="Athletic Socks">
                    </a> <!-- Here it need to go to the athletic styles in the shop page-->
                <div class="home-category-details">
                    <p>Athletic</p>
                    <p>5 styles →</p>
                </div>
                </div>

                <div class="home-category-card">
                    <a href="Shop-page-collections.html">
                        <img src="/images/no-show-tab.jpg" alt="Casual Socks">
                    </a> <!-- Here it need to go to the casual styles in the shop page-->
                <div class="home-category-details">
                    <p>Casual</p>
                    <p>7 styles →</p>
                </div>
                </div>

                <div class="home-category-card">
                    <a href="Shop-page-collections.html">
                        <img src="/images/hiking.jpg" alt="Hiking Socks">
                    </a> <!-- Here it need to go to the hiking styles in the shop page-->
                <div class="home-category-details">
                    <p>Hiking</p>
                    <p>3 styles →</p>
                </div>
                </div>

                <div class="home-category-card">
                    <a href="Shop-page-collections.html">
                        <img src="/images/cozy.jpg" alt="Cozy Socks">
                    </a> <!-- Here it need to go to the cozy styles in the shop page-->
                <div class="home-category-details">
                    <p>Cozy</p>
                    <p>10 styles →</p>
                </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="home-bestseller">
            <div class="home-bestseller-card">
                box1
            </div>
            <div class="home-order-card">
                box2
            </div>
        </div>
    </section>

<!-- Our story section -->

    <section>
        <div class="home-our-story">
            <p>Sunny Socks About</p>
            <p>Our Story ☀️</p>
            <p>We believe everyday things can make a brighter world. 
                That's why we create high-quality, colourful socks, 
                produced ethically and with care for people and the planet.</p>
            <a href="#">
                <p>Learn More →</p>
            </a>
        </div>
    </section>

<!-- home info -->

    <section>
        <div>

        </div>
    </section>


<!-- < ?php include __DIR__ . '/footer.php'; ?>  
this will include the footer for every html page and we don't
have to copy paste it on every page and if we change it, it will automatically change in every page so 
         USE THIS!--> 

<!-- Footer -->
 
<?php include __DIR__ . '/footer.php'; ?>


</body>
</html>