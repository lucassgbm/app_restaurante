<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- inicío do card de listagem dos produtos -->
                <div class="card">

                    <div class="card-header">.: Produtos</div>
                    <div class="card-body">
                        {{ $store.state.teste }}
                        <!-- botão para ativar o modal para novo registro -->
                        <button type="button" class="btn btn-success float-left mb-2"  data-toggle="modal" data-target="#modalCadastrarProduto" @click="setStore(''), setPickLists()">Cadastrar</button>
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
                                    <td><a href="#" data-toggle="modal" data-target="#modalVisualizarProduto" @click="setStore(produto)">{{ produto.nome_produto }}</a></td>
                                    <td><img :src="'/storage/'+produto.imagem" width="30"></td>
                                    <td>{{ produto.qtd_estoque }}</td>
                                    <td>{{ produto.qtd_reposicao }}</td>
                                    <td>{{ produto.data_validade | formatarData }}</td>
                                    <td>
                                        <!-- botão de editar -->
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalEditarProduto" @click="setStore(produto), setPickLists()">editar</button>
                                        <!-- botão de excluir -->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalExcluirProduto" @click="setStore(produto)">excluir</button>
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

                <!-- Início - adicionar -->
                <div class="modal fade" id="modalCadastrarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar produto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- formulário para inclusão de produto -->
                                <alert-component tipo="success" :detalhes="transacaoDetalhes" titulo="Produto cadastrado com sucesso" v-if="transacaoStatus == 'adicionado'"></alert-component>
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
                                        <input type="date" class="form-control" id="data_validade" v-model="dataValidade" aria-describedby="emailHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Preço unitário</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" v-model="precoUnitario" aria-describedby="emailHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tipo</label>
                                        <select class="form-select" id="tipo_id" v-model="tipoId" aria-label="Default select example">
                                            <option selected value="">Selecione</option>
                                            <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.nome_tipo}}</option>

                                            
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Fornecedor</label>
                                        <select class="form-select" id="fornecedor_id" v-model="fornecedorId" aria-label="Default select example">
                                            <option selected value="">Selecione</option>
                                            <option v-for="fornecedor in fornecedores" :key="fornecedor.id" :value="fornecedor.id">{{fornecedor.nome_fornecedor}}</option>
                                            
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
                </div>
                <!-- Fim - adicionar  -->

                <!-- Visualizar -->
                <div class="modal fade" id="modalVisualizarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Visualizar - {{ $store.state.item.nome_produto }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="mb-3" v-if="$store.state.item.imagem">
                                        <img :src="'/storage/'+$store.state.item.imagem" width="100px">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nome do produto</label>
                                        <input type="text" class="form-control" :value="$store.state.item.nome_produto" aria-describedby="emailHelp" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quantidade em estoque</label>
                                        <input type="text" class="form-control" :value="$store.state.item.qtd_estoque" aria-describedby="emailHelp" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quantidade de reposição</label>
                                        <input type="text" class="form-control" :value="$store.state.item.qtd_reposicao" aria-describedby="emailHelp" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Data de validade</label>
                                        <input type="text" class="form-control" :value="$store.state.item.data_validade | formatarData" aria-describedby="emailHelp" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Preço unitário</label>
                                        <input type="text" class="form-control" :value="$store.state.item.preco_unitario" aria-describedby="emailHelp" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tipo</label>
                                        <input type="text" class="form-control" :value="$store.state.item.nome_tipo" aria-describedby="emailHelp" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fornecedor</label>
                                        <input type="text" class="form-control" :value="$store.state.item.nome_fornecedor" aria-describedby="emailHelp" readonly>
                                    </div>
                                    
                                    <!-- {{$store.state.item.nome_fornecedor}} -->

                                    

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>  
                </div>

                <!-- Fim - Visualizar -->



                <!--  Excluir -->
                <div class="modal fade" id="modalExcluirProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <alert-component tipo="success" titulo="Transação realizada com sucesso" :detalhes="$store.state.transacao"  v-if="$store.state.transacao.status == 'sucesso'"></alert-component>
                            <alert-component tipo="danger" titulo="Erro na transação" :detalhes="$store.state.transacao"  v-if="$store.state.transacao.status == 'erro'"></alert-component>
                            <span v-if="$store.state.transacao.status != 'sucesso'">Tem certeza que deseja excluir - {{ $store.state.item.nome_produto}}?</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" v-if="$store.state.transacao.status != 'sucesso'" @click="remover()">Excluir</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Fim - Excluir -->


                <!-- Editar -->
                <div class="modal fade" id="modalEditarProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar - {{ $store.state.item.nome_produto }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- formulário para edição de produto -->

                                <alert-component tipo="success" titulo="Transação realizada com sucesso" :detalhes="$store.state.transacao"  v-if="$store.state.transacao.status == 'sucesso'"></alert-component>
                                <alert-component tipo="danger" titulo="Erro na transação" :detalhes="$store.state.transacao"  v-if="$store.state.transacao.status == 'erro'"></alert-component>
                                                
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nome do produto</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="$store.state.item.nome_produto">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Imagem</label>
                                        <input class="form-control" type="file" id="formFile" @change="carregarImagem($event)">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Qtd em estoque</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="$store.state.item.qtd_estoque">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Qtd de reposicão</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="$store.state.item.qtd_reposicao">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Data de validade</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="$store.state.item.data_validade">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Preço unitário</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="$store.state.item.preco_unitario">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tipo</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">{{tipo.nome_tipo}}</option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Fornecedor</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option v-for="fornecedor in fornecedores" :key="fornecedor.id" :value="fornecedor.id">{{fornecedor.nome_fornecedor}}</option>
                                            
                                        </select>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" @click="atualizar()">Atualizar</button>
                            </div>
                        </div>
                    </div>  
                </div>
                <!-- Fim - Editar -->
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

                urlBase: location.protocol+'//'+location.host+'/api/',

                nomeProduto: '',
                arquivoImagem: [],
                qtdEstoque: '',
                qtdReposicao: '',
                dataValidade: '',
                precoUnitario: '',
                tipoId: '',
                fornecedorId: '',
                produtos: [],
                fornecedores: [],
                tipos: [],
                transacaoStatus: '',
                transacaoDetalhes: ''

            }
        },
        methods: {
            carregarLista(){

                axios.get(this.urlBase+'produto')
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
            setStore(obj){
                // apagar mensagens antigas ao acionar o modal:
                this.$store.state.transacao.status = ''
                this.$store.state.transacao.mensagem = ''
                this.$store.state.transacao.dados = ''
                this.transacaoStatus = '',
                this.transacaoDetalhes = ''

                this.$store.state.item = obj
            },
            setPickLists(){

                // carregar fornecedores
                axios.get(this.urlBase+'fornecedor')
                    .then(response => {
                        this.fornecedores = response.data

                    })
                    .catch(errors => {
                        console.log(errors)

                    })
                    
                // carregar tipos
                axios.get(this.urlBase+'tipo')
                    .then(response => {
                        this.tipos = response.data

                    })
                    .catch(errors => {
                        console.log(errors)

                    })
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
                
                // definir cabeçalho
                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json',
                    }
                }

                // url, conteúdo, configuração
                axios.post(this.urlBase+'produto', formData, config)
                    .then(response => {
                        this.transacaoStatus = 'adicionado'
                        this.transacaoDetalhes = {
                            mensagem: 'ID do registro: '+response.data.id
                        }
                        this.nomeProduto = '',
                        this.arquivoImagem = '',
                        this.qtdEstoque = '',
                        this.qtdReposicao = '',
                        this.dataValidade = '',
                        this.precoUnitario = '',
                        this.tipoId = '',
                        this.fornecedorId = '',
                        this.produtos = [],
                        this.fornecedores = [],
                        this.tipos = [],
                        
                        this.carregarLista()

                    })
                    .catch(errors => {
                        this.transacaoStatus = 'erro'
                        this.transacaoDetalhes = {
                            mensagem: errors.response.data.message,
                            dados: errors.response.data.errors
                        }
                        errors.response
                    })
            },
            atualizar(){

                let formData = new FormData();
                formData.append('_method', 'patch')
                formData.append('nome_produto', this.$store.state.item.nome_produto)
                // atualiza a imagem somente se ela for enviada pelo formulário
                if(this.arquivoImagem[0]){

                    formData.append('imagem', this.arquivoImagem[0])
                }
                formData.append('qtd_estoque', this.$store.state.item.qtd_estoque)
                formData.append('qtd_reposicao', this.$store.state.item.qtd_reposicao)
                formData.append('data_validade', this.$store.state.item.data_validade)
                formData.append('preco_unitario', this.$store.state.item.preco_unitario)
                formData.append('tipo_id', this.$store.state.item.tipo_id)
                formData.append('fornecedor_id', this.$store.state.item.fornecedor_id)

                let url = this.urlBase+'produto' + '/' + this.$store.state.item.id

                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    }
                }

                axios.post(url, formData, config)
                    .then(response => {
                        console.log('Atualizado', response)
                        this.$store.state.transacao.status = 'sucesso'
                        this.$store.state.transacao.mensagem = 'Produto atualizado com sucesso!'
                        this.carregarLista()
                    })
                    .catch(errors => {
                        console.log('Erro de atualização', errors.response)
                        this.$store.state.transacao.status = 'erro'
                        this.$store.state.transacao.mensagem = errors.response.data.message
                        this.$store.state.transacao.dados = errors.response.data.errors
                    })
            },
            remover(){

                // url com a ID do produto a ser excluído
                let url = this.urlBase+'produto' + '/' + this.$store.state.item.id

                let formData = new FormData();

                // passa o método de exclusão para o formData
                formData.append('_method', 'delete')
                
                // definir cabeçalho
                let config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    }
                }

                axios.post(url , formData, config)
                    .then(response => {
                        this.$store.state.transacao.status = 'sucesso'
                        this.$store.state.transacao.mensagem = response.data.msg
                        this.carregarLista()
                    })
                    .catch(errors => {
                        this.$store.state.transacao.status = 'erro'
                        this.$store.state.transacao.mensagem = errors.response.data.erro
                    })
            },
            
        },
        mounted() {
            this.carregarLista()
        }
    }
</script>