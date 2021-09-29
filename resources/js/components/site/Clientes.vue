<template>
    <div class="container">

        <div class="row align-items-center mb-4 mt-4">
            <div class="col text-center" v-for="cliente in clientes" :key="cliente.id">
                <a :href="cliente.link">
                <img :src="'/storage/imagens/'+cliente.image"></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.carregarLista()
        },
        data(){
            return {
                urlBase: 'js/db.json',
                clientes: [],
            }
        },
        methods: {
            carregarLista(){

                fetch(this.urlBase,{
                    headers : { 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => (this.clientes = data.clients))
                .catch(console.error);
            }
        },
    }
    
</script>
