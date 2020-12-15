<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;

use App\Models\Contato;
use App\Models\Orcamento;
use Exception;

class ContatoController extends Controller
{
  private $repository;

  public function __construct(Contato $contato)
  {
    $this->repository = $contato;
  }

  public function index()
  {
    $consulta = $this->repository->paginate(10);
    return view('pages.contatos.listagemContato', compact('consulta'));
  }

  public function create(){
    return view('pages.contatos.novoContato');
  }

  public function store(ContatoRequest $request) {
    $data = $request->all();

    $saved = $this->repository->create($data);

    if (!$saved){
      return redirect()->back()->with('error', 'Falha ao salvar este contato!');
    } else {
      return redirect()->route('contato.index')->with('success', 'Contato criado com sucesso!');
    }
  }

  public function edit($id)
  {
    $contato = $this->repository->find($id);
    return view('pages.contatos.editar', compact('contato'));
  }

  public function update(ContatoRequest $request, $id)
  {
    if (!$contato = $this->repository->find($id))
      throw new Exception("Nenhum contato encontrado");

    $data = $request->all();

    $saved = $contato->update($data);

    if (!$saved){
      return redirect()->back()->with('error', 'Falha ao alterar este contato!');
    } else {
      return redirect()->route('contato.index')->with('success', 'Contato alterado com sucesso!');
    }
  }

  public function destroy(Request $request)
  {
    $contato = $this->repository->find($request->contato_id);

    $contorc = Orcamento::where('contato_id', $contato->id)->get();

    if (count($contorc) >= 1)
      return redirect()->back()->with('error', 'Não é possivel remover este contato, ele está associado a alguma listagem de material!');

    if (!$contato)
    throw new Exception("Nenhum contato encontrado!");

    $saved = $contato->delete();

    if (!$saved){
      return redirect()->back()->with('error', 'Falha ao remover este contato');
    } else {
      return redirect()->back()->with('success', 'Contato #' . $contato->id . ' removido com sucesso!');
    }
  }
}
