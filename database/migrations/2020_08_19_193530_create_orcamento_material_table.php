<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentoMaterialTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('orcamento_material', function (Blueprint $table) {
      $table->integer('qtde');
      $table->text('obsitem')->nullable();
      $table->double('prvenda',5,2)->nullable();
      $table->unsignedBigInteger('material_id')->nullable();
      $table->unsignedBigInteger('orcamento_id')->nullable();

      $table->foreign('orcamento_id')->references('id')->on('orcamentos');
      $table->foreign('material_id')->references('id')->on('materiais');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('orcamento_material');
  }
}
