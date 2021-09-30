@extends('layouts.app')

@section('content')
    <div class="container">
                
        <div class="row justify-content-center">
            <div class="col">

                <!-- inicío do card de listagem dos produtos -->
                <div class="card">

                    <div class="card-header">.: Produtos</div>
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
                    </div>
                    <div class="card-footer">
                        <!-- Início - Paginação -->
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                <a class="page-link">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Próxima</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Fim - Paginação -->
                        
                    </div>
                    
                </div>
                <!-- fim do card de listagem dos produtos -->
            </div>
        </div>
@endsection
