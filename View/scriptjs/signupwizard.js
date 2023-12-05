const form1 = document.getElementById("form1");
const form2 = document.getElementById("form2");
const form3 = document.getElementById("form3");
const nextButton = document.getElementById("next");
const prevButton = document.getElementById("prev");
const prenom = document.getElementById("prenom");
const prenomError = document.getElementById("prenomError");
const nom = document.getElementById("nom");
const nomError = document.getElementById("nomError");
const email = document.getElementById("email");
const emailError = document.getElementById("emailError");
const numTel = document.getElementById("numTel");
const numTelError = document.getElementById("numTelError");
const adresse = document.getElementById("adresse");
const adresseError = document.getElementById("adresseError");
const role = document.getElementById("role");
const roleError = document.getElementById("roleError");
const password = document.getElementById("password");
const cpassword = document.getElementById("cpassword");
const verifyPassword = document.getElementById("passwordVerify");
const warning = document.querySelector(".warn.d-none");
const circles = document.querySelectorAll(".circle");
let click = 0;

const htmlConducteur = `
  <div class="row w-100 ms-0 mb-3">
    <input type="number" class="form-control mx-1" placeholder="Nombre des Places" aria-label="nbPlaces" id="nbPlaces" name="nbPlaces" />
  </div>
  <div class="row w-100 ms-0 mb-3">
    <input type="text" class="form-control mx-1" placeholder="Modele de voiture" aria-label="modeleVoiture" id="modeleVoiture" name="modeleVoiture" />
  </div>
`;

nom.addEventListener("keydown", (event) => {
  if (!event.key.match("[a-zA-Z]")) {
    event.preventDefault();
    nomError.innerText = "Le champ est vide";
    nomError.style.color = "red";
  } else {
    nomError.innerText = "";
  }
});

prenom.addEventListener("keydown", (event) => {
  if (!event.key.match("[a-zA-Z]")) {
    event.preventDefault();
    prenomError.innerText = "Le champ est vide";
    prenomError.style.color = "red";
  } else {
    prenomError.innerText = "";
  }
});

email.addEventListener("keydown", () => {
  if (email.value.trim().length === 0) {
    emailError.innerText = "Le champ est vide";
    emailError.style.color = "red";
  } else if (!email.value.match("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$")) {
    emailError.innerText = "Le format de l'email est incorrect";
    emailError.style.color = "red";
  } else {
    emailError.innerText = "";
  }
});

numTel.addEventListener("keydown", (event) => {
  if (numTel.value.trim().length > 8) {
    event.preventDefault();
    numTelError.innerText = "Le champ est vide";
    numTelError.style.color = "red";
  } else {
    numTelError.innerText = "";
  }
});

adresse.addEventListener("keydown", () => {
  adresseError.innerText = adresse.value.trim().length === 0 ? "Le champ est vide" : "";
});

role.addEventListener("change", () => {
  roleError.innerText = role.selectedIndex === 0 ? "Le champ est vide" : "";
});

password.addEventListener("keyup", () => {
  verifyPassword.innerText = password.value.trim().length === 0 ? "Le champ est vide" : "";
});

cpassword.addEventListener("keyup", () => {
  if (cpassword.value.trim().length === 0) {
    verifyPassword.innerText = "Le champ est vide";
  } else if (cpassword.value !== password.value) {
    verifyPassword.innerText = "Les mots de passe ne sont pas identiques";
  } else {
    verifyPassword.innerText = "";
  }
});

nextButton.addEventListener("click", () => {
  if (
    prenom.value.trim().length === 0 ||
    nom.value.trim().length === 0 ||
    email.value.trim().length === 0 ||
    numTel.value.trim().length === 0 ||
    adresse.value.trim().length === 0 ||
    role.selectedIndex === 0 ||
    password.value.trim().length === 0 ||
    cpassword.value.trim().length === 0 ||
    cpassword.value !== password.value
  ) {
    return;
  }

  click++;
  if (click === 1) {
    prevButton.disabled = false;
    form1.classList.add("d-none");
    circles[1].classList.add("active");
    form2.innerHTML = role.selectedIndex === 1 ? htmlConducteur : "";
  } else if (click === 2) {
    circles[2].classList.add("active");
    form2.classList.add("d-none");
    form3.classList.remove("d-none");
    nextButton.innerHTML = "Submit";
    nextButton.type = "submit";
  }
});

prevButton.addEventListener("click", () => {
  click--;
  if (click === 0) {
    prevButton.disabled = true;
    form1.classList.remove("d-none");
    circles[1].classList.remove("active");
    form2.innerHTML = "";
  } else if (click === 1) {
    circles[2].classList.remove("active");
    form2.classList.remove("d-none");
    form3.classList.add("d-none");
    nextButton.innerHTML = "Next";
    nextButton.type = "button";
  }
});
