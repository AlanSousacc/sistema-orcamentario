<?php

use Illuminate\Support\Facades\Route;

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
	Route::any('exportar/orcamento/{id?}', 'OrcamentoController@imprimirOrcamento')->name('exportar.orcamento');

	// material
	Route::resource('material', 'MaterialController');
  Route::get('preco-produto/{id?}', 'MaterialController@returnPreco')->name('busca.precoproduto');
  Route::get('material-orcamento-json/{id?}', 'MaterialController@returnMaterialOrcamento')->name('busca.materialOrcamento');
	Route::get('material-orcamento/{id?}', 'MaterialController@buscaMaterialOrcamento')->name('busca.material.orcamento');

	// contato
	Route::resource('contato', 'ContatoController');
});

Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
