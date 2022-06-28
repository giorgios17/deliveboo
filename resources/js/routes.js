import Vue from "vue";

import VueRouter from "vue-router";
import HomepageComponent from './pages/HomepageComponent';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'homepage',
            component: HomepageComponent
        }
    ]
})

export default router;
