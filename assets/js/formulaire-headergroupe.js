var headerGroupe = document.querySelectorAll('.header_groupe')
var input = document.querySelectorAll('.edit')
console.log(input);
var form = document.querySelector('.modifierinfo')
var mod = false
console.log(headerGroupe)
var Boutton = document.querySelector('#InfoModifier')

if (Boutton) {
  Boutton.onclick = function(){
    if (mod) {
      form.submit()
    } else {
      mod = true
      Boutton.innerHTML = 'valider'
    }
    for (var i = 0; i < headerGroupe.length; i++) {
      headerGroupe[i].style.display = 'none'
    }
    for (var i = 0; i < input.length; i++) {
      input[i].style.display = 'block'
    }
  }
}
