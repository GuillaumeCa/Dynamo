var liste;
var el;

function updateListe() {
  liste = document.querySelector('.liste-membres');
  el = liste.querySelectorAll('input');
  for (var i = 0; i < el.length; i++) {
    el[i].oninput = addField;
    el[i].autocomplete = 'off';
    //el[i].classList.add('fadein');
  }
}

function addField(e) {
  var element = document.createElement('li');
  element.innerHTML = '<input class="clear-form membres" type="text" name="membre[]" placeholder="ajouter..." disabled style="opacity: 0.4;">';
  element.classList.add('fadein');
  for (var i = 0; i < el.length; i++) {
    if (el[i] == e.target) {
      // Ajoute un champ d'email à la fin de la liste lorsque
      // l'on entre du texte dans l'avant dernier champ. On met
      // également à jour la liste des éléments
      if (i == el.length - 1) {
        liste.appendChild(element);
        updateListe();
      }
      if (i+1 < el.length && i == el.length - 2) {
        // Désactive le champ suivant lorsque le champ actuel
        // est vide et le réactive lorsqu'il est non vide.
        if (el[i].value != '') {
          el[i+1].style.opacity = 1;
          el[i+1].removeAttribute('disabled');
        } else if (el[i].value == '' && el[i+1].value != '') {
          el[i].remove()
        } else {
          el[i+1].style.opacity = 0.5;
          el[i+1].setAttribute('disabled');
        }
      }
    }
    // Supprime le champ suivant lorsque le champ précédent est vide
    if (i-1 > 0 && el[i-1].value == '') {
      el[i].remove();
    }
  }
  // Met à jour la liste des emails
  el = liste.querySelectorAll('input');
}

updateListe();
