// importato bootstrap
require('./bootstrap');

// importato axios
window.axios = require("axios");

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// chiamata axios tipologie
window.axios.get('http://127.0.0.1:8000/api/typologies').then(results => {
    // console.log(results.data.response);
}).catch(e => {
    console.log(e);
})

// chiamata axios piatti
window.axios.get('http://127.0.0.1:8000/api/plates').then(results => {
    // console.log(results.data.response);
}).catch(e => {
    console.log(e);
})

// chiamata axios ristoranti
window.axios.get('http://127.0.0.1:8000/api/users').then(results => {
    // console.log(results.data.response);
}).catch(e => {
    console.log(e);
})

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
