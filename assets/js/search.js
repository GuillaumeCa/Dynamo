select = document.querySelectorAll('select');

function getFilters() {
  var filters = {};
  // Parcours tous les menu déroulant
  for (var i = 0; i < select.length; i++) {
    // Sélectionne uniquement les menus du filtre
    if (select[i].hasAttribute('filter-type')) {
      var option = select[i].options[select[i].selectedIndex];
      var type = select[i].getAttribute('filter-type');
      // Sélection du label affichant le filtre actif
      var label = document.querySelector('.' + type + '-filter');

      // Ajoute un filtre au dictionnaire
      if (option.value != '') {
        filters[type] = option.value;
        label.innerHTML = option.innerHTML;
      } else {
        label.innerHTML = '';
      }
    }
  }
  return filters;
}

function filterSearch(e) {
  // Récupère les filtres actifs
  var filters = getFilters();

  var result = document.querySelectorAll('.search-result');

  // Sélection du compteur de résultats
  var num = document.querySelector('.number');
  var count = 0;

  // Parcours toutes les listes de résultat
  for (var i = 0; i < result.length; i++) {
    row = result[i].children;

    // Parcours tous les éléments de la liste
    for (var k = 0; k < row.length; k++) {
      var hide = false;
      // Parcours tous les filtres activés
      for (var key in filters) {
        if (row[k].hasAttribute('filter-' + key)) {
          if (row[k].getAttribute('filter-' + key) != filters[key]) {
            hide = true;
          }
        }
      }

      if (hide) {
        row[k].style.display = 'none';
      } else {
        row[k].style.display = '';
        count += 1;
      }
    }
  }

  // Mise à jour du compteur de résultats
  num.innerHTML = count;

}


function initSearch() {
  // Parcours tous les menus déroulants
  for (var i = 0; i < select.length; i++) {
    // Sélectionne uniquement les menus du filtre
    if (select[i].hasAttribute('filter-type')) {
      // Attache une fonction sur les menus
      select[i].onchange = function (e) {
        filterSearch(e.target)
      };
    }
  }
}

function switchCategory(e) {

  var cat = document.querySelectorAll('.switch-cat');
  var lists = document.querySelectorAll('.search-list');

  for (var i = 0; i < cat.length; i++) {
    if (e == i) {
      cat[i].classList.add('active')
      lists[i].classList.add('active')
      localStorage.setItem('cat', i)
    } else {
      cat[i].classList.remove('active')
      lists[i].classList.remove('active')
    }
  }
}

function initCategories() {
  var cat = document.querySelectorAll('.switch-cat');

  if (!localStorage.getItem('cat')) {
    localStorage.setItem("cat", 0)
  } else {
    switchCategory(localStorage.getItem('cat'));
  }

  // Sélection du compteur de résultats
  var num = document.querySelector('.number');


  for (var i = 0; i < cat.length; i++) {
    (function (i) {
      cat[i].onclick = function () {
        switchCategory(i);
      };
    })(i);
  }
}

initSearch()
initCategories()
document.querySelector('.search').style.display = 'none';


function addParamUrl(name, value) {
  window.location.href += '&' + name + '=' + value;
}

function getParamUrl(name) {
  var url = window.location.href;
  var params = url.split('?')[1].split('&');
  for (var i = 0; i < params.length; i++) {
    if (name == params[i].split('=')[0]) {
      return params[i].split('=')[1];
    }
  }
  return null;
}
