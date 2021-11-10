@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col">

                <!-- inicío do card de busca e exportação -->
                <div class="card">
                    <div class="card-body">
                        {{-- início do formulário de busca --}}
                        <form method="get" action="{{ route('produtos.index') }}">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="busca" name="busca" placeholder="Buscar">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </div>

                                <div class="col-auto">
                                    <a href="#"><button type="button" class="btn btn-primary">Exportar para XLS</i></button></a>
                                    <a href="#"><button type="button" class="btn btn-primary">Exportar para CSV</i></button></a>
                                </div>
                            </div>
                        </form>
                        {{-- fim do formulário de busca --}}

                    </div>
                     
                </div>
                {{-- fim do card de busca de exportação --}}
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col">

                <!-- inicío do card de listagem dos produtos -->
                <div class="card">

                    <div class="card-header">.: Lista de Produtos</div>
                    <div class="card-body">
                        <!-- botão para ativar o modal para novo registro -->
                        <a href="{{ route('produtos.create') }}"><button type="button" class="btn btn-success float-left mb-2">Cadastrar</button></a>
                            
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Produto</th>
                                <th scope="col" class="text-center">Imagem</th>
                                <th scope="col" class="text-center">Qtd em estoque</th>
                                <th scope="col" class="text-center">Qtd de reposição</th>
                                <th scope="col" class="text-center">Data de validade</th>
                                <th scope="col" class="text-center" colspan="3">Ação</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                @foreach($produtos as $produto)

                                    <tr>
                                        <th scope="row">{{ $produto->id }}</th>
                                        <td><a href="{{ route('produtos.show', ['produto' => $produto->id ]) }}">{{ $produto->nome_produto }}</a></td>
                                        <td><img src="/storage/{{ $produto->imagem }}" width="30"></td>
                                        <td>{{ $produto->qtd_estoque }}</td>
                                        <td>{{ $produto->qtd_reposicao }}</td>
                                        <td>{{ date('d/m/Y', strtotime($produto->data_validade)) }}</td>
                                        <td>
                                                <td>
                                                    <!-- editar o produto -->
                                                    <a href="{{ route('produtos.edit', ['produto' => $produto->id ]) }}"><button type="button" class="btn btn-outline-primary">editar</button></a>
                                                    <!-- botão de excluir -->
                                                
                                                </td>
                                                <td>
                                                    {{-- excluir o produto --}}
                                                    <form id="form_{{$produto->id}}" method="post" action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="#" onclick="return confirm('Tem certeza que deseja remover este item?'); document.getElementById('form_{{$produto->id}}').submit()"><button type="submit" class="btn btn-outline-danger">excluir</button></a>
                                                        
                                                    </form>
                                                
                                                </td>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$produtos->links()}}
                    </div>
                    <div class="card-footer">
                        
                        <p class="paginas">página {{$produtos->currentPage()}} de {{$produtos->lastPage()}}</span>
                        <!-- Início - Paginação -->
                        
                        <!-- Fim - Paginação -->
                        
                    </div>
                    
                </div>
                <!-- fim do card de listagem dos produtos -->
            </div>
        </div>
@endsection
