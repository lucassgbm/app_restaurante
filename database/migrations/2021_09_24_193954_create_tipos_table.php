<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_tipo');


        });

        // Inserção de registros na tabela "tipos"
        DB::table('tipos')->insert([
            [ 'nome_tipo' => 'Lanche' ],
            [ 'nome_tipo' => 'Bebida' ],
            [ 'nome_tipo' => 'Sobremesa' ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}
