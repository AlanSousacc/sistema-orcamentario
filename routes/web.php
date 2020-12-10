<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pedidos;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	// users
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	// orcamento
	Route::resource('orcamento', 'OrcamentoController');
	Route::post('finalizar-orcamento', 'OrcamentoController@store')->name('store.orcamento');
	Route::get('orcamento/detalhe/{id}', 'OrcamentoController@detalheOrcamento')->name('orcamento.detalhe');
	Route::any('exportar/orcamento/{id?}', 'OrcamentoController@imprimirOrcamento')->name('imprimir.orcamento');

	// material
	Route::resource('material', 'MaterialController');
  Route::get('preco-produto/{id?}', 'MaterialController@returnPreco')->name('busca.precoproduto');
  Route::get('material-orcamento-json/{id?}', 'MaterialController@returnMaterialOrcamento')->name('busca.materialOrcamento');
	Route::get('material-orcamento/{id?}', 'MaterialController@buscaMaterialOrcamento')->name('busca.material.orcamento');

	// contato
	Route::resource('contato', 'ContatoController');
});

Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);


// Route::get('teste', function(){
// 	$teste = Pedidos::find(5);
// 	dd($teste->produtos[0]->pivot->qtde);
// });

// Route::get('teste2', function(){
// 	$teste = Pedidos::find(5);
// 	$teste->produtos()->detach([2]);
// 	dd($teste->produtos[0]->pivot->qtde);
// });

// Route::get('teste3', function(){
// 	$teste = Pedidos::find(5);
// 	$teste->produtos()->sync([1 => ['qtde' => 6]]);
// 	dd($teste->produtos[0]->pivot->qtde);
// });
