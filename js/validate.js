const firstPass = document.querySelector("#firstPass");
const secondPass = document.querySelector("#secondPass");
const errorText = document.querySelector("#error-text");
const myButton = document.querySelector("#button");
let passwordStrength = false;

/** 
Regex expression makes sure it has at least 6 characters of which at least one is an uppercase letter, 
one is a lowercase letter, and one is a special character.
*/
const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[0-9]).{6,}$/;



// When the button to submit the form is submitted it calls this function.
// If the passwords do not match, it throws up an error message and doesn't allow the submission to go through.
// Otherwise it briefly describes a success message and allows the submission to continue.
myButton.onclick = function () {
  // Checks to make sure password follows requirements
  if (regex.test(firstPass.value)) {
    passwordStrength = true;
  }
  if (firstPass.value != secondPass.value) {
    errorText.style.display = "block";
    errorText.classList.remove("matched");
    errorText.textContent = "Greška! Lozinke nisu iste!";
    return false;
  } else if (passwordStrength === false) {
    errorText.style.display = "block";
    errorText.classList.remove("matched");
    errorText.textContent = "Lozinka mora imati najmanje 6 znakova s barem jedno veliko slovo, jedno malo slovo, jedan broj i jedan poseban znak.";
    return false;
  } else {
    errorText.style.display = "block";
    errorText.classList.add("matched");
    errorText.classList.remove("text-danger");
    errorText.textContent = "Lozinke su iste.";
    return true;
  }
};
