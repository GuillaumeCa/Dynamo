search = document.querySelector('.search input')
var cats = document.querySelectorAll('.cat')
for (var i = 0; i < cats.length; i++) {
  cats[i].style.display = 'none'
}

function instantSearch() {
  search.onfocus = function () {
    document.querySelector('.result').classList.add('visible')
  }

  document.body.onclick = function (e) {
    if (e.target != document.querySelector('.result') && e.target != search) {
      document.querySelector('.result').classList.remove('visible')
    }
  }

  search.oninput = function (e) {
    var cats = document.querySelectorAll('.cat')
    for (var i = 0; i < cats.length; i++) {
      cats[i].style.display = 'block'
    }
    document.querySelector('.result .info').style.display = 'none'
    Ajax(e.target.value, function (res) {
      var groupes = res.groupe
      cats[0].querySelector('ul').innerHTML = ""
      for (var key in groupes) {
        var groupe = groupes[key]
        var link = document.createElement('a')
        link.href = '/' + res.urlgroupe.replace('{id}', groupe.id)
        var li = document.createElement('li')
        li.innerHTML = "<div class='image' style='background-image: url(/assets/images/sport1.png)'></div>" +
                       "<div class='text'>" +
                       "<h2>" + groupe.titre + "</h2>" +
                       "<h3><b>Sport</b> " + groupe.sport + "</h3>" +
                       "<h3><b>Club</b> " + groupe.club + "</h3>" +
                       "</div>" +
                       "<span>" + groupe.nb_user + "<span class='small'>/" + groupe.nbmaxutil + "</span></span>"
        link.appendChild(li)
        cats[0].querySelector('ul').appendChild(link)
      }
      var sports = res.sports
      cats[1].querySelector('ul').innerHTML = ""
      for (var key in sports) {
        var sport = sports[key]
        var link = document.createElement('a')
        link.href = '/' + res.urlsport.replace('{id}', sport.id)
        var li = document.createElement('li')
        li.innerHTML = "<div class='icon'><svg><use xlink:href='#typeSport" + sport.id_type + "'></use></svg></div>" +
                       "<div class='text'>" +
                       "<h2>" + sport.nom + "</h2>" +
                       "</div>"
        link.appendChild(li)
        cats[1].querySelector('ul').appendChild(link)
      }
      var users = res.users
      cats[2].querySelector('ul').innerHTML = ""
      for (var key in users) {
        var user = users[key]
        var link = document.createElement('a')
        var li = document.createElement('li')
        li.innerHTML = "<div class='image crop-circle' style='background-image: url(/assets/images/sport1.png)'></div>" +
                       "<div class='text'>" +
                       "<h2>" + user.nom + " " + user.prénom + "</h2>" +
                       "</div>"
        link.appendChild(li)
        cats[2].querySelector('ul').appendChild(link)
      }
    })
  }
}

function Ajax(req, done) {
  var http = new XMLHttpRequest();
  http.onreadystatechange = function () {
    if (http.readyState === XMLHttpRequest.DONE) {
      if (http.status === 200) {
        done(JSON.parse(http.responseText));
      } else {
        alert('There was a problem with the request.');
      }
    }
  };
  http.open("GET", "/fr/ajax/search?s=" + req, true);
  http.send();
}

instantSearch()
