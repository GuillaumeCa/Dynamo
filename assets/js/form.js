edit = false;
function submit(e) {
  document.querySelector(e).submit();
}

function modifniveau (e) {
  var list = e.parentElement;
  var checkbox = list.querySelectorAll('.rectangle');
  var input = list.querySelector('input');
  var index = Array.prototype.indexOf.call(checkbox, e);
  if (edit) {
    for (var i = 0; i < checkbox.length; i++) {
      if (i <= index) {
        checkbox[i].classList.add('filled');
        input.value = i+1;
      } else {
        checkbox[i].classList.remove('filled');
      }
    }
  }
}

function showNiveau(e) {
  var inputs = document.querySelectorAll(e+' input');
  if (inputs.length != 0) {
    for (var i = 0; i < inputs.length; i++) {
      niv = inputs[i].value;
      rec = inputs[i].parentElement.querySelectorAll('.rectangle');
      for (var j = 0; j < niv; j++) {
        rec[j].classList.add('filled');
      }
    }
  }
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

function editInfo(e, info, form) {
  var info = document.querySelector(info),
      form = document.querySelector(form);
    info.classList.toggle('editing');
    form.classList.toggle('editing');
    if (info.classList.contains('editing')) {
      form.children[0].submit();
    } else {
      console.log(this);
      e.id = '';
      e.innerHTML = 'Valider';
    }
}

function editing(e) {
  event.preventDefault();
  edit = !edit;
  if (event.target.innerHTML == 'valider') {
    form = document.querySelector('.'+e);
    form.submit();
  } else {
    event.target.innerHTML = 'valider';
  }
}

showNiveau('.liste-scope')
