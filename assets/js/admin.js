function selectAll(e) {
  var check = document.querySelectorAll('table input[type="checkbox"]')
  for (var i = 0; i < check.length; i++) {
    if (e.checked == true) {
      check[i].checked = true
    } else {
      check[i].checked = false
    }
  }
}

function togglemodal(e) {
  document.querySelector('#'+e).classList.toggle('visible');
}

function modify() {
  this.event.preventDefault();
  var checked = document.querySelectorAll('.table-admin input:checked');
  if (checked.length == 1) {
    checked = checked[0];
    togglemodal('modify-'+checked.value);
  } else {
    alert('Sélectionnez un seul élément');
  }
}
