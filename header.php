<?php

 $currentPage = basename($_SERVER['SCRIPT_NAME']);

?>


<!-- Menu bar -->
    <header class="header">
            <img src="/images/Sunny_Socks-logo.png" alt="Sunny Socks logo">
            <div class="header-page">
                <a href="index.php" 
                class="<?= $currentPage === 'index.php' ? 'active' : '' ?> ">
                HOME</a>
                <a href="/Shop-page-folder/Shop-page-collections.php" 
                class="<?= $currentPage === 'Shop-page-collections..php' ? 'active' : '' ?> ">
                SHOP</a>
                <a href="order.php" 
                class="<?= $currentPage === 'order.php' ? 'active' : '' ?> ">
                ORDER</a>
                <a href="About_us.php" 
                class="<?= $currentPage === 'About_us.php' ? 'active' : '' ?> ">
                ABOUT</a>
            </div>

            <!-- Also needs some php to be able to count the items and also animations -->
            <div class="header-button">
                <div class="header-button-basket">
                    <a href="#" class="header-basket-link">
                        <img src="images/cart.svg" alt="" width="32">
                        <span>Basket</span>
                        <span class="header-basket-count">0</span>
                    </a>
                </div>

                <div>
                    <a href="#" class="header-button-moon">
                        <span>🌙</span>
                    </a>
                </div>
    <!-- language change -->
                <details class="header-language">
                    <summary class="header-language-summary">🌐 EN</summary>

                    <div class="header-language-options">
                        <a href="#">🇬🇧 English</a>
                        <a href="#">🇳🇱 Nederlands</a>
                    </div>
                </details>

                <!-- Searchbar pop up -->
                <details>
                    <summary>🔍 Search</summary>
                </details>

            </div>
    </header>