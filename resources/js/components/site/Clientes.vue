<template>
    <div class="container">

        <div class="row align-items-center mb-4 mt-4">
            <div class="col text-center box-cliente" v-for="cliente in clientes" :key="cliente.id">
                <a :href="cliente.link">
                    <img :src="nameHost+'/storage/imagens/'+cliente.image" :alt="cliente.title">
                </a>
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
                // url onde o db.json está colalizado
                urlBase: 'js/db.json',
                nameHost: location.protocol+'//'+location.host,
                clientes: [],
            }
        },
        methods: {
            carregarLista(){

                fetch(this.nameHost+'/'+this.urlBase,{
                    headers : { 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Access-Control-Allow-Origin': '*',
                        'Access-Control-Allow-Headers': 'Accept',
                        'Access-Control-Allow-Methods': 'POST, GET'
                    },
                    mode: "no-cors",
                })
                .then(response => response.json())
                .then(data => (this.clientes = data.clients))
                .catch(console.error);
            }
        },
    }
    
</script>
