var currentURL = window.location.href;
var links = document.getElementsByClassName("nav_link");
var list = document.getElementsByClassName("list");

var activeLink = null;

for (var i = 0; i < links.length; i++) {
  list[i].addEventListener("click", function () {
    if (activeLink !== null) {
      activeLink.classList.remove("active");
    }

    activeLink = this;
    activeLink.classList.add("active");
  });
}
