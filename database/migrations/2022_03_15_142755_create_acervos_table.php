<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcervosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acervos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('cnpj');
            $table->unsignedBigInteger('tipo_id');
            $table->date('data');
            $table->string('url')->nullable();
            $table->string('anexo');
            $table->integer('inativo')->default(2); // 1 = inativo, 2 = ativo
            $table->unsignedBigInteger('criador');
            $table->unsignedBigInteger('modificador');
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acervos');
    }
}
