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

function togglemodal(e) {
  event.preventDefault();
  if (document.body.style.overflow != 'hidden') {
    document.body.style.overflow = 'hidden'
  } else {
    document.body.style.overflow = ''
  }

  document.querySelector('#'+e).classList.toggle('visible');
}

function editInfo(info, form) {
  var info = document.querySelector(info),
      form = document.querySelector(form);
    info.classList.toggle('editing');
    form.classList.toggle('editing');
    if (info.classList.contains('editing')) {
      form.children[0].submit();
    } else {
      this.innerHTML = 'Valider';
    }
}
