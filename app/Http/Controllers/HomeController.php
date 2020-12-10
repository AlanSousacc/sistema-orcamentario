<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Material;
use App\Models\Orcamento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    $consulta     = Orcamento::paginate(10);
    $contatos     = Contato::all();
    $materiais    = Material::all();

    return view('pages.orcamento.novoOrcamento', compact('contatos', 'materiais', 'consulta'));
  }
}
