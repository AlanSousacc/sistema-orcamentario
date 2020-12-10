<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $fillable = ['descricao', 'preco', 'unidade'];
  protected $table = 'materiais';

}
