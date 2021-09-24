<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_fornecedor', 50)->unique();
            $table->string('site', 100);
            $table->bigInteger('telefone');
            $table->string('e-mail', 100);
            
            

        });

        // Inserção de registros na tabela "fornecedores"
        DB::table('fornecedores')->insert([
            [ 'nome_fornecedor' => 'Arizta' ],
            [ 'nome_fornecedor' => 'Bread Maker' ],
            [ 'nome_fornecedor' => 'Coca-cola' ],
            [ 'nome_fornecedor' => 'Friboi' ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
