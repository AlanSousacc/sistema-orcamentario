<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Contato;
use App\Models\Material;
use Exception;
use PDF;
use DB;

class OrcamentoController extends Controller
{
  // carrega todos os dados para a página de listagem de pedidos
  public function index()
  {
    $consulta   = Orcamento::paginate(10);

    return view('pages.orcamento.listagemOrcamentos', compact('consulta'));
  }

  // detalha o pedido solicitado e leva para a tela de detalhes do pedido
  public function detalheOrcamento($id)
  {
    $orcamento = Orcamento::find($id);
    return view('pages.orcamento.detalheOrcamento', compact('orcamento'));
  }

  public function returnMaterialOrcamento($id)
	{
    $orcamento = Orcamento::findOrFail($id);

		return response()->json([
      'data' => [
        'orcamento' => $orcamento,
        'material' => $orcamento->materiais,
      ]
    ]);
	}

  // cria a tela de novo pedido com os dados do banco.
  public function create(){
    $consulta     = Orcamento::paginate(10);
    $contatos     = Contato::all();
    $materiais    = Material::all();

    return view('pages.orcamento.novoOrcamento', compact('contatos', 'materiais', 'consulta'));
  }

  /**
  * Esta função foi projetada para salvar o pedido em questão e também associar os itens do pedido
  * ao pedido atual. Criar uma movimentação para que haja necessidade futuramente de conferencia,
  * como se fosse um caixa.
  */
  public function store(Request $request)
  {
    $data = $request->except('_token');

    if(count($data['materiais_listagem_id']) < count($data['materiais_qtde']))
      throw new Exception('Quantidade de itens diferente de quantidade de unidade!');

    try{
      // dados do orcamento
      $orcamento = new Orcamento;
      $orcamento->observacao = $data['observacao'];
      $orcamento->contato_id = $data['contato_id'];

    } catch (Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());
      exit();
    }

    try{
      DB::beginTransaction();
      $orcamentosaved = $orcamento->save();
      // dados do pedidoproduto
      foreach($data['materiais_listagem_id'] as $i => $material_id ){
        $qtde    = $data['materiais_qtde'][$i];
        $obsitem = $data['obsitem'][$i];

        $orcamento->materiais()->attach([
          $material_id => ['qtde' => $qtde, 'obsitem' => $obsitem]
          ]);
        }

        if (!$orcamentosaved)
        throw new Exception('Falha ao salvar Orçamento!');

        DB::commit();
        return redirect()->back()->with('orcamento', $orcamento->id);

      } catch (Exception $e) {

        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
      }
    }

    // tela de alteração do pedido
    public function edit($id)
    {
      $orcamento = Orcamento::find($id);
      $contatos  = Contato::all();
      $materiais = Material::all();

      return view('pages.orcamento.editar', compact('orcamento', 'contatos', 'materiais'));
    }

    public function update(Request $request, $id)
    {
      $data = $request->except('_token');

      if(count($data['materiais_listagem_id']) < count($data['materiais_qtde']))
      throw new Exception('Quantidade de itens diferente de quantidade de unidade!');

      // dd($data);
      try{
        $orcamento = Orcamento::findOrFail($id);
        $orcamento->observacao = $data['observacao'];
        $orcamento->contato_id = $data['contato_id'];

      } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
        exit();
      }

      try{
        DB::beginTransaction();

        $saved = $orcamento->save();

        $materiais = [];

        foreach($data['materiais_listagem_id'] as $i => $materiais_id ){
          $qtde    = $data['materiais_qtde'][$i];
          $obsitem = $data['obsitem'][$i] != "null" ? $data['obsitem'][$i] : null;

          $materiais[$materiais_id] = ['qtde' => $qtde, 'obsitem' => $obsitem];
        }

        $orcamento->materiais()->sync($materiais);

        if (!$saved)
        throw new Exception('Falha ao alterar o orçamento!');

        DB::commit();
        return redirect()->back()->with('success', 'Orçamento alterado com sucesso!');

      } catch (Exception $e) {

        DB::rollBack();
        return redirect()->back()->with('error', $e->getMessage());
      }
    }

    public function destroy(Request $request)
    {
      try{
        $orcamento = Orcamento::find($request->orcamento_id);

        if (!$orcamento)
        throw new Exception("Nenhum Orçamento encontrado!");

        $orcamento->materiais()->detach();

      } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
        exit();
      }

      try{
        DB::beginTransaction();

        $saved = $orcamento->delete();

        if (!$saved){
          throw new Exception('Falha ao remover este pedido!');
        }
        DB::commit();
        // se chegou aqui é pq deu tudo certo
        return redirect()->back()->with('success', 'Pedido #' . $orcamento->id . ' removido com sucesso!');
      } catch (Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', $e->getMessage());
      }
    }

    // após finalizar pedido e clicar em expotar
    public function imprimirOrcamento($id){
      $orcamento = Orcamento::find($id);

      // return view('pages.orcamento.pdf.orcamento', compact('orcamento'));
      return PDF::loadView('pages.orcamento.pdf.orcamento', compact('orcamento'))
      ->setPaper('a4', '')
      // ->stream('orcamento '.$id.'.pdf');
      ->download('orcamento '.$id.'.pdf');
    }
}
