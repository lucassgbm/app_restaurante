@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">.: Visualizar: {{ $produto->nome_produto }}</div>
                    <div class="card-body">
                        
                        
                        <div class="mb-3">
                            <img src="/storage/{{ $produto->imagem }}" width="100">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nome do produto</label>
                            <input type="text" class="form-control" id="nome_produto" readonly value="{{ $produto->nome_produto }}" aria-describedby="emailHelp">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Qtd em estoque</label>
                            <input type="text" class="form-control" id="qtd_estoque" readonly value="{{ $produto->qtd_estoque }}" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Qtd de reposicão</label>
                            <input type="text" class="form-control" id="qtd_reposicao" readonly value="{{ $produto->qtd_reposicao }}"  aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Data de validade</label>
                            <input type="text" class="form-control" id="data_validade" readonly value="{{ date('d/m/Y', strtotime($produto->data_validade)) }}" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preço unitário</label>
                            <input type="text" class="form-control" id="preco_unitario" readonly value="{{ $produto->preco_unitario }}" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="nome_tipo" readonly value="{{ $produto->tipo->nome_tipo}}" aria-describedby="emailHelp">

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fornecedor</label>
                            <input type="text" class="form-control" id="nome_fornecedor" readonly value="{{ $produto->fornecedor->nome_fornecedor}}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            {{-- Botões --}}
                            <a href="{{ route('produtos.index') }}"><button type="button" class="btn btn-secondary">Voltar</button></a>
                            <a href="{{ route('produtos.edit', ['produto' => $produto->id ]) }}"><button type="button" class="btn btn-outline-primary">editar</button></a>

                        </div>
                    </div>
                </div>
            <div>
        <div>
<div>
@endsection