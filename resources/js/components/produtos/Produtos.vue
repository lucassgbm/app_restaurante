<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- inicío do card de listagem dos produtos -->
                <div class="card">

                    <div class="card-header">.: Produtos</div>
                    <div class="card-body">
                        <!-- botão para ativar o modal para novo registro -->
                        <button type="button" class="btn btn-success float-left mb-2"  data-toggle="modal" data-target="#modalAdicionarProduto">Adicionar</button>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Imagem</th>
                                <th scope="col">Qtd em estoque</th>
                                <th scope="col">Qtd de reposição</th>
                                <th scope="col">Data de validade</th>
                                <th scope="col">Ação</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="produto in produtos" :key="produto.id">
                                    <th scope="row">{{ produto.id }}</th>
                                    <td>{{ produto.nome_produto }}</td>
                                    <td><img :src="'/storage/'+produto.imagem" width="30"></td>
                                    <td>{{ produto.qtd_estoque }}</td>
                                    <td>{{ produto.qtd_reposicao }}</td>
                                    <td>{{ produto.data_validade }}</td>
                                    <td>
                                        <!-- botão de editar -->
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalEditarProduto">editar</button>
                                        <!-- botão de excluir -->
                                        <button type="button" class="btn btn-outline-danger">excluir</button>
                                    </td>
                                </tr>
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

                <!-- Início - adicionar produto -->
                <!-- Início - Modal -->
                <div class="modal fade" id="modalAdicionarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Titulo aqui</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- formulário para inclusão de produto -->
                            <alert-component tipo="success" :detalhes="transacaoDetalhes" titulo="Cadastro realizado com sucesso" v-if="transacaoStatus == 'adicionado'"></alert-component>
                            <alert-component tipo="danger" :detalhes="transacaoDetalhes" titulo="Erro ao tentar cadastrar o produto" v-if="transacaoStatus == 'erro'"></alert-component>
                            
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Nome do produto</label>
                                    <input type="text" class="form-control" id="nome_produto" v-model="nomeProduto" aria-describedby="emailHelp">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Imagem</label>
                                    <input class="form-control" type="file" id="imagem" @change="carregarImagem($event)">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Qtd em estoque</label>
                                    <input type="text" class="form-control" id="qtd_estoque" v-model="qtdEstoque" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Qtd de reposicão</label>
                                    <input type="text" class="form-control" id="qtd_reposicao" v-model="qtdReposicao" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Data de validade</label>
                                    <input type="text" class="form-control" id="data_validade" v-model="dataValidade" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Preço unitário</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" v-model="precoUnitario" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tipo</label>
                                    <select class="form-select" id="tipo_id" v-model="tipoId" aria-label="Default select example">
                                        <option selected>Selecione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Fornecedor</label>
                                    <select class="form-select" id="fornecedor_id" v-model="fornecedorId" aria-label="Default select example">
                                        <option selected>Selecione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" @click="salvar()">Salvar</button>
                        </div>
                        </div>
                    </div>  
                <!-- Fim - Modal -->
                </div>
                <!-- Fim - adicionar produto -->

                <!-- Início - editar produto -->
                <editar-produto-component></editar-produto-component>
                <!-- Fim - editar produto -->
            </div>
        </div>
    </div>
</template>

<script>



    export default {
        components: {
            
        },
        data(){
            return {
                urlBase: 'http://localhost:8000/api/produto',

                nomeProduto: '',
                arquivoImagem: [],
                qtdEstoque: '',
                qtdReposicao: '',
                dataValidade: '',
                precoUnitario: '',
                tipoId: '',
                fornecedorId: '',
                produtos: []
            }
        },
        methods: {
            carregarLista(){

                axios.get(this.urlBase)
                    .then(response => {
                        this.produtos = response.data


                    })
                    .catch(errors => {
                        console.log(errors)

                    })
            },
            carregarImagem(e){
                this.arquivoImagem = e.target.files
            },
            salvar(){
                console.log(this.nomeProduto, this.arquivoImagem[0])

                let formData = new FormData()
                formData.append('nome_produto', this.nomeProduto)
                formData.append('imagem', this.arquivoImagem[0])
                formData.append('qtd_estoque', this.qtdEstoque)
                formData.append('qtd_reposicao', this.qtdReposicao)
                formData.append('data_validade', this.dataValidade)
                formData.append('preco_unitario', this.precoUnitario)
                formData.append('tipo_id', this.tipoId)
                formData.append('fornecedor_id', this.fornecedorId)
                

                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                        // 'Authorization': this.token
                    }
                }

                // url, conteúdo, configuração
                axios.post(this.urlBase, formData, config)
                    .then(response => {
                        this.transacaoStatus = 'adicionado'
                        this.transacaoDetalhes = {
                            mensagem: 'ID do registro: '+response.data.id
                        }

                        // console.log(response)
                    })
                    .catch(errors => {
                        this.transacaoStatus = 'erro'
                        this.transacaoDetalhes = {
                            mensagem: errors.response.data.message,
                            dados: errors.response.data.errors
                        }
                        errors.response
                        // console.log(data.message)
                    })
                this.carregarLista()
            }
            

        
        },
        mounted() {
            this.carregarLista()
            console.log('Component mounted.')
        }
    }
</script>