<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Orcamento;
use Exception;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
  private $repository;

  public function __construct(Material $material)
  {
    $this->repository = $material;
  }

  public function index()
  {
    $consulta = Material::paginate(10);
    return view('pages.material.listagemMaterial', compact('consulta'));
  }

  public function buscaMaterialOrcamento($id){
    $material = Material::findOrFail($id);

    return response()->json([
      'data' => $material
    ]);
  }

  public function create(){
    return view('pages.material.novoMaterial');
  }

  public function returnPreco($id)
  {
    $material = Material::where('id', $id)->get();

    return response()->json([
      "data" => $material
    ]);
  }

  public function store(MaterialRequest $request) {
    $data = $request->all();

    $saved = $this->repository->create($data);

    if (!$saved){
      return redirect()->back()->with('error', 'Falha ao salvar este material!');
    } else {
      return redirect()->route('material.index')->with('success', 'Contato criado com sucesso!');
    }
  }

  public function edit($id) {
    $material = Material::find($id);
    return view('pages.material.editar', compact('material'));
  }

  public function returnMaterialOrcamento($id) {
    $orcamento = Orcamento::findOrFail($id);

    return response()->json([
      'data' => [
        'orcamento' => $orcamento,
        'materiais' => $orcamento->materiais,
      ]
    ]);
  }

  public function update(MaterialRequest $request, $id) {
    if (!$material = $this->repository->find($id))
      throw new Exception("Nenhum material encontrado");

    $data = $request->all();

    $saved = $material->update($data);

    if (!$saved){
      return redirect()->back()->with('error', 'Falha ao alterar este material!');
    } else {
      return redirect()->route('material.index')->with('success', 'Material alterado com sucesso!');
    }

  }

  public function destroy(Request $request){
    $material = $this->repository->find($request->material_id);

    $orcmat = DB::table('orcamento_material')
    ->where('orcamento_material.material_id', $request->material_id)
    ->get();

    if (count($orcmat) >= 1)
      return redirect()->back()->with('error', 'Não é possivel remover este material, ele está associado a alguma listagem de material!');

    if (!$material)
      throw new Exception("Nenhum material encontrado!");

    $saved = $material->delete();

    if (!$saved){
      return redirect()->back()->with('error', 'Falha ao remover este material');
    } else {
      return redirect()->back()->with('success', 'Material #' . $material->id . ' removido com sucesso!');
    }
  }
}
