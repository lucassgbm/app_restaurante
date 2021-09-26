<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // cria a tabela de produtos
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // o nome do produto deve ser único
            $table->string('nome_produto', 50)->unique();
            $table->string('imagem', 100);
            $table->float('qtd_estoque', 8, 2);
            $table->float('qtd_reposicao', 8, 2)->nullable();
            $table->dateTime('data_validade');
            $table->float('preco_unitario', 8, 2);

            // chaves estrangeiras
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('fornecedor_id');

            // contraint para relação com a tabela estrangeira
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');


        });

        

    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // desabilitar chaves estrangeiras para não ocorrer algum erro ao excluir a tabela
        Schema::disableForeignKeyConstraints();
        // fazer drop da tabela produtos
        Schema::dropIfExists('produtos');
        // habilitar chaves estrangeiras novamente
        Schema::enableForeignKeyConstraints();

    }
}
