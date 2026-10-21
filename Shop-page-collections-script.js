const products = [
  { id: 1, name: "Merino Crew", price: 18, category: "Casual", badge: "BESTSELLER", sizes: ["S", "M", "L", "XL"], image: "assets/merino-crew.jpg", date: 6 },
  { id: 2, name: "Ankle Sport", price: 12, category: "Athletic", badge: "NEW", sizes: ["S", "M", "L"], image: "assets/ankle-sport.jpg", date: 5 },
  { id: 3, name: "Compression Run", price: 24, category: "Athletic", badge: "SALE", sizes: ["M", "L", "XL"], image: "assets/compression-run.jpg", date: 4, sale: true },
  { id: 4, name: "Cozy Cabin Knit", price: 22, category: "Cozy", badge: "", sizes: ["S", "M", "L", "XL"], image: "assets/cozy-cabin-knit.jpg", date: 3 },
  { id: 5, name: "Hiking Quarter", price: 28, category: "Hiking", badge: "NEW", sizes: ["M", "L", "XL"], image: "assets/hiking-quarter.jpg", date: 2 },
  { id: 6, name: "No-Show Tab", price: 10, category: "Casual", badge: "", sizes: ["S", "M", "L"], image: "assets/no-show-tab.jpg", date: 1 }
];

const perPage = 6;
let activeCategory = "All";
let currentPage = 1;
let sortBy = "newest";

const grid = document.querySelector("#productGrid");
const pagination = document.querySelector("#pagination");
const itemCount = document.querySelector("#itemCount");
const emptyState = document.querySelector("#emptyState");

function getVisibleProducts() {
  let result = products.filter(product => {
    if (activeCategory === "All") return true;
    if (activeCategory === "Sale") return product.sale || product.badge === "SALE";
    return product.category === activeCategory;
  });

  const sorters = {
    newest: (a, b) => b.date - a.date,
    "name-asc": (a, b) => a.name.localeCompare(b.name),
    "name-desc": (a, b) => b.name.localeCompare(a.name),
    "price-asc": (a, b) => a.price - b.price,
    "price-desc": (a, b) => b.price - a.price
  };
  return result.sort(sorters[sortBy]);
}

function renderProducts() {
  const visible = getVisibleProducts();
  const pageCount = Math.max(1, Math.ceil(visible.length / perPage));
  if (currentPage > pageCount) currentPage = pageCount;
  const start = (currentPage - 1) * perPage;
  const pageProducts = visible.slice(start, start + perPage);

  itemCount.textContent = `${visible.length} ${visible.length === 1 ? "product" : "products"}`;
  emptyState.hidden = visible.length !== 0;
  grid.innerHTML = pageProducts.map(product => `
    <article class="product-card">
      <img class="product-image" src="${product.image}" alt="${product.name} socks" loading="lazy">
      <div class="product-info">
        <div class="product-title-line">
          <h2 class="product-name">${product.name}</h2>
          ${product.badge ? `<span class="badge">${product.badge}</span>` : ""}
        </div>
        <p class="product-price">$${product.price}</p>
        <div class="sizes" aria-label="Available sizes">
          ${product.sizes.map(size => `<span class="size">${size}</span>`).join("")}
        </div>
      </div>
    </article>
  `).join("");

  pagination.innerHTML = pageCount > 1
    ? Array.from({ length: pageCount }, (_, i) => `
      <button class="page-button ${currentPage === i + 1 ? "active" : ""}"
        data-page="${i + 1}" aria-label="Page ${i + 1}" aria-current="${currentPage === i + 1 ? "page" : "false"}">
        ${i + 1}
      </button>`).join("")
    : "";
}

document.querySelector("#categoryList").addEventListener("click", event => {
  const button = event.target.closest("[data-category]");
  if (!button) return;
  activeCategory = button.dataset.category;
  currentPage = 1;
  document.querySelectorAll(".filter-chip").forEach(chip => {
    const active = chip === button;
    chip.classList.toggle("active", active);
    chip.setAttribute("aria-pressed", String(active));
  });
  renderProducts();
});

document.querySelector("#sortSelect").addEventListener("change", event => {
  sortBy = event.target.value;
  currentPage = 1;
  renderProducts();
});

pagination.addEventListener("click", event => {
  const button = event.target.closest("[data-page]");
  if (!button) return;
  currentPage = Number(button.dataset.page);
  renderProducts();
  document.querySelector(".product-panel").scrollIntoView({ behavior: "smooth", block: "start" });
});

renderProducts();
