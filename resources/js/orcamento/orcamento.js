$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var contid = button.data('contid');
  var modal  = $(this);
  modal.find('.modal-body #contid').val(contid);
});

$('#altQtde').on('show.bs.modal', function (event) {
  var button        = $(event.relatedTarget);
  var id            = button.data('id');
  var modal         = $(this);
  modal.find('.modal-body #qtde_anterior').val($('a[data-id='+id+']').text());
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #qtde_add').val(0);
});



$(document).ready(function() {
  $('.js-example-basic-single').select2();
});

$('#altQtde').on('hide.bs.modal', function (event) {
  $('#qtde_add').val("");
});

$('.cancel').click(function(){
  $('#qtde_add').val("");
});

$('.confirmar').click(function(){
  var antigo  = $('#qtde_anterior').val();
  var novo = $('#qtde_add').val();
  var id = $('#id').val();
  total = parseInt(novo) + parseInt(antigo);
  $('a[data-id='+id+']').text(total);
  $('a[data-id='+id+']').attr('data-qtde_anterior', total);
  $("tr#"+id+" input[name='materiais_qtde[]']").val(total);
});
