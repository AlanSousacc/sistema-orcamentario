<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    return [
      'nome'     => 'required|min:3|max:60',
      'endereco' => 'max:30',
      'telefone' => 'max:20'
    ];
  }

  public function messages()
  {
    return [
      'nome.required' => 'O campo Nome é obrigatório!',
      'nome.min'      => 'O campo Nome deve conter ao menos 3 caracteres!',
      'nome.max'      => 'O campo Nome deve conter no máximo 60 caracteres!',
      'endereco.max'  => 'O campo Documento deve conter no máximo 30 caracteres!',
      'telefone.max'  => 'O campo Telefone deve conter no máximo 20 caracteres!',
    ];
  }
}
