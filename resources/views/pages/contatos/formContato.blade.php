<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="nome">Nome*</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{isset($contato) ? $contato->nome : old('nome')}}" placeholder="Digite o nome do contato" required>
        @include('alerts.feedback', ['field' => 'nome'])
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control telefone" id="telefone" name="telefone" value="{{isset($contato) ? $contato->telefone : old('telefone')}}" placeholder="Ex. (99) 99999-9999">
          @include('alerts.feedback', ['field' => 'telefone'])
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="{{isset($contato) ? $contato->endereco : old('endereco')}}" placeholder="Rua:">
          @include('alerts.feedback', ['field' => 'endereco'])
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
