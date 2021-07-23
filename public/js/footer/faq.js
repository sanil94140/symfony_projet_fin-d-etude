// FAQ

const questions = document.querySelectorAll(".containerFAQ a");
const reponses = document.querySelectorAll(".reponses");
const minus = document.querySelectorAll(".minus");
const plus = document.querySelectorAll(".plus");
for (let i = 0; i < questions.length; i++) {
  console.log(questions);
  questions[i].addEventListener("click", (evt) => {
    evt.preventDefault();
    if (minus[i].style.display == "none") {
      plus[i].style.display = "none";
      minus[i].style.display = "block";
      reponses[i].style.display = "block";
    } else {
      plus[i].style.display = "block";
      minus[i].style.display = "none";
      reponses[i].style.display = "none";
    }
  });
}
