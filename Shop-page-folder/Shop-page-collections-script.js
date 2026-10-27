// Product information
const sockShopProducts = Array.isArray(window.sockShopProducts) ? window.sockShopProducts : [];

if (sockShopProducts.length === 0) {
  console.error("Sock Shop: PHP did not provide the sockShopProducts catalog. Open this project through a PHP server.");
}

const sockShopProductsPerPage = 6;
let activeSockShopCategory = "All";
let currentSockShopPage = 1;
let sockShopSortOrder = "newest";
let selectedSockProduct = null;
let selectedSockSize = "";
let sockShopBagItemCount = 0;
let sockProductDetailTriggerElement = null;

const sockShopProductGridElement = document.querySelector("#sockShopProductGrid");
const sockShopPaginationElement = document.querySelector("#sockShopPagination");
const sockShopItemCountElement = document.querySelector("#sockShopItemCount");
const sockShopEmptyStateElement = document.querySelector("#sockShopEmptyState");
const sockProductDetailModalElement = document.querySelector("#sockProductDetailModal");
const sockProductDetailCloseButton = document.querySelector("#sockProductDetailClose");

function getVisibleSockShopProducts() {
  const result = sockShopProducts.filter(product => {
    if (activeSockShopCategory === "All") return true;
    if (activeSockShopCategory === "Sale") {
      return product.sale || product.badge === "SALE";
    }
    return product.category === activeSockShopCategory;
  });

  const sorters = {
    newest: (a, b) => b.date - a.date,
    "name-asc": (a, b) => a.name.localeCompare(b.name),
    "name-desc": (a, b) => b.name.localeCompare(a.name),
    "price-asc": (a, b) => a.price - b.price,
    "price-desc": (a, b) => b.price - a.price
  };

  return result.sort(sorters[sockShopSortOrder]);
}

function renderSockShopProducts() {
  const visible = getVisibleSockShopProducts();
  const pageCount = Math.max(1, Math.ceil(visible.length / sockShopProductsPerPage));

  if (currentSockShopPage > pageCount) currentSockShopPage = pageCount;

  const start = (currentSockShopPage - 1) * sockShopProductsPerPage;
  const pageProducts = visible.slice(start, start + sockShopProductsPerPage);

  sockShopItemCountElement.textContent =
    `${visible.length} ${visible.length === 1 ? "product" : "products"}`;
  sockShopEmptyStateElement.hidden = visible.length !== 0;

  sockShopProductGridElement.innerHTML = pageProducts.map(product => `
    <article class="sock-shop-product-card" role="button" tabindex="0"
      data-sock-product-id="${product.id}"
      aria-label="View details for ${product.name}">
      <img class="sock-shop-product-image" src="${product.image}"
        alt="${product.name} socks" loading="lazy">
      <div class="sock-shop-product-info">
        <div class="sock-shop-product-title-line">
          <h2 class="sock-shop-product-name">${product.name}</h2>
          ${product.badge ? `<span class="sock-shop-product-badge">${product.badge}</span>` : ""}
        </div>
        <p class="sock-shop-product-price">$${product.price}</p>
        <div class="sock-shop-product-sizes" aria-label="Available sock sizes">
          ${product.sizes.map(size => `<span class="sock-shop-product-size">${size}</span>`).join("")}
        </div>
        <span class="sock-shop-view-details">View product details ↗</span>
      </div>
    </article>
  `).join("");

  sockShopPaginationElement.innerHTML = pageCount > 1
    ? Array.from({ length: pageCount }, (_, i) => `
      <button class="sock-shop-page-button ${currentSockShopPage === i + 1 ? "is-active" : ""}"
        data-sock-shop-page="${i + 1}" aria-label="Page ${i + 1}"
        aria-current="${currentSockShopPage === i + 1 ? "page" : "false"}">
        ${i + 1}
      </button>`).join("")
    : "";
}

function openSockProductDetails(productId) {
  sockProductDetailTriggerElement = document.querySelector(`[data-sock-product-id="${Number(productId)}"]`);
  selectedSockProduct = sockShopProducts.find(
    product => product.id === Number(productId)
  );
  if (!selectedSockProduct) return;

  selectedSockSize = "";
  const product = selectedSockProduct;

  document.querySelector("#sockProductDetailImage").src = product.image;
  document.querySelector("#sockProductDetailImage").alt = `${product.name} socks`;
  document.querySelector("#sockProductDetailCategory").textContent = product.category;
  document.querySelector("#sockProductDetailBadge").textContent =
    product.badge || "EVERYDAY FAVOURITE";
  document.querySelector("#sockProductDetailName").textContent = product.name;
  document.querySelector("#sockProductDetailPrice").textContent = `$${product.price}`;
  document.querySelector("#sockProductDetailMaterial").textContent = product.material;
  document.querySelector("#sockProductDetailDescription").textContent = product.description;
  document.querySelector("#sockProductDetailFeatures").innerHTML =
    product.features.map(feature => `<li>${feature}</li>`).join("");

  document.querySelector("#sockProductDetailSizes").innerHTML = product.sizes.map(size => `
    <button class="sock-product-detail-size-option" type="button" data-sock-product-size="${size}"
      aria-pressed="false">${size}</button>
  `).join("");

  document.querySelector("#sockProductDetailSizeMessage").textContent =
    "Choose a size to continue.";

  const orderButton = document.querySelector("#sockProductDetailAddToBag");
  orderButton.disabled = true;
  orderButton.textContent = "Order this sock →";

  sockProductDetailModalElement.hidden = false;
  document.body.classList.add("sock-product-detail-is-open");
  sockProductDetailCloseButton.focus();
}

function closeSockProductDetails() {
  sockProductDetailModalElement.hidden = true;
  document.body.classList.remove("sock-product-detail-is-open");
  selectedSockProduct = null;
  selectedSockSize = "";
  if (sockProductDetailTriggerElement) sockProductDetailTriggerElement.focus();
  sockProductDetailTriggerElement = null;
}

// Product cards open their matching detail popup.
sockShopProductGridElement.addEventListener("click", event => {
  const card = event.target.closest("[data-sock-product-id]");
  if (card) openSockProductDetails(card.dataset.sockProductId);
});

sockShopProductGridElement.addEventListener("keydown", event => {
  if (
    (event.key === "Enter" || event.key === " ") &&
    event.target.matches("[data-sock-product-id]")
  ) {
    event.preventDefault();
    openSockProductDetails(event.target.dataset.sockProductId);
  }
});

// Category filters
document.querySelector("#sockShopCategoryList").addEventListener("click", event => {
  const button = event.target.closest("[data-sock-shop-category]");
  if (!button) return;

  activeSockShopCategory = button.dataset.sockShopCategory;
  currentSockShopPage = 1;

  document.querySelectorAll(".sock-shop-filter-chip").forEach(chip => {
    const active = chip === button;
    chip.classList.toggle("is-active", active);
    chip.setAttribute("aria-pressed", String(active));
  });

  renderSockShopProducts();
});

// Sorting
document.querySelector("#sockShopSortSelect").addEventListener("change", event => {
  sockShopSortOrder = event.target.value;
  currentSockShopPage = 1;
  renderSockShopProducts();
});

// Pagination
sockShopPaginationElement.addEventListener("click", event => {
  const button = event.target.closest("[data-sock-shop-page]");
  if (!button) return;

  currentSockShopPage = Number(button.dataset.sockShopPage);
  renderSockShopProducts();
  document.querySelector(".sock-shop-product-panel").scrollIntoView({
    behavior: "smooth",
    block: "start"
  });
});

// Size selection in popup
document.querySelector("#sockProductDetailSizes").addEventListener("click", event => {
  const button = event.target.closest("[data-sock-product-size]");
  if (!button) return;

  selectedSockSize = button.dataset.sockProductSize;

  document.querySelectorAll(".sock-product-detail-size-option").forEach(sizeButton => {
    const active = sizeButton === button;
    sizeButton.classList.toggle("is-selected", active);
    sizeButton.setAttribute("aria-pressed", String(active));
  });

  document.querySelector("#sockProductDetailSizeMessage").textContent =
    `Size ${selectedSockSize} selected.`;
  document.querySelector("#sockProductDetailAddToBag").disabled = false;
});

// Front-end demo: add selected item to the bag counter.
document.querySelector("#sockProductDetailAddToBag").addEventListener("click", () => {
  if (!selectedSockProduct || !selectedSockSize) return;

  sockShopBagItemCount += 1;
  document.querySelector("#sockShopBagCount").textContent = sockShopBagItemCount;
  document.querySelector("#sockProductDetailSizeMessage").textContent =
    `${selectedSockProduct.name}, size ${selectedSockSize}, added to your bag.`;
  document.querySelector("#sockProductDetailAddToBag").textContent = "Added ✓";
});

sockProductDetailCloseButton.addEventListener("click", closeSockProductDetails);

sockProductDetailModalElement.addEventListener("click", event => {
  if (event.target === sockProductDetailModalElement) closeSockProductDetails();
});

document.addEventListener("keydown", event => {
  if (event.key === "Escape" && !sockProductDetailModalElement.hidden) {
    closeSockProductDetails();
  }
});

// Initial product listing
renderSockShopProducts();
