const newPassword = document.querySelector("#newPassword");
const newPassword2 = document.querySelector("#newPassword2");
const errorText = document.querySelector("#error-text");
const myButton = document.querySelector("#button");

myButton.onclick = function () {
  if (newPassword.value != newPassword2.value) {
    errorText.style.display = "block";
    errorText.classList.remove("matched");
    errorText.textContent = "Greška! Lozinke nisu iste!";
    return false;
  } else {
    errorText.style.display = "block";
    errorText.classList.add("matched");
    errorText.classList.remove("text-danger");
    errorText.textContent = "Lozinke su iste.";
    return true;
  }
};
