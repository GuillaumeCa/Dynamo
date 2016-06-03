function submit(e) {
  document.querySelector(e).submit();
}

function modifniveau (e) {
  var list = e.parentElement;
  var checkbox = list.querySelectorAll('.rectangle');
  var input = list.querySelector('input');
  var index = Array.prototype.indexOf.call(checkbox, e);
  for (var i = 0; i < checkbox.length; i++) {
    if (i <= index) {
      checkbox[i].classList.add('filled');
      input.value = i;
    } else {
      checkbox[i].classList.remove('filled');
    }
  }
  console.log(input, input.value);
}
