function verif() {
  var mdp1 = document.getElementsByClassName('clear-form')[1];
  var mdp2 = document.getElementsByClassName('clear-form')[2];
  if ((mdp1.value != mdp2.value) && mdp2.value != "") {
    mdp1.style.backgroundColor = "red";
    mdp2.style.backgroundColor = "red";
    document.getElementById('submit').disabled = true;
  } else {
    document.getElementById('submit').disabled = false;
    mdp1.style.backgroundColor = "";
    mdp2.style.backgroundColor = "";
  }
}
