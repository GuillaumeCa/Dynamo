var mdp1 = document.querySelectorAll('.mdp')[0];
var mdp2 = document.querySelectorAll('.mdp')[1];

function resetColor() {
  mdp1.style.borderColor = "";
  mdp2.style.borderColor = "";
  mdp1.style.color = "";
  mdp2.style.color = "";
}

function setColor(color, item) {
  item.style.borderColor = color;
  item.style.color = color;
}

function passwordStrength(password) {
  var verification = /(?=.*[A-Z])(?=.*[0-9]+)/;
  return (verification.exec(password) && password.length > 7)
}

function verif() {
  var submit = document.querySelector('#submit');
  var green = "rgba(65, 255, 34, 0.55)";
  var red = "rgba(255, 34, 34, 0.55)";
  var orange = "rgba(254, 170, 36, 0.57)"
  var warning = document.createElement("p");
  var errors = document.querySelector(".errors");
  warning.innerHTML = "Le mot de passe est trop faible";
  errors.innerHTML = "";
  if ((mdp1.value != mdp2.value) && mdp2.value != "") {
    setColor(red, mdp1);
    setColor(red, mdp2);
    submit.disabled = true;
  } else if (mdp2.value != "") {
    console.log('verif', !passwordStrength(mdp1.value));
    if (!passwordStrength(mdp1.value)) {
      errors.appendChild(warning);
      submit.disabled = true;
      setColor(orange, mdp1);
      setColor(orange, mdp2);
    } else {
      setColor(green, mdp1);
      setColor(green, mdp2);
      submit.disabled = false;
    }

  }
  if (mdp2.value == "" || mdp1.value == "") {
    resetColor();
  }
}

function resetMdp() {
  if (mdp2.value != "") {
    mdp2.value = "";
    mdp1.value = "";
    resetColor();
  }
  document.querySelector(".errors").innerHTML = "";
}
