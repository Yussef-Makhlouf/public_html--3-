// Navbar
const btnBar = document.querySelector(".btn-bar");
const nav = document.querySelector("nav");
const logoMobile = document.querySelector(".bg-logo");
const weather = document.querySelector(".nav-bar .weather");

btnBar.addEventListener("click", () => {
   weather.classList.toggle("active");
   nav.classList.toggle("active");
   logoMobile.classList.toggle("active");

   const isOpen = nav.classList.contains("active");

   btnBar.classList = isOpen
      ? "fa-solid fa-xmark btn-bar"
      : "fa-solid fa-bars btn-bar";
});

// DropDonw Submenu - Mobile
const dropdown = document.querySelectorAll(".dropdown");
const submenu = document.querySelectorAll(".submenu");
const dropdownIcon = document.querySelectorAll(".dropdown i");

dropdown.forEach((item, index) => {
   item.addEventListener("click", () => {
      if (item.className.includes("1")) {
         submenu[0].classList.toggle("active");
         submenu[1].classList.remove("active");
         const isOpen = submenu[0].classList.contains("active");
         dropdownIcon[0].classList = isOpen
            ? "fa-solid fa-angle-up"
            : "fa-solid fa-angle-down";
         dropdownIcon[1].classList = "fa-solid fa-angle-down";
      } else if (item.className.includes("2")) {
         submenu[1].classList.toggle("active");
         submenu[0].classList.remove("active");
         const isOpen = submenu[1].classList.contains("active");
         dropdownIcon[1].classList = isOpen
            ? "fa-solid fa-angle-up"
            : "fa-solid fa-angle-down";
         dropdownIcon[0].classList = "fa-solid fa-angle-down";
      }
   });
});

// Button Top
let scrollUp = document.querySelector(".btn-top");

window.onscroll = function () {
   this.scrollY >= 800
      ? scrollUp.classList.add("show")
      : scrollUp.classList.remove("show");
   // window.addEventListener('scroll', counter)
   window.addEventListener("scroll", sticky);
   if (
      window.location.pathname === "/" ||
      window.location.pathname.includes("index")
   ) {
      window.addEventListener("scroll", counter);
   }
};
const navbar = document.querySelector(".nav-bar");

function sticky() {
   if (window.pageYOffset >= navbar.offsetTop) {
      navbar.classList.add("sticky");
      console.log(navbar.offsetTop)
      console.log(window.pageYOffset)
      if(window.pageYOffset < 42 && navbar.offsetTop === 0) {
         navbar.classList.remove("sticky");
      }
      // if (window.pageYOffset > 192) {
      //    navbar.style.position = "fixed";
      // } else if (window.pageYOffset < 191) {
      //    // navbar.style.position = "fixed";
      //    navbar.classList.remove("sticky");
      // }
   } else {
      navbar.classList.remove("sticky");
   }
}

scrollUp.onclick = function () {
   window.scrollTo({
      top: 0,
      behavior: "smooth",
   });
   sticky();
};

// Change Language
const menuLang = document.querySelector(".menu-lang");

menuLang.addEventListener("click", () => {
   menuLang.classList.toggle("active");
});

function startCount(el) {
   let goal = el.dataset.goal;
   let countN = setInterval(() => {
      el.textContent++;
      if (el.textContent == goal) {
         clearInterval(countN);
      }
   }, 0.0000000000000000000000001 / goal);
}

// type
const types = document.querySelectorAll(".type");
const typesArray = Array.from(types);

types.forEach((el) => {
   el.addEventListener("click", (e) => {
      el.classList.remove("active");
      types.forEach((el) => {
         el.classList.remove("active");
      });
      e.currentTarget.classList.add("active");
   });
});

// // Indactor
document.addEventListener("DOMContentLoaded", function (event) {
   if (document.dir == "rtl") {
      var dataText = [
         "نستقبل",
         "نستمع",
         "نحلل بعناية",
         "نبدع في التنفيذ ",
         "ريادتنا هي سر نجاحنا",
      ];
   } else {
      var dataText = [
         "Receive",
         "Listen",
         "Analyze Carefully",
         "Excel in implementation",
         "Our leadership is the secret of our success",
      ];
      document.querySelector(".content-slogun h1").style =
         "font-family: 'Arya', sans-serif;";
   }

function typeWriter(text, i, fnCallback) {
   if (i < text.length) {
      document.querySelector(".content-slogun h1").innerHTML =
         text.substring(0, i + 1) + '<span class="cursor" aria-hidden="true"></span>';

      setTimeout(function () {
         typeWriter(text, i + 1, fnCallback);
      }, 100);
   } else if (typeof fnCallback == "function") {
      setTimeout(function () {
         document.querySelector(".content-slogun h1").lastElementChild.remove();
         fnCallback();
      }, 2500);
   }
}

   function StartTextAnimation(i) {
      if (typeof dataText[i] == "undefined") {
         return;
      }
      if (i < dataText[i].length) {
         typeWriter(dataText[i], 0, function () {
            StartTextAnimation(i + 1);
         });
      }
   }
   StartTextAnimation(0);
});

let imagesLazy = document.querySelectorAll("img");

imagesLazy.forEach((element) => {
   element.setAttribute("loading", "lazy");
});

let body = document.body;
let loader = document.querySelector(".looder");

document.addEventListener("DOMContentLoaded", (_) => {
   body.style.overflow = "visible";
   loader.style.display = "none";
});
