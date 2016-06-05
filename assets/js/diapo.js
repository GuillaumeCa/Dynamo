var diapo = document.querySelector('#diaporama')
var count = 0
var duree = 3 // interval en s

function updateDiapo() {
  images = diapo.children
  for (var i = 0; i < images.length; i++) {
    images[i].classList.remove('visible')
    if (i == count) {
      images[i].classList.add('visible')
    }
  }
}

function initDiapo() {
  setInterval(function () {
    count == diapo.children.length - 1 ? count = 0 : count++
    updateDiapo()
  }, duree * 1000);
}

initDiapo()
