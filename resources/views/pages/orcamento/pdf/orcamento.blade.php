<!DOCTYPE html>
<html lang="PT-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Relação de Materiais Nº {{$orcamento->id}}</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<style>
  body{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
  }
  table{
    width: 800px;
  }
</style>

<body>
  <div class="content">
    <div class="">
      <h6>Eletricista: Renato Costa</h6>
      <h6>Telefones: 16 99406-9658</h6>
      <h6>Cliente: {{$orcamento->contato->nome}}</h6>
    </div>
    <h3 class="title text-center">Relação de Materiais</h3>

    <table class="table table-striped">
      <thead class="">
        <tr>
          <th scope="col">Material</th>
          <th scope="col">Obs.</th>
          <th scope="col">Unidade</th>
          <th scope="col">Qtde</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orcamento->materiais as $item)
        <tr>
          <td>{{$item->descricao}}</td>
          <td>{{$item->pivot->obsitem}}</td>
          <td>{{$item->unidade}}</td>
          <td>{{$item->pivot->qtde}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script src="{{ asset('js/jquery.js')}}"></script>
</body>
</html>
