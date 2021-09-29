
<template>
    <agile :options="myOptions" :dots="true" :infinite="false" :autoplay="true" :autoplay-speed="5000">
        <div class="slide">
            <h3>
                <div class="px-4 py-5 my-5 mt-6 text-center">
                  <br><br><br>
                    <h1 class=" display-5 fw-bold">Bem vindo ao SiteDemo</h1>
                    <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Sobre o SiteDemo</button>
                        <a :href="nameHost+'/login'"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Começar</button></a>
                    </div>
                    </div>
                </div>
                </h3>
        </div>
                
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1506260408121-e353d10b87c7?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
            
        </div>
        <div class="slide">
            <img src='https://images.unsplash.com/photo-1523712999610-f77fbcfc3843?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'>
            
        </div>
        <div class="slide">
            <img src='https://images.unsplash.com/photo-1526080676457-4544bf0ebba9?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'>
            
        </div>
        
    </agile>
</template>
<script>

// Vue Agile: disponível em https://github.com/lukaszflorczak/vue-agile

import { VueAgile } from 'vue-agile'

export default {
  components: {
        agile: VueAgile 
    },
    data () {
    return {
        
        nameHost: location.protocol+'//'+location.host,
        myOptions: {
            navButtons: false,
            
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        dots: true
                    }
                },
                
                {
                    breakpoint: 900,
                    settings: {
                        navButtons: false,
                        dots: true,
                        infinite: false
                    }
                }
            ]
        }
    }
}
  
}
</script>
