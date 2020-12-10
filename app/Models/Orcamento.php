<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
  protected $fillable = ['observacao', 'total', 'contato_id'];

  public function materiais(){
		return $this->belongsToMany('App\Models\Material', 'orcamento_material', 'orcamento_id', 'material_id')->withPivot(["qtde", "obsitem"]);
  }

  public function contato(){
    return $this->belongsTo('App\Models\Contato');
  }
}
