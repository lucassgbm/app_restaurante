<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- inicío do card de listagem dos produtos -->
                <div class="card">

                    <div class="card-header">.: Produtos</div>

                    <div class="card-body">
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
                        <!-- botão para ativar o modal para novo registro -->
                        <button type="button" class="btn btn-success float-right"  data-toggle="modal" data-target="#modalAdicionarProduto">Adicionar</button>
                    </div>
                    
                </div>
                <!-- fim do card de listagem dos produtos -->

                <!-- Início - adicionar produto -->
                <adicionar-produto-component></adicionar-produto-component>
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
                imagem: [],
                qtdEstoque: '',
                qtdReposicao: '',
                dataValidade: '',
                precoUnitario: '',
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
                this.imagem = e.target.files
            },

        
        },
        mounted() {
            this.carregarLista()
            console.log('Component mounted.')
        }
    }
</script>