<template>

    <div class="row align-items-center mb-4 mt-4 text-center">
        <div v-for="servico in servicos" :key="servico.id" class="col" >
            <div v-if="servico.id == 2" class="box clear-box" :alt="servico.title">
            
                <a :href="servico.link">
                    <img :src="'/storage/imagens/'+servico.image">
                    <h4 class="display-8">{{servico.title}}</h4>
                    <p>{{ servico.description }}</p>

                </a>
            </div>
            <div v-else class="col box dark-box" :alt="servico.title">
                <a :href="servico.link">
                    <img :src="'/storage/imagens/'+servico.image">
                    <h4 class="display-8">{{servico.title}}</h4>
                    <p>{{ servico.description }}</p>

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
                servicos: [],
                darkBox: true,
                classBox: 'col box dark-box'
            }
        },
        methods: {
            carregarLista(){

                fetch(this.nameHost+'/'+this.urlBase,{
                    headers : { 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => (this.servicos = data.services))
                .catch(console.error);
            }
        },
    }
</script>
