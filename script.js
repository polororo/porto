const hamburger = document.getElementById("hamburger");
const navBar = document.querySelector("header .nav-bar");

hamburger.addEventListener("click", () => {
    navBar.classList.toggle("active");
});