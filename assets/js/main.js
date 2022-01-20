const swiper = new Swiper(".swiper", {
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// add to cart count changing
const count = document.getElementById("count");
const cart = document.querySelectorAll(".cart");

cart.forEach((c) => {
  c.addEventListener("click", () => {
    count.textContent == parseInt(count.textContent) + 1;
  });
});

// change the image
function changeImage(a) {
  document.getElementById("main-img").src = a.src;
}
