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

const boutonDemande = document.querySelector("form button");
const tousInputs = document.querySelectorAll("form input");
const textArea = document.querySelector("textarea");
const paraTousInsputs = document.querySelectorAll("form p");

boutonDemande.addEventListener("click", (evt) => {
  evt.preventDefault();
  paraTousInsputs[3].innerText = "";
  if (tousInputs[0].value === "") {
    paraTousInsputs[0].innerText =
      "Vous n'avez pas remplie votre nom, veuillez le saisir";
  } else {
    paraTousInsputs[0].innerText = "";
  }
  if (tousInputs[1].value === "") {
    paraTousInsputs[1].innerText =
      "Vous n'avez pas remplie votre mail, veuillez le saisir";
  } else {
    console.log(tousInputs[1].value.indexOf("@"));
    if (tousInputs[1].value.indexOf("@") == -1) {
      paraTousInsputs[1].innerText =
        "L'adresse mail que vous avez indiqué n'est pas valide";
    } else {
      paraTousInsputs[1].innerText = "";
    }
  }
  console.log(textArea);
  console.log(textArea.value);
  console.log(textArea.innerText);
  console.log(textArea.innerHTML);
  if (textArea.value === "") {
    paraTousInsputs[2].innerText =
      "Vous n'avez pas indiqué votre demande, veuillez le saisir";
  } else {
    paraTousInsputs[2].innerText = "";
  }
  for (let i = 0; i < 3; i++) {
    if (paraTousInsputs[i].innerText !== "") {
      return;
    }
  }
  paraTousInsputs[3].innerText =
    "Nous avons bien enregistré votre demande. Nous allons le traiter dans les plus brefs délais";
  tousInputs[0].value = "";
  tousInputs[1].value = "";
  textArea.value = "";
});
