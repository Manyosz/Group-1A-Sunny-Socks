// Read the saved basket.
function getBasket() {
  try {
    // If no basket exists yet, use an empty list.
    const savedBasket = localStorage.getItem("basket") || "[]";
    const basket = JSON.parse(savedBasket);

    return Array.isArray(basket) ? basket : [];
  } catch {
    return [];
  }
}

// Update the basket number in the header and shop.
function updateBasketCounters() {
  const basket = getBasket();
  let total = 0;

  // Add together the quantities of all items.
  basket.forEach(function (item) {
    total += item.quantity;
  });

  const counters = document.querySelectorAll(
    ".header-basket-count, #sockShopBagCount"
  );

  counters.forEach(function (counter) {
    counter.textContent = total;
  });
}

// Wait until the page's HTML has loaded before finding its counters.
document.addEventListener("DOMContentLoaded", updateBasketCounters);