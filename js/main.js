const navbarToggle = document.querySelector(".navbar-toggle");
const navbarItems = document.querySelector(".navbar-items");

navbarToggle.addEventListener("click", () => {
  navbarItems.classList.toggle("show");
});