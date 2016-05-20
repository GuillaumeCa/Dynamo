var TD = document.querySelectorAll('.info-table td span')
var input = document.querySelectorAll('.info-table td input')
console.log(input);
var form = document.querySelector('.modifierinfo')
var mod = false
console.log(TD)
var Boutton = document.querySelector('#InfoModifier')

Boutton.onclick = function(){
  if (mod) {
      form.submit()
  } else {
      mod = true
      Boutton.innerHTML = 'valider'
  }
  for (var i = 0; i < TD.length; i++) {
    TD[i].style.display = 'none'
    input[i].type = 'text'
  }
}
