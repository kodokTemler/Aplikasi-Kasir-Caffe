// Toggel Class Active untuk humberger menu
const navbarNav = document.querySelector(".navbar-nav");

// ketika hamburger menu diclik
document.querySelector("#hamberger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Toggel Class Active untu searce form
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");

document.querySelector("#search-btn").onclick = (e) => {
  searchForm.classList.toggle("active");
  searchBox.focus();
  e.preventDefault();
};

// Toggel class active untuk shopping cart
const shoppingCart = document.querySelector(".shopping-cart");

document.querySelector("#shopping-cart-btn").onclick = (e) => {
  shoppingCart.classList.toggle("active");
  e.preventDefault();
};

// Klik Diluar side bar untuk menghilangkan sidebar
const hm = document.querySelector("#hamberger-menu");
const sb = document.querySelector("#search-btn");
const sc = document.querySelector("#shopping-cart-btn");

document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }
  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove("active");
  }
});

// modal box
const itemDetailModal = document.querySelector("#item-detail-modal");
const itemDetailButton = document.querySelectorAll(".item-detail-button");

itemDetailButton.forEach((btn) => {
  btn.onclick = (e) => {
    itemDetailModal.style.display = "flex";
    e.preventDefault();
  };
});

// klik tombol clode modal
document.querySelector(".modal .close-icon").onclick = (e) => {
  itemDetailModal.style.display = "none";
  e.preventDefault();
};

// klik diluar modal
window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = "none";
  }
};

console.log("tombol");

let tombol = document.querySelectorAll(".tombol");
for (let i = 0; i < tombol.length; i++) {
  tombol[i].addEventListener("click", function () {
    console.log(tombol[i].textContent);
    inputan.value = tombol[i].textContent;
  });
}
