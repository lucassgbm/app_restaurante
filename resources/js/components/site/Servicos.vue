<template>

    <div class="row align-items-center mb-4 mt-4 text-center">
                <div v-for="servico in servicos" :key="servico.id" class="col" >
                    <div v-if="servico.id == 2" class="box clear-box">
                    
                        <a :href="servico.link">
                            <img :src="'/storage/imagens/'+servico.image">
                            <h4 class="display-8">{{servico.title}}</h4>
                            <p>{{ servico.description }}</p>

                        </a>
                    </div>
                    <div v-else class="col box dark-box">
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
                urlBase: 'http://localhost:3000/services',
                servicos: [],
                darkBox: true,
                classBox: 'col box dark-box'
            }
        },
        methods: {
            carregarLista(){
                axios.get(this.urlBase)
                    .then(response => {
                        this.servicos = response.data
                        console(response.data);

                    })
                    .catch(errors => {
                        // console.log(errors)

                    })
            }
        },
    }
</script>
