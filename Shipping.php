
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping & Delivery</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Only this page: use the same layout as About Us. */
        body.sizingGuide {
            display: block;
            background: linear-gradient(110deg, #C378D5, #A979E9, #6D9FE8);
        }

        .header {
            width: 100%;
            max-width: 1320px;
            margin: auto;
            align-items: center;
        }

        .sunny-page {
            width: 80%;
            max-width: 1320px;
            margin: auto;
            padding: 12px;
        }

        .sunny-page .headBox,
        .sunny-page .sizes-grid,
        .sunny-page .footContact {
            width: 100%;
            margin-top: 12px;
        }

        .home-footer {
            width: 80%;
            max-width: 1250px;
            margin: 28px auto;
        }

        @media (max-width: 700px) {
            .sunny-page, .home-footer { width: 95%; }
            .sunny-page .sizes-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body class="sizingGuide themeShipping">

<?php include __DIR__ . '/header.php'; ?>

<main class="sunny-page article-bg-bt">

    <!-- HERO SECTION -->

    <section class="headBox heroBackground">

        <div class="headText">
            <p class="t1">
                <span class="emoji">📦</span>
                Help Sizing Guide
            </p>

            <h1 class="t2">
                Help Shipping Shipping & Delivery 📦
            </h1>

            <p class="t3">
                We carefully pack every order and ship to more than 12 countries.
            </p>
        </div>

        <div class="circle circle1"></div>
        <div class="circle circle2"></div>
        <div class="circle circle3"></div>

        <div class="colorful-line"></div>

    </section>

    <!-- FOUR SIZE CARDS -->

    <div class="sizes-grid">

        <section class="size-card sub1">
            <span class="number">1</span>

            <div class="cardText">
                <h2>Standard delivery</h2>
                <p>
                    Most domestic orders arrive in 3–5 business days.
                </p>
            </div>
        </section>

        <section class="size-card sub2">
            <span class="number">2</span>

            <div class="cardText">
                <h2>International delivery</h2>
                <p>
                    International orders usually arrive in 7–14 business days.
                </p>
            </div>
        </section>

        <section class="size-card sub3">
            <span class="number">3</span>

            <div class="cardText">
                <h2>Free shipping</h2>
                <p>
                    Standard shipping is free when your order total is over $45.
                </p>
            </div>
        </section>

        <section class="size-card sub4">
            <span class="number">4</span>

            <div class="cardText">
                <h2>Tracking</h2>
                <p>
                    A tracking link is emailed as soon as your parcel leaves our studio.
                </p>
            </div>
        </section>
    </div>

    <section class="footContact">
        <div class="part1">
        <h2 class="help">Still need a hand?</h2>
        <p>Browse our products or ask the Sunny Socks community.</p>
        </div>

        <div class="part2">
        <a class="butt1" href="#"><h3>Shop socks &rarr;</h3></a>
        <a class="butt2" href="#"><h3>Visit Q&A</h3></a>
        </div>
</section>

</main>

<?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
