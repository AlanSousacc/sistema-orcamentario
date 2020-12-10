<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
  public function authorize()
  {
    return auth()->check();
  }

  public function rules()
  {
    return [
      'descricao'   => 'required|max:50',
    ];
  }

  public function messages()
  {
    return [
      'descricao.required'  => 'O campo Descrição do Produto é obrigatório!',
      'descricao.max'       => 'O campo Descrição deve conter no máximo 50 caracteres!',
    ];
  }
}
