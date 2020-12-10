<div class="content">
  {{-- cliente e entrega --}}
  <div class="row">
    <div class="form-group col-md-8">
      <label class="control-label" for="contatoid">Contatos*</label>
      {{-- <div class=""> --}}
        <select id="contatoid" name="contato_id" class="form-control js-example-basic-single" required>
          @foreach($contatos as $item)
          <option value="{{$item->id}}" {{isset($pedido) && $item->id == $pedido->contato->id ? 'selected' : ''}}>{{$item->nome}}</option>
          @endforeach
        </select>
        {{-- </div> --}}
      </div>
      <div class="col-md-4 add">
        <a href="{{route('contato.create')}}" class="btn btn-primary w-100" style="background: #016164">Novo Contato <i class="now-ui-icons ui-1_simple-add"></i></a>
      </div>
    </div>
    {{-- fim cliente e entrega --}}

    {{-- selecionar produto --}}
    <div class="row">
      <div class="form-group col-md-12">
        <label class="col-md-12 control-label" for="material_id">#ID - Nome do Produto</label>
        <select id="material_id" name="material_id" class="form-control js-example-basic-single">
          @foreach($materiais as $item)
          <option value="{{ $item->id }}">{!! $item->descricao !!} - {!! $item->unidade !!}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3 ">
        <div class="form-group">
          <label for="obsitem" class="ml-3">Observação do Produto</label>
          <input type="text" class="form-control" id="obsitem" placeholder="Observação do Item">
        </div>
      </div>

      <div class="col-md-12">
        <label for="qtde" class="ml-3">Qtde</label>
        <div class="input-group">
          <input type="number" min="1" class="form-control qtde text-center w-100" value="1" id="qtde">
        </div>
      </div>

      <div class="form-group col-sm-12 text-center">
        <button type="button" class="btn btn-primary w-100" id="inserirMaterial" data-type="plus" data-field="quant[1]" style="background: #016164">Inserir Item <i class="now-ui-icons ui-1_simple-add"></i></button>
      </div>
    </div>
    {{-- fim seleção de produtos --}}

    {{-- listagem dos itens --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card-header">
          <h6 class="card-title"> Materiais</h6>
        </div>
        <div class="card-body table-responsive-md">
          <table class="table">
            <thead class="">
              <th class="text-left">Material</th>
              <th class="text-left">Qtde</th>
              <th class="text-center"><i class="now-ui-icons ion-trash-b"></i></th>
            </thead>
            <tbody id="listaProd">
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr class="divider"><br>
    {{-- fim listagem dos itens --}}

    {{-- fim forma de pagamento e valor total --}}

    <div class="row">
      <div class="col-md-12 pr-3">
        <div class="form-group">
          <label for="observacao" class="col ml-1">Observação do Orçamento</label>
          <input type="text" class="form-control" value="{{isset($orcamento) ? $orcamento->observacao : old('observacao')}}" id="observacao" name="observacao" placeholder="Observação">
          @include('alerts.feedback', ['field' => 'observacao'])
        </div>
      </div>
    </div>
  </div>
