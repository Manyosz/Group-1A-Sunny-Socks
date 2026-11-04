<?php


$error = "Please fill in all required fields correctly. Full name, 
delivery address and city must each contain at least 3 characters.";
$counter = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $country = $_POST["country"];

    if (empty($email)) {
        $counter +=1;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $counter +=1;
    }

    if (mb_strlen($name) < 5) {
    $counter += 1;
    }
    if (mb_strlen($address) < 5) {
    $counter += 1;
    }
    if (mb_strlen($city) < 3) {
    $counter += 1;
    }


    if(empty($name)){
        $counter +=1;
    }
    if(empty($email)){
        $counter +=1;
    }
    if(empty($city)){
        $counter +=1;
    }
    if(empty($zip)){
        $counter +=1;
    }
    if(empty($country)){
        $counter +=1;
    }
};

$emailSent = false;

if ($_SERVER["REQUEST_METHOD"] === "POST" && $counter === 0) {
    require __DIR__ . "/send-confirmation.php";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/images/Favicon-logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <title>Sunny Socks | Order</title>
</head>
<body>
    <?php include __DIR__ . '/header.php'; ?>

    <?php if($counter > 0){ ?>
        <section class="confirmation-main">
            <div class="confirmation-box">
                <div class="confirmation-icon">x</div>

                <div class="confirmation-text">
                    <p>ORDER FAILED</p>
                </div>

                <div class="confirmation-name">
                    <h1>Hey, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>!</h1>
                    <p><span class="red"><?= $error ?></span></p>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="confirmation-main">
            <div class="confirmation-box">
                <div class="confirmation-icon">✓</div>

                <div class="confirmation-text">
                    <p>ORDER RECEIVED</p>
                </div>

                <div class="confirmation-name">
                    <h1>Thanks, <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>!</h1>
                    <p><span>A confirmation has been sent to</span></p>
                    <p><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>
                </div>

                <div class="confirmation-address">
                    <div>
                        <p><span>DELIVERY ADDRESS</span></p>
                        <p>
                            <?= htmlspecialchars($address) ?>,
                            <?= htmlspecialchars($city) ?>
                            <?= htmlspecialchars($zip) ?>,
                            <?= htmlspecialchars($country) ?>
                        </p>
                    </div>
                </div>

                <div class="confirmation-order">
                    <div>
                        <p><span>YOUR ORDER</span></p>
                        <div id="confirmationItems"></div>
                    </div>
                </div>

                <div class="confirmation-button">
                    <a href="order.php">PLACE ANOTHER ORDER</a>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php include __DIR__ . '/footer.php'; ?>

    <script>
    const basket = getBasket();
    const confirmationItems = document.querySelector("#confirmationItems");

    // Only display items when the confirmation section exists.
    if (confirmationItems) {
        basket.forEach(function (item) {
        const paragraph = document.createElement("p");

        paragraph.textContent =
            item.quantity + " × " + item.name + ", size " + item.size;

        confirmationItems.appendChild(paragraph);
        });
        // Empty the basket after displaying the ordered socks.
        localStorage.removeItem("basket");
        updateBasketCounters();
    }
    </script>
</body>
</html>
