<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <label for="descricao">Descrição*</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="{{isset($material) ? $material->descricao : old('descricao')}}" placeholder="Descrição do Material" required>
        @include('alerts.feedback', ['field' => 'descricao'])
      </div>
    </div>

    <div class="form-group col-md-2">
      <label for="unidade">Unidade</label>
      <select id="unidade" class="form-control" name="unidade" {{old('unidade')}}>
        <option value="Unidade" @if (isset($material) && ($material->unidade == 'Unidade')) selected @endif>Unidade</option>
        <option value="Centimetro" @if (isset($material) && ($material->unidade == 'Centimetro')) selected @endif>Centimetro</option>
        <option value="Metro" @if (isset($material) && ($material->unidade == 'Metro')) selected @endif>Metro</option>
        <option value="Pacote" @if (isset($material) && ($material->unidade == 'Pacote')) selected @endif>Pacote</option>
      </select>
    </div>

    {{-- <div class="col-md-2">
      <div class="form-group">
        <label for="preco">Preço</label>
        <input type="text" class="form-control" id="preco" name="preco" value="{{isset($material) ? $material->preco : old('preco')}}" placeholder="R$">
        @include('alerts.feedback', ['field' => 'preco'])
      </div>
    </div> --}}
  </div>
</div>
