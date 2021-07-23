const boutonNavbar = document.querySelector(".barreNav");
const navbarMobile = document.querySelector(".navbar2");
boutonNavbar.addEventListener("click", (evt) => {
  evt.preventDefault();
  if (navbarMobile.style.display === "none") {
    navbarMobile.style.display = "block";
  } else {
    navbarMobile.style.display = "none";
  }
});
