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

// const boutonEmail = document.querySelector(".souscription-email button");
// const inputEmail = document.querySelector(".souscription-email input");
// const paragrapheEmail = document.querySelector(".paragrapheEmail");
// boutonEmail.addEventListener("click", () => {
//   alert(console.log(inputEmail) + "\n" + console.log(inputEmail.value));
//   for (let i = 0; i < inputEmail.value; i++) {
//     paragrapheEmail.innerText = "";
//     if ((inputEmail.value.length = 0)) {
//       paragrapheEmail.innerText = "Aucun adresse mail n'a été entrée";
//     } else {
//       let verif = 0;
//       if (inputEmail.value == "@") {
//         verif++;
//       }
//       if ((verif = 0)) {
//         paragrapheEmail.innerText = "Votre adresse mail n'est pas valide";
//       } else {
//         paragrapheEmail.innerText =
//           "Félicitation!! Vous allez recevoir des contenues de qualité. Restez bien connecté à votre boite mail";
//       }
//     }
//   }
// });
