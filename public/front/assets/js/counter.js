// Number Counter
let nums = document.querySelectorAll(".nums .num .num-count");
let section = document.querySelector(".products");
let startede = false;

window.addEventListener("scroll", function () {
   if (window.scrollY >= section.offsetTop) {
      counter();
   }
});

function counter() {
   if (!startede) {
      nums.forEach((num) => startCount(num));
   }
   startede = true;
}
