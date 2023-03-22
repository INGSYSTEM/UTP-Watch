addEventListener('DOMContentLoaded', () => {
  const btn_menu = document.querySelector('.btn_menu')
  if (btn_menu){
    btn_menu.addEventListener('click', () => {
      const menu_items = document.querySelector('.menu_items')
      menu_items.classList.toggle('show')
    })
  }
})

window.addEventListener("scroll", function() {
  var menu = document.querySelector(".menu");
  if (window.scrollY > 0) {
    menu.classList.add("black");
    menu.classList.remove("transparent");
  } else {
    menu.classList.add("transparent");
    menu.classList.remove("black");
  }
});
