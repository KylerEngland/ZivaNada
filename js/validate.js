const newPassword = document.querySelector("#newPassword");
const newPassword2 = document.querySelector("#newPassword2");
const errorText = document.querySelector("#error-text");
const myButton = document.querySelector("#button");

// Function to validate the passwords.
function validateLength() {
  if (newPassword.value.length >= 8) {
    myButton.removeAttribute("disabled", "");
    myButton.classList.add("active");
    newPassword2.removeAttribute("disabled", "");
  } else {
    myButton.setAttribute("disabled", "");
    myButton.classList.remove("active");
    newPassword2.setAttribute("disabled", "");
  }
}
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
