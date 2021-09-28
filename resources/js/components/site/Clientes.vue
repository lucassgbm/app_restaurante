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
                urlBase: 'http://localhost:3000/clients',
                clientes: [],
            }
        },
        methods: {
            carregarLista(){
                axios.get(this.urlBase)
                    .then(response => {
                        this.clientes = response.data
                        console(response.data);

                    })
                    .catch(errors => {
                        // console.log(errors)

                    })
            }
        },
    }
    
</script>
