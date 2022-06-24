// importato bootstrap
require('./bootstrap');

// importato axios
window.axios = require("axios");

// importato Vue
window.Vue = require('vue');

// importato VueRouter
import router from "./routes"

// importato il componente AppComponent
import AppComponent from "./app/AppComponent"

const app = new Vue({
    el: '#app',
    render: h => h(AppComponent),
    router
});
