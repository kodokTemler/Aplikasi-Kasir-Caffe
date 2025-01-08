document.addEventListener("alpine:init", () => {
  Alpine.data("product", () => ({
    items: [
      { id: 1, name: "Coffe Latte", img: "1,jpg", price: 10000 },
      { id: 2, name: "Mie Goreng", img: "2,jpg", price: 10000 },
      { id: 3, name: "Roti Bakar", img: "3,jpg", price: 15000 },
    ],
  }));
});
