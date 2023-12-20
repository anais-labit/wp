const btnToTop = document.querySelector("#btn-back-to-top");

document.addEventListener("scroll", async (event) => {
  event.preventDefault();
  displayBtn();
});

function displayBtn() {
  if (document.body.scrollTop > 18 || document.documentElement.scrollTop > 18) {
    btnToTop.style.display = "block";
  } else {
    btnToTop.style.display = "none";
  }
}

btnToTop.addEventListener("click", async (event) => {
  event.preventDefault();
  goTop();
});

function goTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}


// smooth scrolling pour les ancres
document.addEventListener("DOMContentLoaded", function () {
  var smoothScrollLinks = document.querySelectorAll('a[href^="#"]');

  smoothScrollLinks.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      var target = document.querySelector(this.getAttribute("href"));

      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
        });
      }
    });
  });
});
