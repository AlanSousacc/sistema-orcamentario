<div class="card-body">
  <div class="table-responsive-md" style="overflow: initial!important;">
    <table class="table">
      <thead class="">
        <th class="text-center">Cliente</th>
        <th class="text-center">Opções</th>
      </thead>
      <tbody>
        @foreach ($consulta as $item)
        <tr>
          <td class="text-center">{{$item->contato->nome}}</td>
          <td class="text-center">
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #016164">
                Action
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('orcamento.detalhe', $item->id)}}"><i class="now-ui-icons files_paper"></i>Detalhar Orçamento</a>
                <a class="dropdown-item" href="{{ route('orcamento.edit', $item->id) }}"><i class="now-ui-icons education_paper"></i>Alterar</a>
                <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="now-ui-icons ui-1_simple-remove"></i>Remover</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-6"><p>Mostrando {{$consulta->count()}} orçamentos de um total de {{$consulta->total()}}</p></div>
    <div class="col-md-6">{{$consulta->links()}}</div>
  </div>
</div>
