/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
/*

Importação e configuração do vuex:

*/

import Vuex from 'Vuex';

// adicionar o Vuex à instancia do Vue
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        item: {},
        transacao: {
            status: '',
            mensagem: '',
            dados: ''
        }
    }

});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// componentes para o site
Vue.component('slider-component', require('./components/site/Slider.vue').default);
Vue.component('servicos-component', require('./components/site/Servicos.vue').default);
Vue.component('clientes-component', require('./components/site/Clientes.vue').default);

// componentes para o app
Vue.component('home-component', require('./components/Home.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    store
});
