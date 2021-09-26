<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome_produto', 
        'imagem', 
        'qtd_estoque', 
        'qtd_reposicao',
        'data_validade',
        'preco_unitario',
        'tipo_id',
        'fornecedor_id'
    ];

    // regras de validação dos campos
    public function rules(){
        return [
            'nome_produto' => 'required|unique:produtos,nome_produto,'.$this->id.'|min:3',
            'imagem' => 'required|file|mimes:png,jpeg,jpg',
            'qtd_estoque' => 'required|numeric',
            'qtd_reposicao' => 'required|numeric',
            'data_validade' => 'required|date',
            'preco_unitario' => 'required|numeric',
            'tipo_id' => 'required',
            'fornecedor_id' => 'required',
        ];
    }

    // feedback de validação 
    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome_produto.unique' => 'O nome do produto já está cadastrado',
            'imagem.file' => 'A imagem deve ser no formato: png, jpeg ou jpg',
            'numeric' => 'O campo :attribute deve ser numérico'
        ];
    }

    public function fornecedor(){

        // um produto pertence a uma fornecedor
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function tipo(){

        // um produto pertence a um tipo
        return $this->belongsTo('App\Models\Tipo');
    }
}
