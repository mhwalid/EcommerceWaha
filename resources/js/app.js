/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


import Home from './components/HomeComponent.vue';
import Exemple from './components/ExampleComponent.vue';
import Store from './components/ListComponent.vue';
import Index from './components/Shop/indexComponent.vue';
import product from './components/Shop/productComponent.vue';



const routes = [
    { path: '/', component: Index },
    { path: '/Show/:id', component: product },
    { path: '/Store', component: Store },  
  ];

  const router = new VueRouter({routes});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/HomeComponent.vue').default)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router :router,
    hasbang : false,
});
