function verif() {
  var mdp1 = document.getElementsByClassName('mdp')[0];
  var mdp2 = document.getElementsByClassName('mdp')[1];
  var green = "rgba(65, 255, 34, 0.55)";
  var red = "rgba(255, 34, 34, 0.55)";
  if ((mdp1.value != mdp2.value) && mdp2.value != "") {
    mdp1.style.borderColor = red;
    mdp2.style.borderColor = red;
    mdp1.style.color = red;
    mdp2.style.color = red;
    document.getElementById('submit').disabled = true;
  } else {
    document.getElementById('submit').disabled = false;
    mdp1.style.borderColor = green;
    mdp2.style.borderColor = green;
    mdp1.style.color = green;
    mdp2.style.color = green;
  }
}
