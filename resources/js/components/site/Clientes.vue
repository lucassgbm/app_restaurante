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
                url: 'https://testeezoom.herokuapp.com/js/db.json',
                clientes: [],
            }
        },
        methods: {
            carregarLista(){

                fetch(url,{
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
