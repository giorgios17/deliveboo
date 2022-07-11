// importato bootstrap
require('./bootstrap');

// importato axios
window.axios = require("axios");

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// importato Vue
window.Vue = require('vue');

// importato VueRouter
import router from "./routes"

// importato il componente AppComponent
import AppComponent from "./app/AppComponent"

//importa vue braintree
import vueBraintree from 'vue-braintree'
Vue.use(vueBraintree);

import scrollAnimation from "./scrollAnimation";

Vue.directive('scrollAnimation', scrollAnimation);

const app = new Vue({
    el: '#app',
    render: h => h(AppComponent),
    router
});


