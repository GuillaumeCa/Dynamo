function verif() {
  var mdp1 = document.getElementsByClassName('mdp')[0];
  var mdp2 = document.getElementsByClassName('mdp')[1];
  if ((mdp1.value != mdp2.value) && mdp2.value != "") {
    mdp1.style.backgroundColor = "rgba(255, 34, 34, 0.55)";
    mdp2.style.backgroundColor = "rgba(255, 34, 34, 0.55)";
    document.getElementById('submit').disabled = true;
  } else {
    document.getElementById('submit').disabled = false;
    mdp1.style.backgroundColor = "";
    mdp2.style.backgroundColor = "";
  }
}
