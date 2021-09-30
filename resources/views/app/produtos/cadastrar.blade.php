@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">.: Cadastrar Produto</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Nome do produto</label>
                                <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{ $produto->nome_produto ?? old('nome_produto') }}">
                                @if ($errors->has('nome_produto'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('nome_produto') }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Imagem</label>
                                <input class="form-control" type="file" id="imagem" name="imagem" value="{{ $produto->imagem ?? old('imagem') }}">
                                @if ($errors->has('imagem'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('imagem') }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Qtd em estoque</label>
                                <input type="text" class="form-control" id="qtd_estoque" name="qtd_estoque" value="{{ $produto->qtd_estoque ?? old('qtd_estoque') }}">
                                @if ($errors->has('qtd_estoque'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('qtd_estoque') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Qtd de reposicão</label>
                                <input type="text" class="form-control" id="qtd_reposicao" name="qtd_reposicao" value="{{ $produto->qtd_reposicao ?? old('qtd_reposicao') }}">
                                @if ($errors->has('qtd_reposicao'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('qtd_reposicao') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Data de validade</label>
                                <input type="text" class="form-control" id="data_validade" name="data_validade" placeholder="dd/mm/aaaa" value="{{ $produto->data_validade ?? old('data_validade') }}">
                                @if ($errors->has('data_validade'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('data_validade') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Preço unitário</label>
                                <input type="text" class="form-control" id="preco_unitario" name="preco_unitario" value="{{ $produto->preco_unitario ?? old('preco_unitario') }}">
                                @if ($errors->has('preco_unitario'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('preco_unitario') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <select class="form-select" id="tipo_id" name="tipo_id">
                                        <option value="" selected>Selecione</option>

                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ ($produto->tipo_id ?? old('tipo_id')) == $tipo->id ? 'selected' : '' }}>{{ $tipo->nome_tipo }}
                                    
                                    @endforeach
                                    
                                </select>
                                @if ($errors->has('tipo_id'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('tipo_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fornecedor</label>
                                <select class="form-select" id="fornecedor_id" name="fornecedor_id" aria-label="Default select example">
                                        <option value="" selected>Selecione</option>
                                    
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome_fornecedor }}
                                    
                                     @endforeach
                                    
                                </select>
                                @if ($errors->has('fornecedor_id'))
            
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        {{ $errors->first('fornecedor_id') }}
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="mb-3">
                                {{-- Botões --}}
                                <a href="{{ route('produtos.index') }}"><button type="button" class="btn btn-secondary">Voltar</button></a>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                            


                        </form>
                    </div>
                </div>
            <div>
        <div>
<div>
@endsection