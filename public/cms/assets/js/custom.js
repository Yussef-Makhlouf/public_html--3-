/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
let lang = document.dir;
if (lang == "rtl") {
   localStorage.removeItem("theme");
   let radios = document.querySelectorAll('[name="main-theme"]');
   radios.forEach((element) => {
      let sideBar = document.querySelector(".offcanvas-body");
      sideBar.firstElementChild.classList.add("d-none");
      element.closest(".list-group").classList.add("d-none");
      element.classList.add("d-none");
   });
}
