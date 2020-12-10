@extends('layouts.app', [
'namePage' => 'editar orçamento',
'class' => 'sidebar-mini',
'activePage' => 'editarorcamento',
])
@section('content')
<div class="col-sm-12 fixed-bottom mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>

<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">{{__("Editar Orçamento")}}</h5>
        </div>
        <div class="card-body">
          <form action="{{route('orcamento.update', $orcamento->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            @include('alerts.success')
            @include('pages.orcamento.formOrcamentos')
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary btn-round" id="finalizaralteracao" style="background: #016164">{{__('Salvar Alterações')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src='{{asset('js/orcamento/orcamento.js')}}'></script>
<script>

  var count = 0;

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
        str += '<input type="hidden" name="prvenda[]" value="'+$('#prvenda').val()+'" />'

        if($('#obsitem').val() == ''){
          str += '<td class="text-left">'+ dados.descricao + '</td>'
        } else{
          str += '<td class="text-left">'+ dados.descricao + '<br><small class="obs-item"> ' + $('#obsitem').val() + '</small>' + '</td>'
        }

        str += '<td class="text-center">'+ $('#qtde').val() +'</td>'
        str += '<td class="text-center"><button class="btn btn-outline-primary btn-sm btn-fab btn-icon btn-round" type="button" onclick="removerItem('+count+')"><i class="now-ui-icons ui-1_simple-remove"></i></button></td>'
        str += '</tr>';

        // habilita botão de finalizar orcamento
        $('#finalizarPedido').prop('disabled', false);


        $('#qtde').val(1);
        $('#listaProd').append(str);
        count++;
        limpaCampos();
      }).fail(function(jqXHR, textStatus ) {
        alert("Falha ao inserir produto no Orçamento!" + textStatus);
      });
    });

    function limpaCampos(){
      $('#obsitem').val('');
    }

    function carregaProdutosGrid(id){
      $.ajax({
        url: '{{route('busca.materialOrcamento')}}' + '/' + id,
        type: "get",
        dataType: "json"

      }).done(function(resposta) {
        var dados = resposta.data.materiais;
        console.log(dados);
        for(var i = 0; i < dados.length ; i++){

          var str = '<tr id="'+count+'">'
            str += '<input type="hidden" name="materiais_listagem_id[]" value="'+ dados[i].id +'" />'
            str += '<input type="hidden" name="materiais_qtde[]" value="'+ dados[i].pivot.qtde +'" />'
            str += '<input type="hidden" name="obsitem[]" value="'+ dados[i].pivot.obsitem +'" />'

            if(dados[i].pivot.obsitem == null){
              str += '<td class="text-left">'+ dados[i].descricao+ '</td>'
            } else {
              str += '<td class="text-left">'+ dados[i].descricao + '<br><small class="obs-item"> ' + dados[i].pivot.obsitem + '</small>' + '</td>'
            }
            if(dados[i].unidade == 'Metro'){
              str += '<td class="text-center">'+ dados[i].pivot.qtde +' MT.</td>'
            } else if (dados[i].unidade == 'Centimetro') {
              str += '<td class="text-center">'+ dados[i].pivot.qtde +' CM.</td>'
            } else if(dados[i].unidade == 'Pacote'){
              str += '<td class="text-center">'+ dados[i].pivot.qtde +' PCT.</td>'
            } else {
              str += '<td class="text-center">'+ dados[i].pivot.qtde +' UNID.</td>'
            }
            str += '<td class="text-center"><button class="btn btn-outline-primary btn-sm btn-fab btn-icon btn-round" type="button" onclick="removerItem('+count+')"><i class="now-ui-icons ui-1_simple-remove"></i></button></td>'
            str += '</tr>';


            $('#qtde').val(1);
            $('#listaProd').append(str);

            count++;
          }

        }).fail(function(jqXHR, textStatus ) {
          alert("Falha ao listar os materiais na listagem: " + textStatus);
        });
      }

      $(document).ready(function() {
        @if(isset($orcamento))
        carregaProdutosGrid('{{$orcamento->id}}');
        @endif
      });

      function removerItem(id){
        $('#'+ id).remove()
      }
    </script>
    @endpush
    @endsection
