<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('orcamentos', function (Blueprint $table) {
      $table->id();
      $table->string('observacao', 50)->nullable();
      $table->double('total', 8,2)->nullable();
      $table->unsignedBigInteger('contato_id')->nullable();
      $table->timestamps();

      $table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('orcamentos');
  }
}
