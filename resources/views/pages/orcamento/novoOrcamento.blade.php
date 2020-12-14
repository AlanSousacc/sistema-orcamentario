@extends('layouts.app', [
'namePage' => 'novo orçamento',
'class' => 'sidebar-mini',
'activePage' => 'novoorcamento',
])
@section('content')
<div class="col-sm-12 fixed-bottom mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>

<div class="panel-header panel-header-sm">
</div>
@push('scripts')
{{-- verifica se o pedido foi concluído com sucesso e abre o modal --}}
@if(session('orcamento'))
<script>
  $(function() {
    $('#impressao').modal('show');
  });
</script>
@endif
@endpush

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body ">
          <form action="{{route('orcamento.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('alerts.success')
            @include('pages.orcamento.formOrcamentos')
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-success btn-round w-100" disabled id="finalizarPedido" style="background: #016164"><i class="now-ui-icons ui-1_check"></i> Finalizar Orçamento</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('pages.orcamento.modalExportarOrcamento')
  {{-- modal editar quantidade --}}
  @include('pages.orcamento.modalAlterarQtde')
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src='{{asset('js/orcamento/orcamento.js')}}'></script>

{{-- toogle com o tolltip --}}
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

<script>
  var count = 0;

  function limpaCampos(){
    $('#obsitem').val('');
  }

  // Ajax para carregar o produto na grid ao selecionar o item e clicar no botão +
  $('#inserirMaterial').click(function(){
    $.ajax({
      url: '{{route('busca.material.orcamento')}}' + '/' + $('#material_id').val(),
      type: "get",
      dataType: "json"

    }).done(function(resposta) {
      let dados = resposta.data;

      var str = '<tr id="'+count+'">'
        str += '<input type="hidden" name="materiais_listagem_id[]" value="'+dados.id+'" />'
        str += '<input type="hidden" name="materiais_qtde[]" value="'+$('#qtde').val()+'" />'
        str += '<input type="hidden" name="obsitem[]" value="'+$('#obsitem').val()+'" />'

        if($('#obsitem').val() == ''){
          str += '<td class="text-left">'+ dados.descricao + '</td>'
        } else{
          str += '<td class="text-left">'+ dados.descricao + '<br><small class="obs-item"> ' + $('#obsitem').val() + '</small>' + '</td>'
        }
        if(dados.unidade == 'Metro'){
          str += '<td class="text-left "><a href="#" class="tdQtde" data-id="'+count+'" data-target="#altQtde" data-qtde_anterior="'+$('#qtde').val()+'" data-toggle="modal">'+ $('#qtde').val() +'</a> MT.</td>'
        } else if(dados.unidade == 'Centimetro'){
          str += '<td class="text-left "><a href="#" class="tdQtde" data-id="'+count+'" data-target="#altQtde" data-qtde_anterior="'+$('#qtde').val()+'" data-toggle="modal">'+ $('#qtde').val() +'</a> CM.</td>'
        } else if(dados.unidade == 'Pacote'){
          str += '<td class="text-left "><a href="#" class="tdQtde" data-id="'+count+'" data-target="#altQtde" data-qtde_anterior="'+$('#qtde').val()+'" data-toggle="modal">'+ $('#qtde').val() +'</a> PCT.</td>'
        } else {
          str += '<td class="text-left "><a href="#" class="tdQtde" data-id="'+count+'" data-target="#altQtde" data-qtde_anterior="'+$('#qtde').val()+'" data-toggle="modal">'+ $('#qtde').val() +'</a> UNID.</td>'
        }
        str += '<td class="text-center"><button class="btn btn-outline btn-sm btn-fab btn-icon btn-round" type="button" onclick="removerItem('+count+')" style="background: #016164"><i class="now-ui-icons ui-1_simple-remove"></i></button></td>'
        str += '</tr>';


        // habilita botão de finalizar pedido
        $('#finalizarPedido').prop('disabled', false);

        $('#qtde').val(1);
        $('#listaProd').append(str);
        count++;

        limpaCampos();
      }).fail(function(jqXHR, textStatus ) {
        alert("Falha ao inserir produto no pedido!" + textStatus);
      });
    });

    // remove o item da grid e atualiza o preço total
    function removerItem(id){
      $('#'+ id).remove()
    }
  </script>

  {{-- fecha modal de impressao --}}
  <script>
    $('.imprimir').click(function(){
      $('#impressao').modal('hide');
    })
  </script>

  @endpush
  @endsection
