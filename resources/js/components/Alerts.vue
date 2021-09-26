<template>
    <div :class="estilo" role="alert">
        {{titulo}}
        <hr>
        <p> {{ detalhes.mensagem }} </p>
        <br>
        <ul v-if="detalhes.dados"> <!-- verifica se existe erros -->
            <li v-for="e, key in detalhes.dados" :key="key">{{ e[0] }}</li> <!-- lista de erros --> 
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['tipo', 'titulo', 'detalhes'],
        computed: {
            estilo(){
                return 'alert alert-'+this.tipo
            }
        }
    }
</script>
