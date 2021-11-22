import Vue from 'vue';

import store  from './store';

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import router from './routes';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

window.onload = function () {
    new Vue({
        store,
        router,
        el: '#app',
    });
}
