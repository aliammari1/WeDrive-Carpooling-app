const form1 = document.getElementById("form1");
const form2 = document.getElementById("form2");
const form3 = document.getElementById("form3");
const nextButton = document.getElementById("next");
const prevButton = document.getElementById("prev");
const prenom = document.getElementById("prenom");
const prenomError = document.getElementById("prenomError");
let testPrenom = false;
const nom = document.getElementById("nom");
const nomError = document.getElementById("nomError");
let testNom = false;
const email = document.getElementById("email");
const emailError = document.getElementById("emailError");
let testEmail = false;
const numTel = document.getElementById("numTel");
const numTelError = document.getElementById("numTelError");
let testNumTel = false;
const adresse = document.getElementById("adresse");
const adresseError = document.getElementById("adresseError");
let testAdresse = false;
const role = document.getElementById("role");
const roleError = document.getElementById("roleError");
let testRole = false;
const password = document.getElementById("password");
const cpassword = document.getElementById("cpassword");
const verifyPassword = document.getElementById("passwordVerify");
let testPassword = false;
const warning = document.querySelector(".warn.d-none");
const circles = document.querySelectorAll(".circle");
let click = 0;
const htmlConducteur =
  '<div class="row w-100 ms-0 mb-3">' +
  "<input" +
  ' type="number"' +
  ' class="form-control mx-1"' +
  ' placeholder="Nombre des Places"' +
  ' aria-label="nbPlaces"' +
  ' id="nbPlaces"' +
  ' name="nbPlaces" />' +
  "</div>" +
  '<div class="row w-100 ms-0 mb-3">' +
  "<input" +
  ' type="text"' +
  ' class="form-control mx-1"' +
  ' placeholder="Modele de voiture"' +
  ' aria-label="modeleVoiture"' +
  ' id="modeleVoiture"' +
  ' name="modeleVoiture" />' +
  '</div>"';
// const htmlVerify =
const htmlPassager = "";
nom.addEventListener("keydown", (event) => {
  let key = event.key;
  if (key.match("[a-zA-Z]")) {
    nomError.innerText = "";
    testNom = true;
    return;
  }
  event.preventDefault();
  nomError.innerText = "le champs est vide";
  nomError.style.color = "red";
  testNom = false;
});

prenom.addEventListener("keydown", (event) => {
  let key = event.key;
  if (key.match("[a-zA-Z]")) {
    prenomError.innerText = "";
    testPrenom = true;
    return;
  }
  event.preventDefault();
  prenomError.innerText = "le champs est vide";
  prenomError.style.color = "red";
  testPrenom = false;
});

email.addEventListener("keydown", () => {
  if (email.value.trim().length === 0) {
    emailError.innerText = "le champs est vide";
    emailError.style.color = "red";
    testEmail = false;
    return;
  }
  if (!email.value.match("^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$")) {
    emailError.innerText = "le format de l'email est incorrect";
    emailError.style.color = "red";
    testEmail = false;
    return;
  }
  emailError.innerText = "";
  testEmail = true;
});

numTel.addEventListener("keydown", (event) => {
  if (numTel.value.trim().length <= 8) {
    numTelError.innerText = "";
    testNumTel = true;
    return;
  }
  event.preventDefault();
  numTelError.innerText = "le champs est vide";
  numTelError.style.color = "red";
  testNumTel = false;
});

adresse.addEventListener("keydown", (event) => {
  if (adresse.value.trim().length === 0) {
    adresseError.innerText = "le champs est vide";
    adresseError.style.color = "red";
    return;
  }
  adresseError.innerText = "";
});

role.addEventListener("change", () => {
  if (role.selectedIndex === 0) {
    roleError.innerText = "le champs est vide";
    roleError.style.color = "red";
    testRole = false;
    return;
  }
  roleError.innerText = "";
  testRole = true;
});

password.addEventListener("keyup", () => {
  if (password.value.trim().length === 0) {
    verifyPassword.innerText = "le champs est vide";
    verifyPassword.style.color = "red";
    testPassword = false;
    return;
  }
  testPassword = true;
  verifyPassword.innerText = "";
});

cpassword.addEventListener("keyup", () => {
  if (cpassword.value.trim().length === 0) {
    verifyPassword.innerText = "le champs est vide";
    verifyPassword.style.color = "red";
    testPassword = false;
    return;
  }
  if (cpassword.value !== password.value) {
    verifyPassword.innerText = "les mots de passe ne sont pas identiques";
    verifyPassword.style.color = "red";
    testPassword = false;
    return;
  }
  testPassword = true;
  verifyPassword.innerText = "";
});

nextButton.addEventListener("click", () => {
  if (
    testPrenom &&
    testNom &&
    testEmail &&
    testNumTel &&
    testRole &&
    testAdresse &&
    testPassword
  ) {
    warning.classList.remove("d-none");
    return;
  }
  click++;
  if (click === 1) {
    prevButton.disabled = 0;
    form1.classList.add("d-none");
    warning.classList.add("d-none");
    circles[1].classList.add("active");
    form2.innerHTML = role.selectedIndex === 1 ? htmlConducteur : htmlPassager;
    return;
  }
  circles[2].classList.add("active");
  form2.classList.add("d-none");
  form3.classList.remove("d-none");
  nextButton.innerHTML = "Submit";
  if (click === 3) {
    nextButton.type = "submit";
  }
});

prevButton.addEventListener("click", () => {
  click--;
  if (click === 0) {
    prevButton.disabled = 1;
    form1.classList.remove("d-none");
    warning.classList.add("d-none");
    circles[1].classList.remove("active");
    form2.innerHTML = "";
    return;
  }
  circles[2].classList.remove("active");
  form2.classList.remove("d-none");
  form3.classList.add("d-none");
  nextButton.disabled = 0;
  nextButton.innerHTML = "Next";
});
